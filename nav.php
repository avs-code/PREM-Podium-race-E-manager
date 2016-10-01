<? if(!defined("CONFIG")) exit() ?>
<? if(defined("USER_MUST_LOGIN") && !isset($login)) return; ?>

<ul>
<li class="head">Results</li>
<li><a href="?page=results">Results</a></li>
<li><a href="?page=sim_results">Sim_Results</a></li>
<li class="head">Show Data</li>
<li><a href="?page=show_circuits">Show_Circuits</a></li>
<li><a href="?page=show_drivers">Show_Drivers</a></li>
<li><a href="?page=show_teams">Show_Teams</a></li>
<li><a href="?page=show_rules">Show_Rules</a></li>
<li><a href="?page=show_videos">Show_Videos</a></li>
<li class="head">Join</li>
<li><a href="?page=driver_add_user">Join as a driver</a></li>
<? if(defined("USE_MYSQL") && defined("USE_LOGIN")) { ?>
<? if(!isset($login)) { ?>
<li class="head">Administration</li>
<li><a href="?page=login">Login</a></li>
<? } else { ?>
<li class="head">Race data</li>
<li><a href="?page=races">Races</a></li>
<li><a href="?page=seasons">Seasons</a></li>
<li><a href="?page=divisions">Divisions</a></li>
<li class="head">Team data</li>
<li><a href="?page=drivers">Drivers</a></li>
<li><a href="?page=teams">Teams</a></li>
<li class="head">Points</li>
<li><a href="?page=points">Rulesets</a></li>
<li class="head">Simresults.net</li>
<li><a href="?page=sim_results_add">Send Simresults url</a></li>
<li class="head">Administration</li>
<li><a href="?page=users">Users</a></li>
<li><a href="?page=logout">Logout</a></li>
<? } ?>
<? } ?>
</ul>