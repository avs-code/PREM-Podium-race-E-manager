<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$name = htmlspecialchars($_POST['name']);
$division = addslashes($_POST['division']);
$ruleset = addslashes($_POST['ruleset']);
$ruleset_qualifying = addslashes($_POST['ruleset_qualifying']);
$team = $_POST['team'];
$maxteams = addslashes($_POST['maxteams']);
$series_logo_simresults = addslashes($_POST['series_logo_simresults']);

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";

if(!empty($error)) error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "SELECT * FROM season WHERE name = '$name' AND division = '$division' AND id != '$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");
if(mysqli_num_rows($result) > 0) error("Season with the same name and division does already exist\n");

$query = "UPDATE season SET name='$name', division='$division', ruleset='$ruleset', ruleset_qualifying='$ruleset_qualifying', maxteams='$maxteams', series_logo_simresults='$series_logo_simresults' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

$query = "DELETE FROM season_team WHERE season='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

if(is_array($team)) {
	foreach($team as $t) {
		if(empty($t)) continue;
		$t = addslashes($t);
		$values .= "('$id', '$t'), ";
	}
	$values = substr($values, 0, -2); //laatste 2 tekens strippen

	if(!empty($values)) {
		$query = "INSERT INTO season_team (season, team) VALUES $values";
		$result = mysqli_query($link,$query);
		if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");
	}
}

return_do(".?page=seasons", "Season succesfully modified\n$msg");
?>
