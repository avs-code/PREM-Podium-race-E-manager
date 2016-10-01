<? if(!defined("CONFIG")) exit(); ?>
<?
$error = stripslashes(urldecode($error));
$enter_regex = "/(<br\s*\/?>|\n|\r\n)/mi";

$enter_count = preg_match_all($enter_regex, $error, $m);

$error = preg_replace($enter_regex, "<br>\n", $error);

for($x = $enter_count; $x < 3; $x++) {
	$error .= "<br>\n";	
}
?>
<div id="error"><?=$error?></div>
