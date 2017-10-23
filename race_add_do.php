<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$name = htmlspecialchars($_POST['name']);
$track = htmlspecialchars($_POST['track']);
$laps = addslashes($_POST['laps']);
$season = addslashes($_POST['season']);
$diff_ruleset = isset($_POST['diff_ruleset']);
$division = addslashes($_POST['division']);
$ruleset = addslashes($_POST['ruleset']);
$ruleset_qualifying = addslashes($_POST['ruleset_qualifying']);
$date = mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year']);
$date = date("Y-m-d H:i:s",$date);
$maxplayers = addslashes($_POST['maxplayers']);
$imagelink = htmlspecialchars($_POST['imagelink']);

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";
if(empty($track)) $error .= "You must fill in a track\n";
if(empty($laps)) $error .= "You must fill in the number of laps\n";
if(empty($maxplayers)) $error .= "You must fill in the number of max players\n";
if(empty($imagelink)) $error .= "You must fill in a image_url\n";

if(!empty($error)) error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

// Take division and ruleset from season
if($season != 0) {
	$query = "SELECT division, ruleset, ruleset_qualifying FROM season s WHERE id='$season'";
	$result = mysqli_query($link,$query);
	if(!$result) error("MySQL error: " . mysql_error($link) . "\n");
	if(mysql_num_rows($result) == 0) error("Season does not exist\n");

	$item = mysql_fetch_array($result);

	$division = $item['division'];
	if(!$diff_ruleset) {
		$ruleset = $item['ruleset'];
		$ruleset_qualifying = $item['ruleset_qualifying'];
	}
}

$query = "INSERT INTO race (name, track, laps, season, division, ruleset, ruleset_qualifying, date, maxplayers, imagelink) VALUES ('$name', '$track', '$laps', '$season', '$division', '$ruleset', '$ruleset_qualifying', '$date', '$maxplayers', '$imagelink')";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=races&season=$season", "Race succesfully added\n$msg");
?>
