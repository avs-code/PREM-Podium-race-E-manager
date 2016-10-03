<? if(!defined("CONFIG")) exit(); ?>


<!DOCTYPE html>
<meta charset="utf-8">


<?php 
$str= file_get_contents("rules.rtf");
$str = nl2br($str, true); // for XHMTL (in other words <br />). Use false for <br>. i.e $str = nl2br($str, false);
echo $str;
?>


</body>
</html>
