<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$page = addslashes($_POST['page']);
$season = addslashes($_POST['season']);

$error = "";

if(empty($page)) $error .= "You must fill in a number\n";


if(!empty($error)) error($error);

$msg = "";

mysqlconnect();
$query = "SELECT * FROM standing_pages WHERE page = '$page'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Standing with the same page does already exist\n");

$query = "INSERT INTO standing_pages (page, season) VALUES ('$page', '$season')";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=blocks", "Standing page succesfully added\n$msg");
mysql_free_result($result)
?>
