<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

require_once("results_functions.php");
#echo "<pre>"; print_r($_POST); echo "</pre>"; die();

$id = addslashes($_POST['id']);
$season = addslashes($_POST['season']);
$replay = htmlspecialchars($_POST['replay']);
$simresults = htmlspecialchars($_POST['simresults']);
$official = isset($_POST['official']) ? 1 : 0;
$driver = $_POST['driver'];
$grid = $_POST['grid'];
$pos = $_POST['pos'];
$laps = $_POST['laps'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];
$second = $_POST['second'];
$ms = $_POST['ms'];
$fl = $_POST['fl'];
$status = $_POST['status'];
$dplate = $_POST['dplate'];

function has_duplicates($ar, $values_ok) {
	$has = array();

	if(!is_array($ar)) $ar = array($ar);
	if(!is_array($values_ok)) $values_ok = array($values_ok);

	foreach($ar as $a) {
		if(in_array($a, $values_ok)) continue;
		if(in_array($a, $has)) return true;
		array_push($has, $a);
	}
	return false;
}

$error = "";

if(has_duplicates($driver, 0)) $error .= "Duplicate drivers selected\n";
if(has_duplicates($grid, array(0, ""))) $error .= "Duplicate grid positions selected\n";
if(has_duplicates($position, array(0, ""))) $error .= "Duplicate positions selected\n";
if(count($fl) > 1) $error .= "Only one driver can have the fastest lap\n";

if(!empty($error)) error($error);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$has_qualifying = false;
$has_race = false;

$pos_pres_count = 0;
$pos_abs_count = 0;

$grid_pres_count = 0;
$grid_abs_count = 0;

if(is_array($driver)) {
	$query_values = "";

	for($x = 0; $x < count($driver); $x++) {
		if(empty($driver[$x]))
			continue;

		if((int)$grid[$x] != 0) $has_qualifying = true;
		if((int)$pos[$x] != 0) $has_race = true;

		if(empty($pos[$x]) || $pos[$x] == "0") $pos_abs_count++;
		else $pos_pres_count++;

		if(empty($grid[$x]) || $grid[$x] == "0") $grid_abs_count++;
		else $grid_pres_count++;

		$d = addslashes($driver[$x]);
		$g = addslashes($grid[$x]);
		$p = addslashes($pos[$x]);
		$l = addslashes($laps[$x]);
		$pl = addslashes($dplate[$x]);
		$m = $ms[$x];
		if($m < 0) $m = 0;
#		if($m != 0) {
#			while($m < 100) {
#				$m *= 10;
#			}
#		}
		$t = ($hour[$x] * 3600000) + ($minute[$x] * 60000) + ($second[$x] * 1000) + $m;
		$f = isset($fl[$x]) ? 1 : 0;
		$s = addslashes($status[$x]);
		$query_values .= "('$id',  '$d', '$g', '$p', '$l', '$t', '$f', '$s', '$pl'), ";
	}
	$query_values = substr($query_values, 0, -2);

	if($pos_pres_count > 0 && $pos_abs_count > 0)
		error("Please fill in the final positions for all drivers\n");

	if($grid_pres_count > 0 && $grid_abs_count > 0)
		error("Please fill in the grid positions for all drivers\n");

	$query = "DELETE FROM race_driver WHERE race='$id'";
	$result = mysqli_query($link,$query);
	if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

	if(!empty($query_values)) {
		$query = "INSERT INTO race_driver (race, team_driver, grid, position, laps, time, fastest_lap, status, dplate) VALUES $query_values";
		$result = mysqli_query($link,$query);
		if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");
	}
}

$progress = RACE_NEW;
if($has_qualifying) $progress = RACE_QUALIFYING;
if($has_race) $progress = RACE_RACE;

$query = "UPDATE race SET result_official='$official', progress='$progress', replay='$replay', simresults='$simresults' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=races&season=$season", "Race results succesfully modified\n$msg");
?>
