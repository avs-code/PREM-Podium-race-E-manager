<? if (!defined("CONFIG")) exit();
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$circuits = "SELECT race.track, race.name, race.division, race.date, race.imagelink, race.maxplayers, race.season, division.name AS division_name, season.name AS season_name FROM race LEFT JOIN division on division.id=race.division LEFT JOIN season on season.id=race.season WHERE race.date>=CURDATE() ORDER BY race.division ASC, race.date ASC";
$result = mysqli_query($link,$circuits);
if (!$result) {
    show_error("MySQL Error: " . mysqli_error($link) . "\n");
    return;
}
?>

<h1>Circuits Calendar</h1>
<h2>Circuits ordered by division & date</h2>

<div class="w3-container">
<div class="w3-responsive">
<table class="w3-table-all">
    <tr class="w3-dark-grey">
    	<td>Division</td>
		<td>Season</td>
		<td>Name</td>
    	<td>Track</td>
        <td>Date</td>
        <td>Image</td>
    </tr>

<? while ($sitem = mysqli_fetch_array($result)) { ?>

    <tr class="w3-hover-blue">
        <td><?= $sitem['division_name'] ?></td>
		<td><?= $sitem['season_name'] ?></td>
		<td><?= $sitem['name'] ?></td>
        <td><?= $sitem['track'] ?></td>
        <td><?= $sitem['date'] ?></td>
        <td><a href="<?= $sitem['imagelink'] ?>" target="_blank"><img src="<?= $sitem['imagelink']; ?>" width="250" height="165"/></a></td>
    </tr>

<? } ?>
</table>
</div>
</div>
