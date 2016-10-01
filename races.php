<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['season'])) $season = $_GET['season'];
else $season = 0;

$query_where = "WHERE r.season='$season'";
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where .= " AND (r.name LIKE '%$filter%' OR r.track LIKE '%$filter%')";
}
$query = "SELECT r.*, d.name dname, rs.name rsname, qrs.name qrsname, COUNT(rd.team_driver) drivers FROM race r JOIN division d ON (d.id = r.division) JOIN point_ruleset rs ON (rs.id = r.ruleset) LEFT JOIN point_ruleset qrs ON (qrs.id = r.ruleset_qualifying) LEFT JOIN race_driver rd ON (r.id = rd.race) $query_where GROUP BY r.id ORDER BY r.date DESC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

$squery = "SELECT s.*, d.name dname, COUNT(r.id) racecount FROM season s JOIN division d ON (d.id = s.division) LEFT JOIN race r ON (r.season = s.id) GROUP BY s.id ORDER BY name ASC, dname ASC";
$sresult = mysql_query($squery);
if(!$sresult) {
	show_error("MySQL error: " . mysql_error());
	return;
}

$s2query = "SELECT COUNT(id) racecount FROM race WHERE season = 0";
$s2result = mysql_query($s2query);
if(!$s2result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

$s2item = mysql_fetch_array($s2result);
$noseasonracecount = $s2item['racecount'];
?>
<h1>Races</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="races">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>"><br>
<select name="season" onchange="this.form.submit();">
<option value="0">NO SEASON - <?=$noseasonracecount?> race<?=$noseasonracecount == 1 ? "" : "s"?></option>
<optgroup label="Seasons">
<? while($sitem = mysql_fetch_array($sresult)) { ?>
	<option value="<?=$sitem['id']?>"<?=$season == $sitem['id'] ? " selected" : ""?>><?=$sitem['name']?> - <?=$sitem['dname']?> - <?=$sitem['racecount']?> race<?=$sitem['racecount'] == 1 ? "" : "s"?></option>
<? } ?>
</optgroup>
</select>
<input type="submit" class="button submit" value="ok">
</form>
</div>
<a href=".?page=race_add&amp;season=<?=$season?>">Add race</a>
<? if($season == "0") { ?>

<h2>Seasons</h2>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td>Season</td>
	<td>Division</td>
	<td>Races</td>
</tr>
<?
mysql_data_seek($sresult, 0);
$style = "odd";
while($sitem = mysql_fetch_array($sresult)) {
	?>
<tr class="<?=$style?>">
	<td><a href="?page=races&amp;season=<?=$sitem['id']?>"><?=$sitem['name']?></a></td>
	<td><?=$sitem['dname']?></td>
	<td><?=$sitem['racecount']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
} ?>
</table>

<h2>Events</h2>
<? } ?>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No races found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="60">&nbsp;</td>
	<td width="60">Date</td>
	<? if ($season == 0) { ?>
	<td>Name<br>Track</td>
	<td>Division<br>Ruleset</td>
	<td width="40" align="center">Drivers</td>
	<td width="40" align="center">Laps</td>
	<td width="40" align="center">MaxPl</td>
	<? } else { ?>
	<td>Name</td>
	<td>Track</td>
	<td width="40" align="center">Drivers</td>
	<td width="40" align="center">Laps</td>
	<td width="40" align="center">MaxPl</td>
	<? } ?>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
	$date = strtotime($item['date']);
?>
<tr class="<?=$style?>">
	<td width="60">
		<a href=".?page=race_results_chg&amp;id=<?=$item['id']?>"><img src="images/properties16.png" alt="props"></a>
		<a href=".?page=race_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=race_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td width="60"><?=date("d/m/y", $date)?></td>
	<? if ($season == 0) { ?>
	<td><?=$item['name']?><br><?=$item['track']?></td>
	<td><?=$item['dname']?><br><?=$item['rsname']?><?=!empty($item['qrsname']) ? " / " . $item['qrsname'] : ""?></td>
	<td width="40" align="center"><?=$item['drivers']?></td>
	<td width="40" align="center"><?=$item['laps']?></td>
	<td width="40" align="center"><?=$item['maxplayers']?></td>
	<? } else { ?>
	<td><?=$item['name']?></td>
	<td><?=$item['track']?></td>
	<td width="40" align="center"><?=$item['drivers']?></td>
	<td width="40" align="center"><?=$item['laps']?></td>
	<td width="40" align="center"><?=$item['maxplayers']?></td>
	<? } ?>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
