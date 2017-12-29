<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = intval($_POST['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "DELETE FROM rules_table WHERE id='$id' LIMIT 1";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=show_rules_edit", "Rules succesfully removed\n");
?>
