<? if(!defined("CONFIG")) exit();
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$exe_rules = mysqli_query($link,"SELECT `rules` FROM rules_table WHERE `id` = 1 LIMIT 1");
list($rules) = mysqli_fetch_array($exe_rules);
mysqli_free_result($exe_rules);
if (!$rules) {
    show_error("There\'s no rules at the moment.");
    return;
}
echo $rules;
?>
