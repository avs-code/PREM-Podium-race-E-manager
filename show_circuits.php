<? if (!defined("CONFIG"))
    exit(); ?>
<?
$circuits = "SELECT race.track, race.name, race.division, race.date, race.imagelink, race.maxplayers, race.season, season.name AS season_name FROM race INNER JOIN season on season.id=race.season ORDER BY race.season ASC, race.date ASC LIMIT 0, 30";
$result = mysql_query($circuits);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Circuits</h1>
<h2>Circuits</h2>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td>Name</td>
	<td>Track</td>
	<td>Season</td>
    <td>Date</td>
    <td>Image</td>
</tr>
<?
$style = "odd";
while ($sitem = mysql_fetch_array($result)) { ?>
<tr class="<?= $style ?>">
<td><?= $sitem['name'] ?></td>
<td><?= $sitem['track'] ?></td>
<td><?= $sitem['season_name'] ?></td>
<td><?= $sitem['date'] ?></td>
<td><a href="<?= $sitem['imagelink'] ?>" target="_blank"><img src="<?= $sitem['imagelink']; ?>" width="250" height="165"/></a></td>
</tr>
<?
    $style = $style == "odd" ? "even" : "odd";
}
?>
</table>