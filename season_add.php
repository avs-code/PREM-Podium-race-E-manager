<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$diquery = "SELECT * FROM division ORDER BY name ASC";
$diresult = mysqli_query($link,$diquery);
if(!$diresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($diresult) == 0) {
	show_error("There are no divisions.\n<a href=\"?page=division_add\">Add one</a> first.\n");
	return;
}

$rsquery = "SELECT * FROM point_ruleset ORDER BY name ASC";
$rsresult = mysqli_query($link,$rsquery);
if(!$rsresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($rsresult) == 0) {
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
	<? while($diitem = mysqli_fetch_array($diresult)) { ?>
		<option value="<?=$diitem['id']?>"><?=$diitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Ruleset:</td>
	<td>
	<select name="ruleset">
	<? while($rsitem = mysqli_fetch_array($rsresult)) { ?>
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
	<? mysqli_data_seek($rsresult, 0); ?>
	<? while($rsitem = mysqli_fetch_array($rsresult)) { ?>
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
	<td>Series logo for Simresults:</td>
	<td><input type="url" name="series_logo_simresults" maxlength="200"></td>
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
