<?
/**
 * functions.php - Default functions for the skeleton
 *
 * @author Bert Hekman <bert@condor.tv>
 * @copyright Copyright &copy; 2007, Condor Digital
 */

/**
 * error function shows an error
 * must be called from scripts that did not output anything
 * (e.g. backend scripts) is opposite to the show_error function.
 *
 * @param string $error The error message to be displayed
 * @param string $refer The page where the "Try again" should be linked to (If empty, it shows: "Click here to go back")
 */
function error($error, $refer = "") {
	$error = urlencode($error);
	if(!empty($refer))
		$error .= urlencode("<a href=\"$refer\">Try again</a>\n");
	else
		$error .= urlencode("<a href=\"javascript:history.go(-1);\">Go back</a>\n");
	header("Location: .?page=error&error=$error");
	exit();
}

/**
 * show_error function shows an error
 * recommended to be called from scripts that did output
 * something in opposite to the error function
 *
 * @param string $error The error message to be displayed
 */
function show_error($error) {
	$error = urlencode($error);
	include("error.php");
}

/**
 * show_msg function shows a message
 *
 * @param string $msg Message to be shown
 */
function show_msg($msg) {
	include("msg.php");
}

/**
 * return_do function redirects the browser to another page.
 * An added message is optional
 *
 * @param string $dest Page to redirect to
 * @param string $msg Message to be shown in page
 */
function return_do($dest, $msg = "") {
	if(!empty($msg))
		$msg = "&msg=" . urlencode($msg);

	header("Location: $dest$msg");
	exit();
}

if(defined("USE_MYSQL")) {
	/**
	 * mysqlconnect function connects to mysql server and quits
	 * with an error if unsuccesfull
	 *
	 * @global string $config The configuration from config.php is needed
	 * @return resource MySQLi connection link resource
	 */
	function mysqlconnect() {
		global $config;

		$mysqli = mysqli_connect(
				$config['mysql']['host'],
				$config['mysql']['user'],
				$config['mysql']['pass'],
				$config['mysql']['db'],
				$config['mysql']['port']
		);
		if (mysqli_connect_errno($mysqli)) {
    	echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
		}
		return $mysqli;
	}
}

/**
 * filesize_hr function calculates the filesize and returns
 * the human readable form
 *
 * @param string $file Filename of the file to get the size from
 * @return string Calculated filesize
 */
function filesize_hr($file) {
	if(!is_readable($file))
		return "?B";

	$units = array("B", "KB", "MB", "GB", "TB");
	$s = filesize($file);
	$u = 0;
	while($s > 1024) {
		$u++;
		$s = $s / 1024;
	}
	if($u > 0)
		return sprintf("%01.2f ", $s) . $units[$u];
	else
		return $s . $units[$u];
}

/**
 * generate_password function generates a password for use with an user
 * administration system
 *
 * @return string Generated password
 */
function generate_password() {
	$totalChar = 8;
	$salt = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	srand((double)microtime() * 1000000);
	for($i = 0; $i < $totalChar; $i++)
		$password .= substr($salt, rand() % strlen($salt), 1);
	return $password;
}
?>
