<!--Next events block-->
<div>

	<?php
	require_once("functions.php"); // import mysql function
	$link = mysqlconnect(); // call mysql function to get the link to the database

	$circuits = "SELECT race.track, race.date, race.division, division.name AS division_name
	FROM race LEFT JOIN division on division.id=race.division
	WHERE race.date>=CURDATE()
	ORDER BY race.date ASC LIMIT 3";
	$result = mysqli_query($link,$circuits);
	if (!$result) {
		show_error("MySQL Error: " . mysql_error($link) . "\n");
		return;
	}
	?>
	<div class="w3-responsive">
	<table class="w3-table-all">
		<tr class="w3-dark-grey">
			<td>Date</td>
			<td>Track</td>
			<td>Division</td>
		</tr>
		<?php

		while ($sitem = mysql_fetch_array($result)) { ?>

		<tr class="w3-hover-blue">
			<td><?= $sitem['date'] ?></td>
			<td><?= $sitem['track'] ?></td>
			<td><?= $sitem['division_name'] ?></td>
		</tr>
		<?php

		}
		?>
	</table>
</div>
</div>
