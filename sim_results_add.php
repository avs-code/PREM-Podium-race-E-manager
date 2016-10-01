<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$season = $_GET['season'];

$squery = "SELECT s.*, d.name dname FROM season s JOIN division d ON (d.id = s.division)";
$sresult = mysql_query($squery);
if(!$sresult) {
	show_error("MySQL error: " . mysql_error());
	return;
}




?>
<h1>Add Sim_results</h1><br />
<p></p>1. First upload your result here (push green arrow button): <a href="http://simresults.net" target="_blank"><img src="images/arrow.png" style="border-width: 0px; border-style: solid; width: 50px; height: 50px;" /></a><br />
2. After having uploaded result race file, click in "yes, save permanently"<br />
3. copy the url of page (similar to http://simresults.net/160530-B7t) this is your <strong>simresult_link</strong><br /><p></p>
<form action="sim_results_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Race_name:</td>
	<td><input type="text" name="race_name" maxlength="30"></td>
</tr>
<tr>
	<td>Simresults_link:</td>
	<td><input type="url" name="simresults_url" maxlength="200"></td>
</tr>

<tr>
	<td>Season:</td>
	<td>
		<select id="season" name="season" onchange="showOptions();">
		<option value="0">--NO SEASON--</option>
		<? while($sitem = mysql_fetch_array($sresult)) { ?>
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