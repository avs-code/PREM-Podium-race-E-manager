<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
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

mysqlconnect();
$query = "UPDATE point_ruleset SET rp1='$rp1', rp2='$rp2', rp3='$rp3', rp4='$rp4', rp5='$rp5', rp6='$rp6', rp7='$rp7', rp8='$rp8', rp9='$rp9', rp10='$rp10', rp11='$rp11', rp12='$rp12', rp13='$rp13', rp14='$rp14', rp15='$rp15', qp1='$qp1', qp2='$qp2', qp3='$qp3', qp4='$qp4', qp5='$qp5', fl='$fl'";
$query .= "WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=points", "Ruleset succesfully modified\n$msg");
?>
