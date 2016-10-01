<? if(!defined("CONFIG")) exit() ?>
<h3><a href="<?=$config['org_link']?>"><?=$config['org']?></a></h3>
<?=TITLE?> <?=VERSION?><br>
<? if(isset($login)) { ?>
Logged in as <?=$username?><br>
<? } ?>
