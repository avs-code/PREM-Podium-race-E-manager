<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$season = $_GET['season'];

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$squery = "SELECT s.*, d.name dname FROM season s JOIN division d ON (d.id = s.division)";
$sresult = mysqli_query($link,$squery);
if(!$sresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

$dquery = "SELECT * FROM division";
$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

$rquery = "SELECT id, name FROM point_ruleset";
$rresult = mysqli_query($link,$rquery);
if(!$rresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}
?>
<h1>Add race</h1>

<form action="race_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" maxlength="30"></td>
</tr>
<tr>
	<td>Track:</td>
	<td><input type="text" name="track" maxlength="30"></td>
</tr>
<tr>
	<td>image_link:</td>
	<td><input type="url" name="imagelink" maxlength="200"></td>
</tr>
<tr>
	<td>Forum link:</td>
	<td><input type="url" name="forumlink" maxlength="200"></td>
</tr>
<tr>
	<td>Laps:</td>
	<td><input type="text" name="laps" maxlength="3" size="3"></td>
</tr>
<tr>
	<td>Season:</td>
	<td>
		<select id="season" name="season" onchange="showOptions();">
		<option value="0">--NO SEASON--</option>
		<? while($sitem = mysqli_fetch_array($sresult)) { ?>
			<option value="<?=$sitem['id']?>"<?=$season == $sitem['id'] ? " selected=\"1\"" : ""?>><?=$sitem['name']?> (<?=$sitem['dname']?>)</option>
		<? } ?>
		</select>
	</td>
</tr>
<tr id="diff_ruleset">
	<td>Different ruleset:</td>
	<td><input id="chk_diff_ruleset" name="diff_ruleset" type="checkbox" onchange="showOptions();"/></td>
</tr>
<tr id="division">
	<td>Division:</td>
	<td>
		<select name="division" onchange="void(0);">
		<? while($ditem = mysqli_fetch_array($dresult)) { ?>
			<option value="<?=$ditem['id']?>"><?=$ditem['name']?> (<?=$ditem['type']?>)</option>
		<? } ?>
		</select>
	</td>
</tr>
<tr id="ruleset">
	<td>Ruleset:</td>
	<td>
		<select name="ruleset" onchange="void(0);">
		<? while($ritem = mysqli_fetch_array($rresult)) { ?>
			<option value="<?=$ritem['id']?>"><?=$ritem['name']?></option>
		<? } ?>
		</select>
	</td>
</tr>
<tr id="ruleset_qualifying">
	<td>Ruleset qualifying:</td>
	<td>
		<select name="ruleset_qualifying" onchange="void(0);">
		<? mysqli_data_seek($rresult, 0); ?>
		<option value="">&nbsp;</option>
		<? while($ritem = mysqli_fetch_array($rresult)) { ?>
			<option value="<?=$ritem['id']?>"><?=$ritem['name']?></option>
		<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td>Date:</td>
	<td>
		<select name="day">
		<? for($x = 1; $x <= 31; $x++) { ?>
			<option<?=date("j") == $x ? " selected" : ""?>><?=sprintf("%02d", $x)?></option>
		<? } ?>
		</select>
		<select name="month">
		<? $months = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); ?>
		<? for($x = 1; $x <= 12; $x++) { ?>
			<option<?=date("n") == $x ? " selected" : ""?> value="<?=$x?>"><?=$months[$x]?></option>
		<? } ?>
		</select>
		<select name="year">
		<? for($x = 2000; $x <= 2050; $x++) { ?>
			<option<?=date("Y") == $x ? " selected" : ""?>><?=sprintf("%04d", $x)?></option>
		<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td>Time:</td>
	<td>
		<select name="hour">
		<? for($x = 0; $x <= 23; $x++) { ?>
			<option<?=$x == "12" ? " selected" : ""?>><?=sprintf("%02d", $x)?></option>
		<? } ?>
		</select> :
		<select name="minute">
		<? for($x = 0; $x <= 59; $x = $x + 5) { ?>
			<option><?=sprintf("%02d", $x)?></option>
		<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td>Max players:</td>
	<td><input type="text" name="maxplayers" maxlength="3" size="3" value="20"></td>
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

<script type="text/javascript" language="javascript" src="functions.js"></script>
<script type="text/javascript" language="javascript">
<!--
function showOptions() {
	var season = ele("season").value;
	var chk_diff_ruleset = ele("chk_diff_ruleset").checked;

	if(season == 0) {
		ele("diff_ruleset").style.display = "none";
		ele("division").style.display = "table-row";
		ele("ruleset").style.display = "table-row";
		ele("ruleset_qualifying").style.display = "table-row";
	}
	else {
		ele("diff_ruleset").style.display = "table-row";
		ele("division").style.display = "none";
		if(chk_diff_ruleset) {
			ele("ruleset").style.display = "table-row";
			ele("ruleset_qualifying").style.display = "table-row";
		} else {
			ele("ruleset").style.display = "none";
			ele("ruleset_qualifying").style.display = "none";
		}
	}
}
showOptions();
// -->
</script>
