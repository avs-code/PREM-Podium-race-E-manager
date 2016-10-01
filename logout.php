<? if(!defined("CONFIG")) exit(); ?>
<?
if(!defined("USE_MYSQL") || !defined("USE_LOGIN")) {
	show_error("Login is disabled\n");
	return;
}
?>
<h1>Logout</h1>
<? if(isset($login)) { ?>
<form action="logout_do.php" method="post">
Are you sure that you want to logout?<br>
<input type="submit" value="Yes, logout" class="button logout"> <input type="button" value="No, go back" class="button reset" onclick="javascript:history.go(-1);">
</form>
<? } else { ?>
You are not logged in
<? } ?>
