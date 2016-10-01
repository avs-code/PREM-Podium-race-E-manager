<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

$query = "SELECT * FROM point_ruleset WHERE id='$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Ruleset does not exist\n");
	return;
}
$item = mysql_fetch_array($result);

$error = "";

$squery = "SELECT s.name, d.name division FROM season s JOIN division d ON (s.division = d.id) WHERE (s.ruleset='$id' OR s.ruleset_qualifying='$id')";
$sresult = mysql_query($squery);
if(!$sresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($sresult) > 0) {
	$seasons = "";
	while($s = mysql_fetch_array($sresult)) {
		$seasons .= "&bull; " . $s['name'] . " (" . $s['division'] . ")\n";
	}
	$error .= "Ruleset cannot be deleted because it is related to the following season(s):\n" . $seasons;
}

$rquery = "SELECT r.name, r.track FROM race r WHERE (r.ruleset='$id' OR r.ruleset_qualifying='$id') AND r.season='0'";
$rresult = mysql_query($rquery);
if(!$rresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($rresult) > 0) {
	$races = "";
	while($r = mysql_fetch_array($rresult)) {
		$races .= "&bull; " . $r['name'] . " (" . $r['track'] . ")\n";
	}
	$error .= "Ruleset cannot be deleted because it is related to the following race(s):\n" . $races;
}

if(!empty($error)) {
	show_error($error);
	return;
}
?>
<h1>Delete ruleset</h1>

<form action="point_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name ruleset:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Race:</td>
	<td>
		<table border="0">
		<tr>
			<td width="22" align="right">1:</td>
			<td><?=$item['rp1']?></td>
			<td width="22" align="right">2:</td>
			<td><?=$item['rp2']?></td>
			<td width="22" align="right">3:</td>
			<td><?=$item['rp3']?></td>
			<td width="22" align="right">4:</td>
			<td><?=$item['rp4']?></td>
			<td width="22" align="right">5:</td>
			<td><?=$item['rp5']?></td>
		</tr>
		<tr>
			<td width="22" align="right">6:</td>
			<td><?=$item['rp6']?></td>
			<td width="22" align="right">7:</td>
			<td><?=$item['rp7']?></td>
			<td width="22" align="right">8:</td>
			<td><?=$item['rp8']?></td>
			<td width="22" align="right">9:</td>
			<td><?=$item['rp9']?></td>
			<td width="22" align="right">10:</td>
			<td><?=$item['rp10']?></td>
		</tr>
		<tr>
			<td width="22" align="right">11:</td>
			<td><?=$item['rp11']?></td>
			<td width="22" align="right">12:</td>
			<td><?=$item['rp12']?></td>
			<td width="22" align="right">13:</td>
			<td><?=$item['rp13']?></td>
			<td width="22" align="right">14:</td>
			<td><?=$item['rp14']?></td>
			<td width="22" align="right">15:</td>
			<td><?=$item['rp15']?></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>Qualifying:</td>
	<td>
		<table border="0">
		<tr>
			<td width="22" align="right">1:</td>
			<td><?=$item['qp1']?></td>
			<td width="22" align="right">2:</td>
			<td><?=$item['qp2']?></td>
			<td width="22" align="right">3:</td>
			<td><?=$item['qp3']?></td>
			<td width="22" align="right">4:</td>
			<td><?=$item['qp4']?></td>
			<td width="22" align="right">5:</td>
			<td><?=$item['qp5']?></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>Fatest lap:</td>
	<td><?=$item['fl']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure that you want to delete this ruleset?</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Yes">
		<input type="button" class="button cancel" value="No" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
