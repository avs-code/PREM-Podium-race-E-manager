<? if(!defined("CONFIG")) exit();
$exe_rules = mysql_query("SELECT `rules` FROM rules_table WHERE `id` = 1 LIMIT 1");
list($rules) = mysql_fetch_array($exe_rules);
mysql_free_result($exe_rules);
if (!$rules) {
    show_error("There\'s no rules at the moment.");
    return;
}
echo $rules;
?>