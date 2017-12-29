<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM season WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($result) == 0){
	show_error("Season does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$diquery = "SELECT * FROM division ORDER BY name ASC";
$diresult = mysqli_query($link,$diquery);
if(!$diresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
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

$tquery = "SELECT * FROM team ORDER BY name ASC";
$tresult = mysqli_query($link,$tquery);
if(!$tresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($tresult) == 0) {
	show_error("There are no teams.\n<a href=\"?page=team_add\">Add one</a> first.\n");
	return;
}

$team = array();
while($titem = mysqli_fetch_array($tresult)) {
	$team[$titem['id']] = $titem['name'];
}

function show_team_combo($tid = 0) {
	global $team;

	echo "<select name=\"team[]\">\n";
	echo "<option value=\"\">&nbsp;</option>\n";
	foreach($team as $id => $tname) {
		echo "<option value=\"$id\"";
		if($tid == $id) echo " selected";
		echo ">$tname</option>\n";
	}
	echo "</select>\n";
}

$stquery = "SELECT * FROM season_team WHERE season='$id'";
$stresult = mysqli_query($link,$stquery);
if(!$stresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
?>
<h1>Modify season</h1>

<form action="season_chg_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" value="<?=$item['name']?>" maxlength="20"></td>
</tr>
<tr>
	<td>Division:</td>
	<td>
	<select name="division">
	<? while($diitem = mysqli_fetch_array($diresult)) { ?>
		<option value="<?=$diitem['id']?>"<?=($diitem['id'] == $item['division']) ? " selected" : ""?>><?=$diitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Ruleset:</td>
	<td>
	<select name="ruleset">
	<? while($rsitem = mysqli_fetch_array($rsresult)) { ?>
		<option value="<?=$rsitem['id']?>"<?=($rsitem['id'] == $item['ruleset']) ? " selected" : ""?>><?=$rsitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Ruleset qualifying:</td>
	<td>
	<select name="ruleset_qualifying">
	<? mysqli_data_seek($rsresult, 0); ?>
	<option value="0">&nbsp;</option>
	<? while($rsitem = mysqli_fetch_array($rsresult)) { ?>
		<option value="<?=$rsitem['id']?>"<?=($rsitem['id'] == $item['ruleset_qualifying']) ? " selected" : ""?>><?=$rsitem['name']?></option>
	<? } ?>
	</select>
	</td>
</tr>
<tr>
	<td>Max teams:</td>
	<td><input type="text" name="maxteams" maxlength="3" size="2" value="<?=$item['maxteams']?>"></td>
</tr>
<tr>
	<td>Series logo for Simresults:</td>
	<td><input type="url" name="series_logo_simresults" maxlength="200" value="<?=$item['series_logo_simresults']?>"</td>
</tr>
<tr>
	<td>Teams:</td>
	<td>
		<?
		for($x = 0; $x < $item['maxteams']; $x++) {
			if($stitem = mysqli_fetch_array($stresult))
				show_team_combo($stitem['team']);
			else
				show_team_combo();
			echo "<br>\n";
		}
		?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Modify">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
