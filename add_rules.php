<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
if (isset($_POST['rules'])) {
    $name = mysqli_real_escape_string($link,$_POST['name']);
    $rules = mysqli_real_escape_string($link,$_POST['rules']);
    mysql_query($link,"INSERT INTO rules_table (name, rules) VALUES ('$name', '$rules')");
}
$exe_rules = mysqli_query($link,"SELECT rules FROM rules_table ORDER BY id ASC");
list($rules) = mysqli_fetch_array($link,$exe_rules);
mysqli_free_result($exe_rules);
$news = htmlspecialchars($rules);
?>

<form method="post" action="index.php?page=add_rules">
<table cellpadding="8" border="0">
<tr>
	<td width="100">rules name:</td>
	<td><input type="text" name="name" maxlength="20"></td>
  <td width="300">rules dummytext (You can edit this later):</td>
  <td><input type="text" name="rules" maxlength="50"></td>
  <td><input type="submit" value="Save"</td>
</tr>
</table>
</form>
