<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$page = addslashes($_POST['page']);
$season = addslashes($_POST['season']);

$error = "";

if(empty($page)) $error .= "You must fill in a number\n";


if(!empty($error)) error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM standing_pages WHERE page = '$page'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");
if(mysqli_num_rows($result) > 0) error("Standing with the same page does already exist\n");

$query = "INSERT INTO standing_pages (page, season) VALUES ('$page', '$season')";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=blocks", "Standing page succesfully added\n$msg");
mysqli_free_result($result)
?>
