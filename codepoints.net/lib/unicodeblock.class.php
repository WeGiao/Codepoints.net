<?php


/**
 * A block of characters as defined by Unicode
 */
class UnicodeBlock extends UnicodeRange {

    /**
     * the block's name
     */
    protected $name;

    /**
     * the previous block
     */
    protected $prev;

    /**
     * the next block
     */
    protected $next;

    /**
     * the plane this block belongs to
     */
    protected $plane;

    /**
     * the first and last codepoint of this block
     */
    protected $limits;

    /**
     * the Wikipedia abstract of this block (lang->text mapping array)
     */
    protected $abstract = array();

    /**
     * the version this block was introduced
     */
    protected $version;

    /**
     * create a new UnicodeBlock
     *
     * If $name is given and $r is null, the block is looked up in the
     * database. If $r is set, the relevant items are taken from there.
     */
    public function __construct($name, $db, $r=null) {
        if ($r === null) { // performance: allow to specify range
            $query = $db->prepare("
                SELECT name, first, last, abstract
                FROM blocks
                LEFT JOIN block_abstract
                    ON blocks.name = block_abstract.block
                WHERE replace(replace(lower(name), '_', ''), ' ', '') = :name
                LIMIT 1");
            $query->execute(array(':name' => str_replace(array(' ', '_'), '',
                                  strtolower($name))));
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if ($r === false) {
                throw new Exception('No block named ' . $name);
            }
        }
        $this->name = $r['name']; // use canonical name
        $this->limits = array($r['first'], $r['last']);
        parent::__construct(range($r['first'], $r['last']), $db);
    }

    /**
     * get the block's official name
     */
    public function getName() {
        return $this->name;
    }
    public function __toString() {
        return $this->name;
    }

    /**
     * get the block's Wikipedia abstract
     */
    public function getAbstract($lang='en') {
        if (! array_key_exists($lang, $this->abstract)) {
            $query = $this->db->prepare("
                SELECT abstract
                  FROM block_abstract
                 WHERE replace(replace(lower(block), '_', ''), ' ', '') = ?
                   AND lang = ?");
            $query->execute(array(str_replace(array(' ', '_'), '',
                                  strtolower($this->name)), $lang));
            $r = $query->fetch(PDO::FETCH_ASSOC);
            if ($r && array_key_exists('abstract', $r)) {
                $this->abstract[$lang] = $r['abstract'];
            } else {
                $this->abstract[$lang] = '';
            }
        }
        return $this->abstract[$lang];
    }

    /**
     * get the earliest Unicode version where this block appeared
     */
    public function getVersion() {
        if (!$this->version) {
            $query = $this->db->prepare("
                SELECT c.age
                    FROM codepoints c, blocks b
                    WHERE replace(replace(lower(b.name), '_', ''), ' ', '') = ?
                    AND c.cp >= b.first
                    AND c.cp <= b.last
                    GROUP BY c.age");
            $query->execute(array(str_replace(array(' ', '_'), '',
                                    strtolower($this->name))));
            $r = $query->fetchAll(PDO::FETCH_COLUMN, 0);
            if (! $r) {
                $this->version = '1.0';
            } else {
                sort($r, SORT_NUMERIC);
                $this->version = $r[0];
            }
        }
        return $this->version;
    }

    /**
     * return first and last codepoint of block definition
     *
     * contrary to UnicodeRange::getBoundaries the returned values don't
     * need to exist as valid CPs
     */
    public function getBlockLimits() {
        return $this->limits;
    }

    /**
     * return the count of codepoints in this block
     */
    public function count() {
        $stm = $this->db->prepare('SELECT COUNT(*) c
                                     FROM codepoints
                                    WHERE cp >= ? AND cp <= ?');
        $stm->execute($this->limits);
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        return (int)$r['c'];
    }

    /**
     * get the previous block or false
     */
    public function getPrev() {
        if ($this->prev === null) {
            $query = $this->db->prepare("
            SELECT name, first, last FROM blocks
             WHERE first < :cp AND last < :cp
          ORDER BY last DESC
             LIMIT 1");
            $query->execute(array(':cp' => $this->limits[0]));
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if ($r === false) {
                $this->prev = false;
            } else {
                $this->prev = new static('', $this->db, $r);
            }
        }
        return $this->prev;
    }

    /**
     * get the next block or false
     */
    public function getNext() {
        if ($this->next === null) {
            $query = $this->db->prepare("
            SELECT name, first, last FROM blocks
             WHERE first > :cp AND last > :cp
          ORDER BY first ASC
             LIMIT 1");
            $query->execute(array(':cp' => $this->limits[1]));
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if ($r === false) {
                $this->next = false;
            } else {
                $this->next = new static('', $this->db, $r);
            }
        }
        return $this->next;
    }

    /**
     * get the plane this block belongs to
     */
    public function getPlane() {
        if ($this->plane === null) {
            $query = $this->db->prepare("
            SELECT name, first, last FROM planes
             WHERE first <= :first AND last >= :last
             LIMIT 1");
            $query->execute(array(':first' => $this->limits[0],
                                  ':last' => $this->limits[1]));
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if ($r === false) {
                throw new Exception("No plane found for block.");
            } else {
                $this->plane = new UnicodePlane('', $this->db, $r);
            }
        }
        return $this->plane;
    }

    /**
     * get the block for a specific codepoint
     */
    public static function getForCodepoint($cp, $db=null) {
        if ($cp instanceof Codepoint) {
            $db = $cp->getDB();
            $cp = $cp->getId();
        }
        $query = $db->prepare("
            SELECT name, first, last FROM blocks
             WHERE first <= :cp AND last >= :cp
             LIMIT 1");
        $query->execute(array(':cp' => $cp));
        $r = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if ($r === false) {
            throw new Exception('No block contains this codepoint: ' . $cp);
        }
        return new static('', $db, $r);
    }

    /**
     * search blocks by name
     */
    public static function search($q, $db) {
        $query = $db->prepare("
            SELECT name, first, last FROM blocks
             WHERE replace(replace(lower(name), '_', ''), ' ', '') LIKE :name
            ORDER BY first ASC");
        $query->execute(array(':name' => str_replace(array(' ', '_'), '',
                              strtolower("%$q%"))));
        $r = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        $blocks = array();
        if ($r) {
            foreach ($r as $b) {
                $blocks[] = new static('', $db, $b);
            }
        }
        return $blocks;
    }

    /**
     * get all block names in defined order
     */
    public static function getAllNames($db) {
        $query = $db->prepare("SELECT name FROM blocks ORDER BY first ASC");
        $query->execute();
        $r = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        $blocks = array();
        foreach ($r as $b) {
            $blocks[] = $b['name'];
        }
        return $blocks;
    }

}


//__END__
