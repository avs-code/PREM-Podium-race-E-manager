<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$newpass = $_POST['passreset'] == "1" ? true : false;
$passgen = $_POST['passreset'] == "2" ? true : false;
if($newpass) {
	$pass1 = addslashes($_POST['pass1']);
	$pass2 = addslashes($_POST['pass2']);
}
$pass1 = addslashes($_POST['pass1']);
$pass2 = addslashes($_POST['pass2']);

$error = "";

if(!$newpass && !$passgen) $error .= "Nothing to be changed\n";
if($newpass) {
	if(empty($pass1)) {
		$error .= "You must fill in a password\n";
	} else {
		if($pass1 !== $pass2) $error .= "Password do not match\n";
		else $passwd = sha1($pass1);
	}
}
if($passgen) {
	$pass1 = generate_password();
	$msg .= "Password generated: $pass1\n";
	$passwd = sha1($pass1);
}

if(!empty($error)) error($error);

mysqlconnect();
$query = "UPDATE user SET ";
if(isset($passwd)) $query .= " passwd='$passwd'";
$query .= "WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=users", "User succesfully modified\n$msg");
?>
