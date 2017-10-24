<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$id = addslashes($_POST['id']);
$type = htmlspecialchars($_POST['type']);

mysqlconnect();
$query = "UPDATE division SET type='$type' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=divisions", "Division succesfully modified\n$msg");
?>
