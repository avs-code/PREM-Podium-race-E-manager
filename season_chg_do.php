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

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";

if(!empty($error)) error($error);

$msg = "";

mysqlconnect();

$query = "SELECT * FROM season WHERE name = '$name' AND division = '$division' AND id != '$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Season with the same name and division does already exist\n");

$query = "UPDATE season SET name='$name', division='$division', ruleset='$ruleset', ruleset_qualifying='$ruleset_qualifying', maxteams='$maxteams' WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

$query = "DELETE FROM season_team WHERE season='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

if(is_array($team)) {
	foreach($team as $t) {
		if(empty($t)) continue;
		$t = addslashes($t);
		$values .= "('$id', '$t'), ";
	}
	$values = substr($values, 0, -2); //laatste 2 tekens strippen

	if(!empty($values)) {
		$query = "INSERT INTO season_team (season, team) VALUES $values";
		$result = mysql_query($query);
		if(!$result) error("MySQL Error: " . mysql_error() . "\n");
	}
}

return_do(".?page=seasons", "Season succesfully modified\n$msg");
?>
