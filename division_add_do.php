<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";
if(empty($type)) $error .= "You must fill in a type\n";

if(!empty($error)) error($error);

$msg = "";

mysqlconnect();
$query = "SELECT * FROM division WHERE name = '$name'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Division name is already in use\n");

$query = "INSERT INTO division (name, type) VALUES ('$name', '$type')";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=divisions", "Division succesfully added\n$msg");
?>
