<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$page = addslashes($_POST['page']);
$season = addslashes($_POST['season']);

$error = "";

if(empty($page)) $error .= "You must fill in a number\n";

if(!empty($error)) error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "UPDATE standing_pages SET page='$page', season='$season' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=blocks", "Standing page succesfully modified\n$msg");
mysql_free_result($result)
?>
