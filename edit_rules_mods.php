<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<form method="post">
<textarea id='tinyeditor' cols="50" rows="15"></textarea>
<input type="submit" value="Save" />
</form>

<form method="post" action="show_rules.php">
        
</form>

