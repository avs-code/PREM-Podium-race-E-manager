<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT r.*, s.name sname, d.name dname, rs.name rsname FROM race r JOIN division d ON (d.id = r.division) JOIN point_ruleset rs ON (rs.id = r.ruleset) LEFT JOIN season s ON (s.id = r.season) WHERE r.id='$id' ORDER BY r.date DESC";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Race does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$date = strtotime($item['date']);
?>
<h1>Delete race</h1>

<form action="race_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Track:</td>
	<td><?=$item['track']?></td>
</tr>
<tr>
	<td>Imagelink:</td>
	<td><?=$item['imagelink']?></td>
</tr>
<tr>
	<td>Laps:</td>
	<td><?=$item['laps']?></td>
</tr>
<? if($item['season'] != 0) { ?>
<tr>
	<td>Season:</td>
	<td><?=$item['sname']?></td>
</tr>
<? } else { ?>
<tr>
	<td>Division:</td>
	<td><?=$item['dname']?></td>
</tr>
<tr>
	<td>Ruleset:</td>
	<td><?=$item['rsname']?></td>
</tr>
<? } ?>
<tr>
	<td>Date:</td>
	<td><?=date("d-m-Y", $date)?></td>
</tr>
<tr>
	<td>Time:</td>
	<td><?=date("H:i", $date)?></td>
</tr>
<tr>
	<td>Max players:</td>
	<td><?=$item['maxplayers']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure you want to delete this race?</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="season" value="<?=$item['season']?>">
		<input type="submit" class="button submit" value="Yes">
		<input type="button" class="button cancel" value="No" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
