<!--Next events block-->
<div>
	  
	<?php
	$circuits = "SELECT race.track, race.date, race.season, season.name AS season_name
	FROM race INNER JOIN season on season.id=race.season
	WHERE race.date>=CURDATE()
	ORDER BY race.date ASC LIMIT 2";
	$result = mysql_query($circuits);
	if (!$result) {
		show_error("MySQL Error: " . mysql_error() . "\n");
		return;
	}
	?>
	<table class="w3-table-all">
		<tr class="w3-dark-grey">
			<td>Date</td>    
			<td>Track</td>
			<td>Season</td>
		</tr>
		<?php

		while ($sitem = mysql_fetch_array($result)) { ?>

		<tr class="w3-hover-blue">
			<td><?= $sitem['date'] ?></td>
			<td><?= $sitem['track'] ?></td>
			<td><?= $sitem['season_name'] ?></td>
		</tr>
		<?php

		}
		?>
	</table>
</div>