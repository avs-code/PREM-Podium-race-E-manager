<? if(!defined("CONFIG")) exit(); ?>
<?
$squery = "SELECT s.id, s.name, d.name dname, COUNT(r.id) racecount FROM season s JOIN division d ON (d.id = s.division) LEFT JOIN race r ON (r.season = s.id) GROUP BY s.id ORDER BY name ASC, dname ASC" ;
$sresult = mysql_query($squery);
if(!$sresult) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}

$rquery = "SELECT r.id, r.name, r.track, r.date, d.name dname, rs.name rsname, qrs.name qrsname FROM race r JOIN division d ON (r.division = d.id) JOIN point_ruleset rs ON (r.ruleset = rs.id) LEFT JOIN point_ruleset qrs ON (r.ruleset_qualifying = qrs.id) WHERE r.season='0' ORDER BY r.date ASC" ;
$rresult = mysql_query($rquery);
if(!$rresult) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}
?>
<h1>Results</h1>
<h2>Seasons</h2>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td>Season</td>
	<td>Division</td>
	<td>Races</td>
</tr>
<?
$style = "odd";
while($sitem = mysql_fetch_array($sresult)) { ?>
<tr class="<?=$style?>">
	<td><a href=".?page=result_season&amp;season=<?=$sitem['id']?>"><?=$sitem['name']?></a></td>
	<td><?=$sitem['dname']?></td>
	<td><?=$sitem['racecount']?></td>
</tr>
<? 
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>

<h2>Events</h2>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td>Name</td>
	<td>Track</td>
	<td>Date</td>
	<td>Division</td>
	<td>Ruleset</td>
</tr>
<?
$style = "odd";
while($ritem = mysql_fetch_array($rresult)) {
	$date = strtotime($ritem['date']);
	?>
<tr class="<?=$style?>">
	<td><a href=".?page=result_race&amp;race=<?=$ritem['id']?>"><?=$ritem['name']?></a></td>
	<td><?=$ritem['track']?></td>
	<td><?=date("d M Y", $date)?></td>
	<td><?=$ritem['dname']?></td>
	<td><?=$ritem['rsname']?><?=isset($ritem['qrsname']) ? " / " . $ritem['qrsname'] : ""?></td>
</tr>
<? 
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
