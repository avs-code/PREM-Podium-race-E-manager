<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$name = htmlspecialchars($_POST['name']);
$rp1 = $_POST['rp1'];
$rp2 = $_POST['rp2'];
$rp3 = $_POST['rp3'];
$rp4 = $_POST['rp4'];
$rp5 = $_POST['rp5'];
$rp6 = $_POST['rp6'];
$rp7 = $_POST['rp7'];
$rp8 = $_POST['rp8'];
$rp9 = $_POST['rp9'];
$rp10 = $_POST['rp10'];
$rp11 = $_POST['rp11'];
$rp12 = $_POST['rp12'];
$rp13 = $_POST['rp13'];
$rp14 = $_POST['rp14'];
$rp15 = $_POST['rp15'];
$qp1 = $_POST['qp1'];
$qp2 = $_POST['qp2'];
$qp3 = $_POST['qp3'];
$qp4 = $_POST['qp4'];
$qp5 = $_POST['qp5'];
$fl = $_POST['fl'];

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";

if(!empty($error)) error($error);

$msg = "";

mysqlconnect();
$query = "SELECT * FROM point_ruleset WHERE name = '$name'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Ruleset name is already in use\n");

$query = "INSERT INTO point_ruleset VALUES ('', '$name', '$rp1', '$rp2', '$rp3', '$rp4', '$rp5', '$rp6', '$rp7', '$rp8', '$rp9', '$rp10', '$rp11', '$rp12', '$rp13', '$rp14', '$rp15', '$qp1', '$qp2', '$qp3', '$qp4', '$qp5', '$fl')";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=points", "Ruleset succesfully added\n$msg");
?>
