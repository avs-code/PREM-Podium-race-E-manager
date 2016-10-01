<? if(!defined("CONFIG")) exit(); ?>
<?
if(isset($msg) || isset($_GET['msg'])) {
	if(!isset($msg) && isset($_GET['msg'])) $msg = $_GET['msg'];

	$msg = stripslashes(urldecode($msg));

	$enter_regex = "/(<br\s*\/?>|\n|\r\n)/mi";
	$enter_count = preg_match_all($enter_regex, $msg, $m);

	$msg = preg_replace($enter_regex, "<br>\n", $msg);

	for($x = $enter_count; $x < 3; $x++) {
		$msg .= "<br>\n";	
	}
?>
<div id="msg"><?=$msg?></div>
<br>
<? } ?>
