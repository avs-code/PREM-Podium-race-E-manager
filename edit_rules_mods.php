<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
if (isset($_POST['rules'])) {
	$rules = mysql_real_escape_string($_POST['rules']);
	mysql_query("UPDATE rules_table SET `rules` = '$rules' WHERE `id` = 1 LIMIT 1");
}
$exe_rules = mysql_query("SELECT `rules` FROM rules_table WHERE `id` = 1 LIMIT 1");
list($rules) = mysql_fetch_array($exe_rules);
mysql_free_result($exe_rules);
$rules = htmlspecialchars($rules);
?>

<form method="post" action="index.php?page=edit_rules_mods">
	<textarea id="tinyeditor" name="rules" cols="50" rows="15"><?php echo $rules; ?></textarea>
	<input type="submit" value="Save" />
</form>
