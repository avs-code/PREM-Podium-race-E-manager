<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE s.name LIKE '%$filter%' OR d.name LIKE '%$filter%' OR rs.name LIKE '%$filter%'";
}
$query = "SELECT s.*, d.name dname, rs.name rsname, qrs.name qrsname, COUNT(st.team) teamcount FROM season s JOIN division d ON (s.division = d.id) JOIN point_ruleset rs ON (rs.id = s.ruleset) LEFT JOIN point_ruleset qrs ON (qrs.id = s.ruleset_qualifying) LEFT JOIN season_team st ON (st.season = s.id) $query_where GROUP BY s.id ORDER BY s.name ASC, d.name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
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
if(mysql_num_rows($result) == 0) {
	show_msg("No seasons found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="40">&nbsp;</td>
	<td>Season</td>
	<td>Division</td>
	<td>Ruleset</td>
	<td>Ruleset Qual</td>
	<td width="65" align="center">Teams</td>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="<?=$style?>">
	<td width="40">
		<a href=".?page=season_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=season_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td><?=$item['dname']?></td>
	<td><?=$item['rsname']?></td>
	<td><?=$item['qrsname']?></td>
	<td width="65" align="center"><?=$item['teamcount']?> / <?=$item['maxteams']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
