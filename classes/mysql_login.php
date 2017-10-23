<?php
class mysql_login {
	private $mysql_link;
	private $mysql_table;
	private $userfield = "name";
	private $passfield = "passwd";
	private $loggedin;
	private $username;
	private $userdata;

	const ERR_OK = 0x0;
	const ERR_GENERIC = 0x1;
	const ERR_SQL_CONNECTION = 0x10;
	const ERR_SQL_QUERY = 0x11;
	const ERR_USER_LOGIN_INCORRECT = 0x20;
	const ERR_USER_INACTIVE = 0x21;

	private $lasterror;

	function __construct($mysql_link, $mysql_table) {
		$this->mysql_link = $mysql_link;
		$this->mysql_table = $mysql_table;
		$this->loggedin = false;
	}

	function login($username, $password) {
		// Kijken of er link is met de sql database
		if(!mysqli_ping($this->mysql_link)) {
			$this->lasterror = "There was no link with the SQL server<br>\n";
			return self::ERR_SQL_CONNECTION; // Geen link
		}

		$query = "SELECT * FROM " . addslashes($this->mysql_table) . " WHERE " . $this->userfield . "='" . addslashes($username) . "' LIMIT 1";
		$result = mysqli_query($this->mysql_link,$query);

		if(!$result) {
			$this->lasterror = mysqli_error($link) . "<br>Query: " . $query;
			return self::ERR_SQL_QUERY; // MySQL error
		}

		if(mysqli_num_rows($result)==0) {
			$this->lasterror = "User does not exist";
			return self::ERR_USER_LOGIN_INCORRECT;
		}

		$user = mysqli_fetch_array($result);

		$enc_password = sha1($password);

		if($user['active'] != "1") {
			$this->lasterror = "User is not activated";
			return self::ERR_USER_INACTIVE; // Gebruiker is niet actief
		}

		if($user[$this->passfield] !== $enc_password) {
			$this->lasterror = "Password was incorrect";
			return self::ERR_USER_LOGIN_INCORRECT;
		}

		// de gebruiker is succesvol ingelogd. Nu gaan we de gegevens in de classvariablen opslaan.

		$this->loggedin = true;
		$this->username = $user[$this->userfield];

		$this->userdata = $user;

		// en klaar is kees.

		return 0;
	}

	function refresh() {
		if(!$this->loggedin || $this->username == "")
			return false;

		// Kijken of er link is met de sql database
		if(!mysqli_ping($this->mysql_link)) {
			$this->lasterror = "There was no link with the SQL server<br>\n";
			$this->flush(); // Gebruikersdata wissen
			return self::ERR_SQL_CONNECTION; // Geen link
		}

		$query = "SELECT * FROM " . addslashes($this->mysql_table) . " WHERE " . $this->userfield . "='" . $this->username . "' LIMIT 1";
		$result = mysqli_query($this->mysql_link,$query);

		if(!$result) {
			$this->lasterror = mysqli_error($link) . "<br>Query: " . $query;
			$this->flush(); // Gebruikersdata wissen
			return self::ERR_SQL_QUERY; // MySQL error
		}

		if(mysqli_num_rows($result)==0) {
			$this->lasterror = "User does not exist";
			$this->flush(); // Gebruikersdata wissen
			return self::ERR_USER_LOGIN_INCORRECT;
		}

		$user = mysqli_fetch_array($result);

		if($user['active'] != "1") {
			$this->lasterror = "User is not activated";
			$this->flush(); // Gebruikersdata wissen
			return self::ERR_USER_INACTIVE; // Gebruiker is niet actief
		}

		// Gebruikersdata verversen
		$this->userdata = $user;

		return 0;
	}

	function flush() {
		$this->loggedin = false;
		$this->username = "";
		$this->userdata = null;
		return true;
	}

	static function print_login_form($action = "login_do.php", $str_user = "Username", $str_pass = "Password", $str_login="Login", $str_reset="Reset") {
		echo "<form class=\"login\" action=\"$action\" method=\"post\"><table border=\"0\" class=\"login\">\n";
		echo "<tr><td>$str_user:</td><td><input class=\"user\" type=\"text\" name=\"user\"></td></tr>\n";
		echo "<tr><td>$str_pass:</td><td><input class=\"password\" type=\"password\" name=\"pass\"></td></tr>\n";
		echo "<tr><td>&nbsp;</td><td><input type=\"submit\" value=\"$str_login\" class=\"button login\">\n";
		echo "<input type=\"reset\" value=\"$str_reset\" class=\"button reset\"></td></tr>\n";
		echo "</table></form>\n";
	}

	function get_data($key) {
		if (array_key_exists($key, $this->userdata))
			return $this->userdata[$key];
	}

	function is_loggedin() {
		return($this->loggedin);
	}

	function set_mysql_link($mysql_link) {
		$this->mysql_link = $mysql_link;
	}

	function username() {
		return $this->username;
	}

	function last_error() {
		#return "mysql_login.php: " . $this->lasterror;
		return $this->lasterror;
	}
}
?>
