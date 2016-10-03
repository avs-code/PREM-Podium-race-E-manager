<? if(!defined("CONFIG")) exit() ?>
<? if(defined("USER_MUST_LOGIN") && !isset($login)) return; ?>

<!-- Navbar -->
<nav>
<div class="w3-top w3-opacity w3-hover-opacity-off">
<ul class="w3-navbar w3-black w3-card-2 w3-left-align w3-topnav">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
  </li>
  <li class="w3-hide-small w3-right"><a href="javascript:void(0)" class="w3-padding-large w3-hover-red"><i class="fa fa-search"></i></a></li>  
  <li><a href="?page=main" class="w3-hover-none w3-hover-red w3-padding-large">HOME</a></li>
  
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="javascript:void(0)" class="w3-hover-red w3-padding-large" title="Results">Results <i class="fa fa-caret-down"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
    <a href="?page=results" class="w3-hover-red">Results</a>
    <a href="?page=sim_results" class="w3-hover-red">Sim_Results</a>
    </div>
  </li>
  
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="javascript:void(0)" class="w3-hover-red w3-padding-large" title="Show Data">Show Data <i class="fa fa-caret-down"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
    <a href="?page=show_circuits" class="w3-hover-red">Show_Circuits</a>
    <a href="?page=show_drivers" class="w3-hover-red">Show_Drivers</a>
    <a href="?page=show_teams" class="w3-hover-red">Show_Teams</a>
    <a href="?page=show_rules" class="w3-hover-red">Show_Rules</a>
    <a href="?page=show_videos" class="w3-hover-red">Show_Videos</a>
    </div>
  </li>
  
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="javascript:void(0)" class="w3-hover-red w3-padding-large" title="Join">Join <i class="fa fa-caret-down"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
    <a href="?page=driver_add_user" class="w3-hover-red">New Driver</a></li>
<? if(defined("USE_MYSQL") && defined("USE_LOGIN")) { ?>
<? if(!isset($login)) { ?>
    <li class="w3-hide-small"><a href="?page=login" class="w3-padding-large">Login Admin</a></li>
<? } else { ?> 
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="javascript:void(0)" class="w3-hover-red w3-padding-large" title="Login Admin">Login Admin <i class="fa fa-caret-down"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4">
    <a href="?page=races" class="w3-hover-red">Races</a>
    <a href="?page=seasons" class="w3-hover-red">Seasons</a>
    <a href="?page=divisions" class="w3-hover-red">Divisions</a>
    <a href="?page=drivers" class="w3-hover-red">Drivers</a>
    <a href="?page=teams" class="w3-hover-red">Teams</a>
    <a href="?page=points" class="w3-hover-red">Rulesets</a>
    <a href="?page=sim_results_add" class="w3-hover-red">Send Simresults url</a>
    <a href="?page=users" class="w3-hover-red">Users</a>
    <a href="?page=logout" class="w3-hover-red">Logout</a></li>
    </div>
  </li>
</ul>
</div>
<? } ?>
<? } ?>
</nav>

