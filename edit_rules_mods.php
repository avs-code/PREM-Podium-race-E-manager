<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$id = intval($_GET['id']);

if (isset($_POST['rules'])) {
    $rules = mysqli_real_escape_string($link,$_POST['rules']);
     $id = addslashes($_POST['id']);
    mysqli_query($link,"UPDATE rules_table SET `rules` = '$rules' WHERE id='$id'");
}
$exe_rules = mysqli_query($link,"SELECT rules FROM rules_table WHERE id='$id' LIMIT 1");
list($rules) = mysqli_fetch_array($exe_rules);
mysqli_free_result($exe_rules);
$rules = htmlspecialchars($rules);
?>
<form method="post" action="index.php?page=edit_rules_mods">
  <textarea id="tinyeditor" name="rules" cols="50" rows="15"><?php echo $rules; ?></textarea>
   <input type="hidden" name="id" value="<?=$id;?>">
   <input type="submit" value="Save" />
</form>
