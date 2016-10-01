<?php
define('USE_MYSQL', 1);
include 'functions.php';
include 'config.php';

$conn = mysql_connect($config['mysql']['host'], $config['mysql']['user'], $config['mysql']['pass'], $config['mysql']['db'])
or die('issues with the server connection');?>

<?
$name = htmlspecialchars($_POST['name']);

$error = "";

if(empty($name)) $error .= "You must fill in a name\n";

if(!empty($error)) error($error);

$msg = "";

$photo = htmlspecialchars($_POST['driver_photo']);

mysqlconnect();
$query = "SELECT * FROM driver WHERE name = '$name'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");
if(mysql_num_rows($result) > 0) error("Driver name is already in use\n");

$query = "INSERT INTO driver (name, driver_photo) VALUES ('$name','$photo')";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=drivers", "Driver succesfully added\n$msg");
?>
