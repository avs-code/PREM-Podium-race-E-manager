<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$diquery = "SELECT * FROM division ORDER BY name ASC";
$diresult = mysql_query($diquery);
if(!$diresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($diresult) == 0) {
	show_error("There are no divisions.\n<a href=\"?page=division_add\">Add one</a> first.\n");
	return;
}

$rsquery = "SELECT * FROM point_ruleset ORDER BY name ASC";
$rsresult = mysql_query($rsquery);
if(!$rsresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($rsresult) == 0) {
	show_error("There are no rulesets.\n<a href=\"?page=point_add\">Add one</a> first.\n");
	return;
}
?>
<h1>Add season</h1>

<form action="season_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" maxlength="20"></td>
</tr>
<tr>
	<td>Division:</td>
	<td>
	<select name="division">
	<? while($diitem = mysql_fetch_array($diresult)) { ?>
		<option value="<?=$diitem['id']?>"><?=$diitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Ruleset:</td>
	<td>
	<select name="ruleset">
	<? while($rsitem = mysql_fetch_array($rsresult)) { ?>
		<option value="<?=$rsitem['id']?>"><?=$rsitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Ruleset qualifying:</td>
	<td>
	<select name="ruleset_qualifying">
	<option value="0">&nbsp;</option>
	<? mysql_data_seek($rsresult, 0); ?>
	<? while($rsitem = mysql_fetch_array($rsresult)) { ?>
		<option value="<?=$rsitem['id']?>"><?=$rsitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Max teams:</td>
	<td><input type="text" name="maxteams" maxlength="3" size="2" value="10"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
