<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);
$logo = htmlspecialchars($_POST['logo']);
$driver = $_POST['driver'];
$preserve = $_POST['preserve'];

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
if(!empty($error)) error($error);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "UPDATE team SET name='$name', logo='$logo' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

if(is_array($driver) && count($driver > 0)) {
	$query_values = "";

	for($x = 0; $x < count($driver); $x++) {
		if(empty($driver[$x]))
			continue;

		$d = addslashes($driver[$x]);
		$query_values .= "('$id',  '$d'), ";
	}
	$query_values = substr($query_values, 0, -2);

	$query_preserve = "";
	if(is_array($preserve) && count($preserve) > 0) {
		$query_preserve .= " AND (";
		foreach($preserve as $p) {
			$query_preserve .= "driver != '" . mysqli_real_escape_string($link,$p) . "' AND ";
		}
		$query_preserve = substr($query_preserve, 0, -4) . ")";
	}
	$query = "DELETE FROM team_driver WHERE team='$id'" . $query_preserve;
	$result = mysqli_query($link,$query);
	if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

	if(!empty($query_values)) {
		$query = "INSERT INTO team_driver (team, driver) VALUES $query_values";
		$result = mysqli_query($link,$query);
		if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");
	}
}

return_do(".?page=teams", "Team succesfully modified\n$msg");
?>
