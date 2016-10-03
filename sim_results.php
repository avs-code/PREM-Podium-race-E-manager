<? if (!defined("CONFIG"))
    exit(); ?>
<?

$sim_results = "SELECT `sim_results`.`race_name` , `season`.`name` AS season_name, `sim_results`.`simresults_url`
FROM sim_results, season ORDER BY `season`.`name` ASC LIMIT 0 , 30";
$result = mysql_query($sim_results);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Simresults</h1>
<h2>Simresults</h2>
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
<td><h1>Name</h1></td>
<td><h1><strong>Season</strong></h1></td>
<td><h1>Simresults_URL</h1></td>
</tr>
<?
while ($sitem = mysql_fetch_array($result)) {?>
<tr class="w3-hover-green">
<td><?= $sitem['race_name'] ?></td>
<td><?= $sitem['season_name'] ?></td>
<td><a href="<?= $sitem['simresults_url']; ?>" target="_blank">simresults</a></td>
</tr><?
}
?>
</table>
</div>