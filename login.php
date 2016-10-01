<? if(!defined("CONFIG")) exit(); ?>
<?
if(!defined("USE_MYSQL") || !defined("USE_LOGIN")) {
	show_error("Login is disabled\n");
	return;
}
?>
<div id="login">
<h1><?=TITLE?></h1>
<?=SUBTITLE?><br>
<a href="<?=$config['org_link']?>"><?=$config['org']?></a><br>
<br>
<? mysql_login::print_login_form() ?>
<br>
<div class="small">Version <?=VERSION?><br></div><br>
</div>
