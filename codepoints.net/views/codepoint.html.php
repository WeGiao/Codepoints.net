<?php
$title = 'U+' . $codepoint->getId('hex'). ' ' . $codepoint->getName();
$prev = $codepoint->getPrev();
$next = $codepoint->getNext();
$props = $codepoint->getProperties();
$block = $codepoint->getBlock();
$plane = $codepoint->getPlane();
$relatives = $codepoint->related();
$confusables = $codepoint->getConfusables();

if ($block) {
    $headdata = sprintf('<link rel="up" href="%s">', q($router->getUrl($block)));
} else {
    $headdata = sprintf('<link rel="up" href="%s">', q($router->getUrl($plane)));
}
if ($prev):
    $headdata .= '<link rel="prev" href="' . q($router->getUrl($prev)) . '">';
endif;
if ($next):
    $headdata .= '<link rel="next" href="' . q($router->getUrl($next)) . '">';
endif;
$hDescription = sprintf(__('%s, codepoint U+%04X %s in Unicode, is located in the block “%s”. It belongs to the %s script and is a %s.'),
    $codepoint->getSafeChar(),
    $codepoint->getId(), $codepoint->getName(), $block? $block->getName() : '-', $info->getLabel('sc', $props['sc']), $info->getLabel('gc', $props['gc']));
$canonical = $router->getUrl($codepoint);
$headdata .= sprintf('
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@codepointsnet">
<meta name="twitter:url" content="https://codepoints.net%s">
<meta name="twitter:title" content="%s">
<meta name="twitter:description" content="%s">
<link rel="alternate" type="application/json+oembed" href="https://codepoints.net/api/v1/oembed?url=%s&amp;format=json">
<link rel="alternate" type="text/xml+oembed" href="https://codepoints.net/api/v1/oembed?url=%s&amp;format=xml">',
q($router->getUrl($codepoint)), q($title), q($hDescription), q(rawurlencode('https://codepoints.net'.$canonical)), q(rawurlencode('https://codepoints.net'.$canonical)));
if (substr($codepoint->getImage(), -strlen(Codepoint::$defaultImage)) !==
    Codepoint::$defaultImage) {
        $headdata .= '<meta name="twitter:image" content="https://codepoints.net/api/v1/glyph/'.$codepoint->getId('hex').'">';
}
/* add breadcrumbs as linked data: Unicode > Plane > Block > this CP */
$headdata .= '<script type="application/ld+json">{"@context": "http://schema.org","@type": "BreadcrumbList","itemListElement":[
{"@type":"ListItem","position":1,"item":{"@id":"https://codepoints.net/planes","name":"Unicode"}},
{"@type":"ListItem","position":2,"item":{"@id":"'.q($router->getUrl($plane)).'","name":"'.q($plane->name).'"}},
'.($block?'{"@type":"ListItem","position":3,"item":{"@id":"'.q($router->getUrl($block)).'","name":"'.q($block->getName()).'"}},':'').'
{"@type":"ListItem","position":4,"item":{"@id":"'.q($canonical).'","name":"'.q($title).'"}}
]}</script>';
include "header.php";
$nav = array();
if ($prev) {
    $nav['prev'] = _cp($prev, 'prev', 'min', 'span');
}
if ($block) {
    $nav["up"] = _bl($block, 'up', 'min', 'span');
} else {
    $nav["up"] = '<a class="pl" rel="up" href="'.q($router->getUrl($plane)).'">'.q($plane->getName()).'</a>';
}
if ($next) {
    $nav['next'] = _cp($next, 'next', 'min', 'span');
}
include "nav.php";
$s = function($cat) use ($router, $info, $props) {
    echo '<a rel="nofollow" href="';
    e($router->getUrl('search?'.$cat.'='.rawurlencode($props[$cat])));
    echo '">';
    e($info->getLabel($cat, $props[$cat]));
    echo '</a>';
};
?>
<div class="payload codepoint"
     data-cp="<?php _e($codepoint->getId())?>"
     data-block-id="<?php _e(str_replace(' ', '_', $block? $block->getName():'-'))?>"
     itemscope="itemscope"
     itemtype="http://schema.org/StructuredValue/Unicode/CodePoint">
  <figure>
    <span class="fig" itemprop="image"><?php e($codepoint->getSafeChar())?></span>
    <?php if (true||$codepoint->getId() > 0xFFFF):
        $fonts = $codepoint->getFonts();
        if (count($fonts)):?>
          <datalist id="fonts">
            <?php foreach ($fonts as $font):?>
              <option value="<?php e($font['id'])?>"
                <?php if ($font['primary'] === '1'):?>
                  data-primary
                <?php endif?>
              ><?php e($font['font'])?></option>
            <?php endforeach?>
          </datalist>
        <?php endif?>
    <?php endif?>
  </figure>
  <aside>
    <!--h3>Properties</h3-->
    <dl>
      <dt><?php _e('Nº')?></dt>
      <dd><?php e($codepoint->getId())?></dd>
      <dt><?php _e('UTF-8')?></dt>
      <dd><?php e($codepoint->getRepr('UTF-8'))?></dd>
      <?php foreach(array('gc', 'sc', 'bc', 'dt', 'ea') as $cat):?>
        <dt><?php e($info->getCategory($cat))?></dt>
        <dd><a rel="nofollow" href="<?php e('search?'.$cat.'='.$props[$cat])?>"><?php e($info->getLabel($cat, $props[$cat]))?></a></dd>
      <?php endforeach?>
      <?php if($props['nt'] !== 'None'):?>
      <dt><?php _e('Numeric Value')?></dt>
        <dd><a rel="nofollow" href="<?php e('search?nt='.$props['nt'])?>"><?php e($info->getLabel('nt', $props['nt']).' '.$props['nv'])?></a></dd>
      <?php endif?>
    </dl>
  </aside>
  <aside class="other codepoint--tools">
    <p>
      <a href="https://twitter.com/share?text=<?php _e(rawurlencode("U+".$codepoint->getId('hex').' '.$codepoint->getName().': '.$codepoint->getSafeChar()))?>&amp;url=<?php echo rawurlencode('https://codepoints.net'.$router->getUrl($codepoint))?>&amp;via=CodepointsNet&amp;hashtags=Unicode" target="_blank" class="button button--hi button--tweet"><i class="icon-twitter"></i> Tweet this codepoint</a>
    </p>
    <p>
      <button type="button" class="button button--hi button--embed" data-link="#tools-embed-<?php _e($codepoint->getId('hex'))?>"><i class="icon-cog"></i> Embed this codepoint</button>
    </p>
    <p><a class="button button--hi" target="_blank" href="http://www.unicode.org/consortium/adopt-a-character.html?str=U%2B<?php echo urlencode($codepoint->getId('hex'))?>"><i class="icon-heart"></i> <?php _e('Adopt this code point')?></a></p>
    <div style="display:none" id="tools-embed-<?php _e($codepoint->getId('hex'))?>">
      <p><?php _e('Embed this codepoint in your own website by simply
      copy-and-pasting the following HTML snippet:')?></p>
      <pre>&lt;iframe src="https://codepoints.net/U+<?php _e($codepoint->getId('hex'))?>?embed"
        style="width: <span contenteditable="true">200px</span>; height: <span contenteditable="true">26px</span>;
        border: 1px solid #444;">
&lt;/iframe></pre>
      <p><?php _e('If you want, you can freely change width and height to meet
        your needs. The layout will adapt accordingly.')?></p>
    </div>
  </aside>
  <h1 itemprop="name">U+<?php e($codepoint->getId('hex'))?> <?php e($codepoint->getName())?></h1>
  <section class="abstract" itemprop="description">
    <?php include "codepoint/info.php"?>
  </section>
  <section>
    <?php include "codepoint/representations.php"?>
  </section>
<?php if (count($relatives) + count($confusables)):?>
  <section>
    <h2><?php _e('Related Characters')?></h2>
    <?php if (count($relatives)):?>
      <ul class="data">
        <?php foreach ($relatives as $rel):?>
          <li><?php cp($rel)?></li>
        <?php endforeach?>
      </ul>
    <?php endif?>
    <?php if (count($confusables)):?>
      <h3 id="confusables"><?php _e('Confusables')?></h3>
      <ul class="data">
        <?php foreach ($confusables as $rel): ?>
          <li><?php cp($rel)?></li>
        <?php endforeach?>
      </ul>
    <?php endif?>
  </section>
<?php endif?>
  <section>
    <h2><?php _e('Elsewhere')?></h2>
    <ul>
      <li><a href="http://fileformat.info/info/unicode/char/<?php e($codepoint->getId('hex'))?>/index.htm">Fileformat.info</a></li>
      <li><a href="http://unicode.org/cldr/utility/character.jsp?a=<?php e($codepoint->getId('hex'))?>"><?php _e('Unicode website')?></a></li>
      <li><a href="http://www.unicode.org/cgi-bin/refglyph?24-<?php e($codepoint->getId('hex'))?>"><?php _e('Reference rendering on Unicode.org')?></a></li>
      <?php if (array_key_exists('abstract', $props) && $props['abstract']):?>
        <li><a href="http://en.wikipedia.org/wiki/<?php e(rawurlencode($codepoint->getChar()))?>"><?php _e('Wikipedia')?></a></li>
      <?php endif?>
      <?php if ($props['kDefinition']):?>
        <li><a href="http://www.unicode.org/cgi-bin/GetUnihanData.pl?codepoint=<?php e(rawurlencode($codepoint->getChar()))?>"><?php _e('Unihan Database')?></a></li>
        <li><a href="http://ctext.org/dictionary.pl?if=en&amp;char=<?php e(rawurlencode($codepoint->getChar()))?>"><?php _e('Chinese Text Project')?></a></li>
      <?php endif?>
      <li><a href="http://graphemica.com/<?php e(rawurlencode($codepoint->getChar()))?>">Graphemica</a></li>
      <li><a href="http://www.isthisthingon.org/unicode/index.phtml?glyph=<?php e($codepoint->getId('hex'))?>">The UniSearcher</a></li>
      <li><a href="http://scriptsource.org/char/U<?php printf('%06X', $codepoint->getId())?>">ScriptSource</a></li>
    </ul>
  </section>
  <section>
  <h2><?php _e('Complete Record')?></h2>
    <?php include "codepoint/props.php"?>
  </section>
</div>
<?php
$footer_scripts = array(url("/static/js/codepoint.js"));
include "footer.php"?>
