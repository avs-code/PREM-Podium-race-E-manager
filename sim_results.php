<? if (!defined("CONFIG"))
    exit(); ?>
<?

$sim_results = "SELECT `sim_results`.`race_name` , `season`.`name` AS season_name, `sim_results`.`simresults_url` FROM sim_results, season ORDER BY `season`.`name` ASC LIMIT 0 , 30";
$result = mysql_query($sim_results);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Simresults</h1>
<h2>Simresults</h2>
<table border="0" width="100%" cellspacing="0" cellpadding="1">
<tr class="head">
<td><h1>Name</h1></td>
<td><h1><strong>Season</strong></h1></td>
<td><h1>Simresults_URL</h1></td>
</tr>
<?
$style = "odd";
while ($sitem = mysql_fetch_array($result)) {?>
<tr class="<?= $style ?>">
<td><?= $sitem['race_name'] ?></td>
<td><?= $sitem['season_name'] ?></td>
<td><a href="<?= $sitem['simresults_url']; ?>" target="_blank">simresults</a></td>
</tr>
<?
    $style = $style == "odd" ? "even" : "odd";
}
?>
</table>