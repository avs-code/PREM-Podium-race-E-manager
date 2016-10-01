<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$name = htmlspecialchars($_POST['name']);
$division = addslashes($_POST['division']);
$ruleset = addslashes($_POST['ruleset']);
$ruleset_qualifying = addslashes($_POST['ruleset_qualifying']);
$maxteams = addslashes($_POST['maxteams']);

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";
if(empty($maxteams)) $error .= "You must fill in the number of maximal teams\n";

if(!empty($error)) error($error);

$msg = "";

mysqlconnect();
$query = "SELECT * FROM season WHERE name = '$name' AND division = '$division'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Season with the same name and division does already exist\n");

$query = "INSERT INTO season (name, division, ruleset, ruleset_qualifying, maxteams) VALUES ('$name', '$division', '$ruleset', '$ruleset_qualifying', '$maxteams')";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=seasons", "Season succesfully added\n$msg");
?>
