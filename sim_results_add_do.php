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

mysqlconnect();

$query = "INSERT INTO sim_results (race_name, season, simresults_url) VALUES ('$name', '$season', '$simresults_url')";
$result = mysql_query($query);
if (!$result)
    error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=sim_results", "sim_results_url succesfully added\n$msg");
?>