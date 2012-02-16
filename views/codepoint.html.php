<?php
$title = 'U+' . $codepoint->getId('hex');
$headdata = '';
$prev = $codepoint->getPrev();
$next = $codepoint->getNext();
$props = $codepoint->getProperties();
if ($prev):
    $headdata .= '<link href="' . $prev . '" rel="prev">';
endif;
if ($next):
    $headdata .= '<link href="' . $next . '" rel="next">';
endif;
include "header.php";
?>
    <nav>
      <ul>
        <li class="prev">
          <?php if ($prev):?>
            <a class="cp" href="U+<?php e($prev)?>"><?php e($prev)?><img src="data:<?php e($prev->getImage())?>" alt="" width="16" height="16" /></a>
          <?php endif?>
        </li>
        <li class="up">
          <?php $block = $codepoint->getBlock();
            f('<a class="bl" href="%s">%s</a>', u($block->getName()), $block->getName()); ?>
        </li>
        <li class="next">
          <?php if ($next):?>
            <a class="cp" href="U+<?php e($next)?>"><?php e($next)?><img src="data:<?php e($next->getImage())?>" alt="" width="16" height="16" /></a>
          <?php endif?>
        </li>
      </ul>
    </nav>
    <h1><img src="data:<?php e($codepoint->getImage())?>" alt="" width="16" height="16" /> <?php e($title)?><br/>
      <?php e($codepoint->getName())?></h1>
    <section>
      <h2>Representations</h2>
      <dl>
        <dt>Nº</dt>
        <dd><?php e($codepoint->getId())?></dd>
        <dt>Your System</dt>
        <dd><?php if ($props['gc'][0] === 'C'):?>
            <span class="Cc">&lt;control&gt;</span>
        <?php else:?>
            <span>&#<?php e($codepoint->getId())?>;</span>
        <?php endif?></dd>
        <dt>UTF-8</dt>
        <dd><?php e($codepoint->getRepr('UTF-8'))?></dd>
        <dt>UTF-16</dt>
        <dd><?php e($codepoint->getRepr('UTF-16'))?></dd>
        <dt>UTF-32</dt>
        <dd><?php e($codepoint->getRepr('UTF-32'))?></dd>
        <?php $alias = $codepoint->getALias();
        foreach ($alias as $a):?>
          <dt><?php e($a['type'])?></dt>
          <dd><?php if ($a['type'] === 'html') {
                echo '&amp;';
            }
            e($a['name']);
            if ($a['type'] === 'html') {
                echo ';';
            }?></dd>
        <?php endforeach?>
      </dl>
    </section>
    <section>
      <h2>Properties</h2>
      <dl>
        <dt>Unicode version</dt>
        <dd><?php e($props['age'])?></dd>
        <dt>Script</dt>
        <dd><?php e($props['sc'])?></dd>
        <dt>General Category</dt>
        <dd><?php e($props['gc'])?></dd>
        <dt>Bidi Class</dt>
        <dd><?php e($props['bc'])?></dd>
        <dt></dt>
        <dd><?php e($props['age'])?></dd>
      </dl>
    </section>
    <section>
      <h2>Relations</h2>
      <dl>
        <dt>Plane</dt>
        <dd><?php $plane = $codepoint->getPlane();
            f('<a class="pl" href="%s">%s</a>', u($plane->name), $plane->name);
        ?></dd>
        <dt>Block</dt>
        <dd><?php $block = $codepoint->getBlock();
            f('<a class="bl" href="%s">%s</a>', u($block->getName()), $block->getName());
        ?></dd>
        <?php if($props['uc'] && $props['uc'] != $codepoint->getId('hex')):?>
          <dt>Uppercase</dt>
          <dd></dd>
        <?php endif?>
        <?php if($props['lc'] && $props['lc'] != $codepoint->getId('hex')):?>
          <dt>Lowercase</dt>
          <dd></dd>
        <?php endif?>
      </dl>
    </section>
    <table>
      <tbody>
        <?php foreach ($props as $k => $v):
              if ($v !== NULL && $v !== '' && $k !== 'cp'):?>
          <tr class="p_<?php e($k)?>">
            <th><?php e( array_key_exists($k, $properties)?
                            str_replace('_', ' ', $properties[$k]) . ' ('.$k.')' :
                            $k)?></th>
            <td>
              <?php e($v)?>
            </td>
          </tr>
        <?php endif; endforeach?>
      </tbody>
    </table>
<?php include "footer.php"?>
