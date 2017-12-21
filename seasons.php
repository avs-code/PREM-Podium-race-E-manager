<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE s.name LIKE '%$filter%' OR d.name LIKE '%$filter%' OR rs.name LIKE '%$filter%'";
}
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT s.*, d.name dname, rs.name rsname, qrs.name qrsname, COUNT(st.team) teamcount FROM season s JOIN division d ON (s.division = d.id) JOIN point_ruleset rs ON (rs.id = s.ruleset) LEFT JOIN point_ruleset qrs ON (qrs.id = s.ruleset_qualifying) LEFT JOIN season_team st ON (st.season = s.id) $query_where GROUP BY s.id ORDER BY s.name ASC, d.name ASC";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

?>
<h1>Seasons</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="seasons">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=season_add">Add season</a>
<?
if(mysqli_num_rows($result) == 0) {
	show_msg("No seasons found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
	<td>&nbsp;</td>
	<td>Season</td>
	<td>Division</td>
	<td>Ruleset</td>
	<td>Series Logo for Simresults link</td>
	<td>Ruleset Qual</td>
	<td align="center">Teams</td>
</tr>

<?
#$style = "odd";
while($item = mysqli_fetch_array($result)) {
?>
<!--<tr class="<?=$style?>">-->
<tr class="w3-hover-green">
	<td>
		<a href=".?page=season_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=season_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td><?=$item['dname']?></td>
	<td><?=$item['rsname']?></td>
	<td><?=$item['series_logo_simresults']?></td>
	<td><?=$item['qrsname']?></td>
	<td width="65" align="center"><?=$item['teamcount']?> / <?=$item['maxteams']?></td>
</tr>
<?
#$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
