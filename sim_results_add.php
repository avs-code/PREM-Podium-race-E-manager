<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$season = $_GET['season'];

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$squery = "SELECT s.*, d.name dname FROM season s JOIN division d ON (d.id = s.division)";
$sresult = mysqli_query($link,$squery);
if(!$sresult) {
	show_error("MySQL error: " . mysql_error($link));
	return;
}
?>

<!--ADD-->
<h1>Add Sim_results</h1><br />
<p></p>1. First upload your result here (push green arrow button): <a href="http://simresults.net" target="_blank"><img src="images/arrow.png" style="border-width: 0px; border-style: solid; width: 50px; height: 50px;" /></a><br />
2. After having uploaded result race file, click in "yes, save permanently"<br />
3. copy the url of page (similar to http://simresults.net/160530-B7t) this is your <strong>simresult_url</strong><br /><p></p>
<form action="sim_results_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Race_name:</td>
	<td><input type="text" name="race_name" maxlength="30"></td>
</tr>
<tr>
	<td>Simresults_url:</td>
	<td><input type="url" name="simresults_url" maxlength="200"></td>
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
	}
showOptions();
// -->
</script>

<!--REMOVE-->
<?
if(isset($_GET['filter'])) {
	$filter = mysql_real_escape_string($_GET['filter']);
	$query_where = "WHERE sim_results LIKE '%$filter%'";
}
$query = "SELECT `sim_results`.`id`, `sim_results`.`race_name` , `season`.`name` AS season_name, `sim_results`.`simresults_url` FROM sim_results LEFT JOIN season ON `sim_results`.`season` = `season`.`id` $query_where ORDER BY id ASC";
$result = mysqli_query($link,$query);

if(!$result) {
	show_error("MySQL error: " . mysql_error($link));
	return;
}

?>
<p></p><p></p>
<h1>Remove Sim_Results</h1>

<div align="right">
	<form action="." method="GET">
		<input type="hidden" name="page" value="sim_results_add">
		<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
	</form>
</div>

<?php
if(mysql_num_rows($result) == 0) {
	show_msg("No sim_results found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
	<tr class="w3-dark-grey">
		<td>&nbsp;</td>
		<td>Race name</td>
        <td>Season</td>
		<td align="center">Simresults_url</td>
	</tr>

	<?
	while($item = mysqli_fetch_array($result)) {
		?>
		<tr class="w3-hover-green">
			<td>
				<a href=".?page=sim_results_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
			</td>
			<td><?=$item['race_name']?></td>
            <td><?=$item['season_name']?></td>
			<td><?=$item['simresults_url']?></td>
		</tr>
		<?
	}
	?>
</table>
