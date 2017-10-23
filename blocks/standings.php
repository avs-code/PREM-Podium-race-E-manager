<?php
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$sql_standing_pages = "SELECT sp.id, sp.page, sp.season, s.name, s.division, d.name FROM `standing_pages` AS sp LEFT JOIN `season` AS s ON sp.season = s.id LEFT JOIN `division` AS d ON d.id = s.division ORDER BY sp.page ASC";
$exe_standing_pages = mysqli_query($link,$sql_standing_pages);
if(!$exe_standing_pages) {
	error("MySQL error: " . mysqli_error($link) . "\n");
}
if(mysqli_num_rows($exe_standing_pages) > 0) {
	while(list($spID, $spPage, $spSeason, $seasonName, $divisionName, $seasonDivision_n) = mysqli_fetch_array($exe_standing_pages)) {
		$standing_pages[$spID] = array(
			'page' => $spPage,
			'season' => $spSeason,
			'seasonName' => $seasonName,
            'divisionName' => $divisionName,
            'seasonDivision' => $seasonDivision_n

		);
	}
	mysqli_free_result($exe_standing_pages);
}


$sql_season_details = "SELECT `id`, `name`, `division`, `ruleset` FROM `season`";
$exe_season_details = mysqli_query($link,$sql_season_details);
while(list($seasonID, $seasonName, $seasonDivision, $seasonRuleset) = mysqli_fetch_array($exe_season_details)) {
	$season[$seasonID] = array(
		'name' => $seasonName,
		'division' => $seasonDivision,
		'ruleset' => $seasonRuleset
	);
}
mysqli_free_result($exe_season_details);

$sql_point_ruleset = "SELECT pr.id, pr.rp1, pr.rp2, pr.rp3, pr.rp4, pr.rp5, pr.rp6, pr.rp7, pr.rp8, pr.rp9, pr.rp10, pr.rp11, pr.rp12, pr.rp13, pr.rp14, pr.rp15 FROM `point_ruleset` AS pr";
$exe_point_ruleset = mysqli_query($link,$sql_point_ruleset);
while(list($prID, $prrp1, $prrp2, $prrp3, $prrp4, $prrp5, $prrp6, $prrp7, $prrp8, $prrp9, $prrp10, $prrp11, $prrp12, $prrp13, $prrp14, $prrp15) = mysqli_fetch_array($exe_point_ruleset)) {
	$point_ruleset[$prID] = array(
		'rp1' => $prrp1,
		'rp2' => $prrp2,
		'rp3' => $prrp3,
		'rp4' => $prrp4,
		'rp5' => $prrp5,
		'rp6' => $prrp6,
		'rp7' => $prrp7,
		'rp8' => $prrp8,
		'rp9' => $prrp9,
		'rp10' => $prrp10,
		'rp11' => $prrp11,
		'rp12' => $prrp12,
		'rp13' => $prrp13,
		'rp14' => $prrp14,
		'rp15' => $prrp15
	);
}
mysqli_free_result($exe_point_ruleset);
?>

<!--Standing block-->

<div>


	<div class="w3-responsive">
	<ul class="w3-pagination">
		<?php
		foreach ($standing_pages as $spID => $spDetails) {
			?>
			<li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'standing_<?=$spID;?>');" title="<?=$spDetails['seasonName'];?>/<?=$spDetails['seasonDivision'];?>"><i class="w3-margin-center"></i><?=$spDetails['page'];?></a></li>
			<?php
		}
		?>
	</ul>

	<?php
	foreach ($standing_pages as $spID => $spDetails) {

		?>
		<div id="standing_<?=$spID;?>" class="myLink">


			<!--Team standing-->
			<div class="w3-center w3-black w3-text-white"><h2><?=$spDetails['seasonName'];?><br /><?=$spDetails['seasonDivision'];?></div></h2><div class="w3-center w3-indigo w3-text-white"><h3>Team Standings</h3></div>
			<?php
			$sql_teams = "SELECT t.id, t.name FROM `team` AS t LEFT JOIN `season_team` AS st ON st.team = t.id WHERE st.season = ".intval($spDetails['season']);
			$exe_teams = mysqli_query($link,$sql_teams);
			while(list($teamID, $teamName) = mysqli_fetch_array($exe_teams)) {
				echo $teamName."<br/>";
			}
			mysqli_free_result($exe_teams);
			?>
			<!--Mercedes 	765<br />
			Red Bull Racing TAG Heuer 	468<br />
			Ferrari 	398<br />
			Force India Mercedes 	173<br />
			Williams Mercedes 	138<br />
			McLaren Honda 	76<br />-->

			<!--Driver standing-->
			<div class="w3-center w3-indigo w3-text-white"><h3>Driver Standings</h3></div>
			<?php
			$sql_drivers = "SELECT d.id did, d.name dname FROM season_team st JOIN team t ON (st.team = t.id) JOIN team_driver td ON (td.team = t.id) JOIN driver d ON (d.id = td.driver) WHERE st.season = '".intval($spDetails['season'])."' ORDER BY t.name ASC, d.name ASC";
			$exe_drivers = mysqli_query($link,$sql_drivers);
			while(list($driverID, $driverName) = mysqli_fetch_array($exe_drivers)) {
				echo $driverName."<br/>";
			}
			mysqli_free_result($exe_drivers);
			?>
			<!--
			Nico Rosberg Mercedes 385<br />
			Lewis Hamilton Mercedes 380<br />
			Daniel Ricciardo Red Bull Racing TAG Heuer 256<br />
			Sebastian Vettel Ferrari 	212<br />
			Max Verstappen Red Bull Racing TAG Heuer 204<br />
			Kimi Räikkönen Ferrari 186<br />-->


			<p></p>
		</div>
		<?php
	}
	?>

	<script>
		// Team and driver Standings
		function openLink(evt, linkName) {
			var i, x, tablinks;
			x = document.getElementsByClassName("myLink");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i < x.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
			}
			document.getElementById(linkName).style.display = "block";
			evt.currentTarget.className += " w3-red";
		}
		// Click on the first tablink on load
		document.getElementsByClassName("tablink")[0].click();
	</script>


</div>
</div>
