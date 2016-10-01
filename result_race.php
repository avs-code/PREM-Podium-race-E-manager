<? if(!defined("CONFIG")) exit(); ?>
<?
require_once("results_functions.php");

$race = addslashes($_GET['race']);

$query = "SELECT r.*, s.name sname, d.name dname, rs.name rsname, qrs.name qrsname FROM race r LEFT JOIN season s ON (s.id = r.season) JOIN division d ON (d.id = r.division) JOIN point_ruleset rs ON (rs.id = r.ruleset) LEFT JOIN point_ruleset qrs ON (qrs.id = r.ruleset_qualifying) WHERE r.id='$race'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($result) == 0) {
	show_error("Race does not exist\n");
	return;
}

$item = mysql_fetch_array($result);
$date = strtotime($item['date']);

$dquery = "SELECT rd.*, d.name dname, t.name tname FROM race_driver rd JOIN team_driver td ON (td.id = rd.team_driver) JOIN team t ON (t.id = td.team) JOIN driver d ON (d.id = td.driver) WHERE rd.race='$race' AND (rd.status = 0) ORDER BY rd.position ASC";
$dresult = mysql_query($dquery);
if(!$dresult) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}

$ndquery = "SELECT rd.*, d.name dname, t.name tname FROM race_driver rd JOIN team_driver td ON (td.id = rd.team_driver) JOIN team t ON (t.id = td.team) JOIN driver d ON (d.id = td.driver) WHERE rd.race='$race' AND (rd.status != 0) ORDER BY rd.position ASC";
$ndresult = mysql_query($ndquery);
if(!$dresult) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}

$rsquery = "SELECT * FROM point_ruleset WHERE id='{$item['ruleset']}'";
$rsresult = mysql_query($rsquery);
if(!$rsresult) {
	show_error("MySQL Error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($rsresult) == 0) {
	show_error("Ruleset does not exist\n");
	return;
}
$ruleset = mysql_fetch_array($rsresult);

if($item['ruleset_qualifying'] != 0) {
	$qrsquery = "SELECT * FROM point_ruleset WHERE id='{$item['ruleset_qualifying']}'";
	$qrsresult = mysql_query($qrsquery);
	if(!$qrsresult) {
		show_error("MySQL Error: " . mysql_error() . "\n");
		return;
	}
	if(mysql_num_rows($qrsresult) == 0) {
		show_error("Qualifying ruleset does not exist\n");
		return;
	}
	$ruleset_qualifying = mysql_fetch_array($qrsresult);
}
?>
<h1>Race results</h1>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr>
	<td width="20%">Name:</td>
	<td width="30%"><?=$item['name']?></td>
	<td width="20%">Laps:</td>
	<td width="30%"><?=$item['laps']?></td>
</tr>
<tr>
	<td>Track:</td>
	<td><?=$item['track']?></td>
	<? if($item['season'] == 0) { ?>
	<td>Division/Ruleset:</td>
	<td><?=$item['dname']?> / <?=$item['rsname']?><?=!empty($item['qrsname']) ? " (qualifying: " . $item['qrsname'] : ""?>)</td>
	<? } else { ?>
	<td>Season / Division:</td>
	<td><?=$item['sname']?> / <?=$item['dname']?></td>
	<? } ?>
</tr>
<tr>
	<td>Date/Time:</td>
	<td>
		<?=date("j F Y, H:i", $date)?>
	</td>
	<td>Max players:</td>
	<td><?=$item['maxplayers']?></td>
</tr>
<tr>
	<td colspan="4">
	<div align="center">
	<strong>
	<?
	if($item['progress'] == RACE_NEW) {
		echo "Race is planned\n";
	}
	elseif($item['progress'] == RACE_QUALIFYING) {
		if($item['result_official'])
			echo "Official qualifying results\n";
		else
			echo "Unofficial qualifying results\n";
	}
	elseif($item['progress'] == RACE_RACE) {
		if($item['result_official'])
			echo "Official race results\n";
		else
			echo "Unofficial race results\n";
	}
	?>
	</strong>
	</div>
	</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td>&nbsp;</td>
	<td>Driver</td>
	<td>Team</td>
	<? if($item['progress'] != RACE_NEW) { ?>
	<td align="right">Qual</td>
	<? if($item['progress'] != RACE_QUALIFYING) { ?>
	<td align="right">Laps</td>
	<td align="right"><span class="abbr" title="Fastest Lap">FL</span></td>
	<td align="right">Time</td>
	<td align="right">Gap</td>
	<td align="right">Pts</td>
	<? } ?>
	<? } ?>
</tr>
<?
$style = "odd";
while($ditem = mysql_fetch_array($dresult)) {
	if(!isset($best_time)) $best_time = $ditem['time'];
	if(!isset($most_laps)) $most_laps = $ditem['laps'];
	if($ditem['status'] != 0)
		$time = $race_status_s[$ditem['status']];
	else
		$time = time_hr($ditem['time']);

	if($most_laps > 0) {
		$laps = $ditem['laps'] . "/" . $item['laps'];
		if($ditem['laps'] < $most_laps)
			$gap = "+" . ($most_laps - $ditem['laps']) . " Laps";
		elseif($best_time > 0) {
			$time_gap = $ditem['time'] - $best_time;
			if($time_gap > 0)
				$gap = "+" . time_hr($ditem['time'] - $best_time);
			else
				$gap = time_hr($ditem['time'] - $best_time);
		}	
		else {
			$gap = "";
			$time = "";
		}
	}
	else {
		$laps = "";
		$gap = "";
		$time = "";
	}
?>
<tr class="<?=$style?>">
	<td width="30" align="right"><?=++$position?>&nbsp;</td>
	<td><?=$ditem['dname']?></td>
	<td><?=$ditem['tname']?></td>
	<? if($item['progress'] != RACE_NEW) { ?>
	<td width="26" align="right"><?=$ditem['grid']?></td>
	<? if($item['progress'] != RACE_QUALIFYING) { ?>
	<td width="50" align="right"><?=$laps?></td>
	<td width="20" align="right"><?if($ditem['fastest_lap']=='1') echo "<img src=\"images/ok16.png\" alt=\"yes\">";?></td>
	<td width="80" align="right"><?=$time?></td>
	<td width="80" align="right"><?=$gap?></td>
	<td width="30" align="right"><?=points_total($position, $ditem['grid'], $ditem['fastest_lap'], $ruleset)?></td>
	<? } ?>
	<? } ?>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}

while($ditem = mysql_fetch_array($ndresult)) {
	if(!isset($best_time)) $best_time = $ditem['time'];
	if(!isset($most_laps)) $most_laps = $ditem['laps'];
	if($ditem['status'] != 0)
		$time = $race_status_s[$ditem['status']];
	else
		$time = time_hr($ditem['time']);

	if($most_laps > 0) {
		$laps = $ditem['laps'] . "/" . $item['laps'];
		if($ditem['laps'] < $most_laps)
			$gap = "+" . ($most_laps - $ditem['laps']) . " Laps";
		elseif($best_time > 0) {
			$time_gap = $ditem['time'] - $best_time;
			if($time_gap > 0)
				$gap = "+" . time_hr($ditem['time'] - $best_time);
			else
				$gap = time_hr($ditem['time'] - $best_time);
		}	
		else {
			$gap = "";
			$time = "";
		}
	}
	else {
		$laps = "";
		$gap = "";
		$time = "";
	}
?>
<tr class="<?=$style?>">
	<td width="30" align="right">-&nbsp;</td>
	<td><?=$ditem['dname']?></td>
	<td><?=$ditem['tname']?></td>
	<? if($item['progress'] != RACE_NEW) { ?>
	<td width="26" align="right"><?=$ditem['grid']?></td>
	<? if($item['progress'] != RACE_QUALIFYING) { ?>
	<td width="50" align="right"><?=$laps?></td>
	<td width="20" align="right"><?if($ditem['fastest_lap']=='1') echo "<img src=\"images/ok16.png\" alt=\"yes\">";?></td>
	<td width="80" align="right"><?=$race_status_s[$ditem['status']]?></td>
	<td width="80" align="right">-</td>
	<td width="30" align="right">-</td>
	<? } ?>
	<? } ?>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
