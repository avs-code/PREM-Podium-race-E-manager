<? if(!defined("CONFIG")) exit() ?>
<br /><br /><h3><a href="<?=$config['org_link']?>"><?=$config['org']?></a></h3><?=TITLE?>&nbsp;<?=VERSION?><? if(isset($login)) { ?>&nbsp;
Logged in as <?=$username?><br>
<? } ?>