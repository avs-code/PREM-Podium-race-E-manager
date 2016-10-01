<?
// Start the session
require_once("session_start.php");

// Which page is requested?
$page = isset($_GET['page']) ? $_GET['page'] : PAGE_DEFAULT;
if($page == PAGE_ERROR) {
	$error = $_GET['error'];
}
if(!is_file($page . ".php") || (!is_readable($page . ".php"))) {
	$error = "Page '$page' does not exist or is not readable\n";
	$page = PAGE_ERROR;
}

if(!defined("CONFIG")) {
	$error = TITLE . " is not configured\n";
	$page = "error";
}

if($page != "error") {
	if(defined("USE_LOGIN") & defined("USER_MUST_LOGIN")) {
		// Check if user is logged in else kick to login page
		if(!isset($login)) {
			$page = "login";
		}
	}
}

if(defined("USE_MYSQL")) {
	// Connect to the database
	mysqlconnect();
}

// Start output
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=TITLE?> - <?=$config['org']?></title>
<meta content="Spark" name="author">
<meta content="PREM-Podium-Racing-E-Manager" name="description">
<meta content="assetto corsa, rfactor, life for speed," name="keywords">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="900">
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 7]>
<script defer type="text/javascript" src="pngfix.js"></script>
<![endif]-->
</head>
<body>
<div id="skel">
<div id="head">
<? include("header.php"); ?>
</div>
<div id="nav">
<? include("nav.php"); ?>
</div>
<div id="content">
<? include("msg.php"); ?>
<? include("$page.php"); ?>
</div>
</div>
</body>
</html>
