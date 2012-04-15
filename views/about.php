<?php
$title = 'About Codepoints';
$hDescription = 'Codepoints.net is a site dedicated to Unicode and all things related to codepoints, characters, glyphs and internationalization.';
$nav = array(
  'main' => '<a href="#main">About this site</a>',
  'find' => '<a href="#find">Finding Characters</a>',
  'glossary' => '<a href="#glossary">Glossary of Common Terms</a>',
  'unicode' => '<a href="#unicode">About Unicode</a>',
);
include 'header.php';
include 'nav.php';
?>
<div class="payload static about">
  <h1><?php e($title)?></h1>
  <p>The content on this website reflects the information found in<br/>
  <em>The Unicode Consortium.</em> The Unicode Standard, Version 6.1.0,
  (Mountain View, CA: The Unicode Consortium, 2012. ISBN 978-1-936213-02-3)<br/>
  <a href="http://www.unicode.org/versions/Unicode6.1.0/">http://www.unicode.org/versions/Unicode6.1.0/</a>
  </p>
  <p>
    This website is not affiliated with or approved by the Unicode Consortium.
  </p>
  <h2>Not Sure about that Character’s Name?</h2>
  <p>You don’t know the name or properties of a codepoint but its general
  shape? Fear not, on <a href="http://shapecatcher.com/">Shapecatcher</a>
  you can draw the character and get it recognized.</p>
</div>
<?php include 'footer.php'?>
