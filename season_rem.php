<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT s.*, d.name dname, rs.name rsname, qrs.name qrsname FROM season s JOIN division d ON (s.division = d.id) JOIN point_ruleset rs ON (rs.id = s.ruleset) LEFT JOIN point_ruleset qrs ON (qrs.id = s.ruleset_qualifying) WHERE s.id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Season does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$stquery = "SELECT t.name FROM season_team st JOIN team t ON (t.id = st.team) WHERE season='$id'";
$stresult = mysqli_query($link,$stquery);
if(!$stresult) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}
?>
<h1>Delete season</h1>

<form action="season_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Division:</td>
	<td><?=$item['dname']?></td>
</tr>
<tr>
	<td>Ruleset:</td>
	<td><?=$item['rsname']?></td>
</tr>
<tr>
	<td>Ruleset qualifying:</td>
	<td><?=$item['qrsname']?></td>
</tr>
<tr>
	<td>Teams:</td>
	<td>
	<? while($stitem = mysqli_fetch_array($stresult)) { ?>
		&bull; <?=$stitem['name']?><br>
	<? } ?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure you want to delete this season?</td>
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
