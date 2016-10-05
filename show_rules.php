<? if(!defined("CONFIG")) exit(); ?>





<?php 
$str= file_get_contents("rules.rtf");
$str = nl2br($str, true); // for XHMTL (in other words <br />). Use false for <br>. i.e $str = nl2br($str, false);
echo $str;
?>

<?php

echo(stripslashes($_POST['content']));
?>
