<?
require_once ("session_start.php");
if (!isset($login))
    error("You do not have administrator rights\n");

$name = htmlspecialchars($_POST['race_name']);
$season = addslashes($_POST['season']);
$simresults_url = htmlspecialchars($_POST['simresults_url']);

$error = "";

if (empty($name))
    $error .= "You must fill in a name\n";
if (empty($simresults_url))
    $error .= "You must fill in a image_url\n";

if (!empty($error))
    error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "INSERT INTO sim_results (race_name, season, simresults_url) VALUES ('$name', '$season', '$simresults_url')";
$result = mysqli_query($link,$query);
if (!$result)
    error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=sim_results", "sim_results_url succesfully added\n$msg");
?>
