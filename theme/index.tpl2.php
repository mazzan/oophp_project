<!doctype html>
<html lang='<?=$lang?>' class='no-js'>
<head>
<meta charset='utf-8'/>
<title><?=get_title($title)?></title>
<script src='<?=$modernizr?>'></script>
<?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
<?php foreach($stylesheets as $val): ?>
<link rel='stylesheet' type='text/css' href='<?=$val?>'/>
<?php endforeach; ?>
</head>
<body>
  <div id='wrapper'>
    <div id='header'><?=$header?>
    
    <div id='navbar'><?= CNavigation::GenerateMenu($navbar)?></div></div>
    
    <!--
     <div id='navbar'><?= $navbar?></div>
     -->
    <div id='main'><?=$main?></div>
    <div id='footer'><?=$footer?></div>
  </div>

<!-- // Google analytics. Code to log visitors on page. Enable function in config.php -->
<?php 
if(isset($google_analytics)): 
?>
<script>
  var _gaq=[['_setAccount','<?=$google_analytics?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<?php
endif; 
?>
</body>
</html>
