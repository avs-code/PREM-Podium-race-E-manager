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
$rp16 = $_POST['rp16'];
$rp17 = $_POST['rp17'];
$rp18 = $_POST['rp18'];
$rp19 = $_POST['rp19'];
$rp20 = $_POST['rp20'];
$rp21 = $_POST['rp21'];
$rp22 = $_POST['rp22'];
$rp23 = $_POST['rp23'];
$rp24 = $_POST['rp24'];
$rp25 = $_POST['rp25'];
$rp26 = $_POST['rp26'];
$rp27 = $_POST['rp27'];
$rp28 = $_POST['rp28'];
$rp29 = $_POST['rp29'];
$rp30 = $_POST['rp30'];
$rp31 = $_POST['rp31'];
$rp32 = $_POST['rp32'];
$rp33 = $_POST['rp33'];
$rp34 = $_POST['rp34'];
$rp35 = $_POST['rp35'];
$rp36 = $_POST['rp36'];
$rp37 = $_POST['rp37'];
$rp38 = $_POST['rp38'];
$rp39 = $_POST['rp39'];
$rp40 = $_POST['rp40'];
$qp1 = $_POST['qp1'];
$qp2 = $_POST['qp2'];
$qp3 = $_POST['qp3'];
$qp4 = $_POST['qp4'];
$qp5 = $_POST['qp5'];
$fl = $_POST['fl'];

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "UPDATE point_ruleset SET rp1='$rp1', rp2='$rp2', rp3='$rp3', rp4='$rp4', rp5='$rp5', rp6='$rp6', rp7='$rp7', rp8='$rp8', rp9='$rp9', rp10='$rp10', rp11='$rp11', rp12='$rp12', rp13='$rp13', rp14='$rp14', rp15='$rp15', rp16='$rp16', rp17='$rp17', rp18='$rp18', rp19='$rp19', rp20='$rp20', rp21='$rp21', rp22='$rp22', rp23='$rp23', rp24='$rp24', rp25='$rp25', rp26='$rp26', rp27='$rp27', rp28='$rp28', rp29='$rp29', rp30='$rp30', rp31='$rp31', rp32='$rp32', rp33='$rp33', rp34='$rp34', rp35='$rp35', rp36='$rp36', rp37='$rp37', rp38='$rp38', rp39='$rp39', rp40='$rp40', qp1='$qp1', qp2='$qp2', qp3='$qp3', qp4='$qp4', qp5='$qp5', fl='$fl'";
$query .= "WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=points", "Ruleset succesfully modified\n$msg");
?>
