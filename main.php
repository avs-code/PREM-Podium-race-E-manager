<? if (!defined("CONFIG"))
    exit(); ?>
Welcome to the Podium Racing E Manager for <a href="<?= $config['org_link'] ?>"><?= $config['org'] ?></a>.<br>
<div class="small">
Version <?= VERSION ?><br>
</div>
<!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container">
    <img src="images/2011_FIA_GT1_Silverstone_2.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>FIA GT1 at Silverstone in 2011</h3>
      <p><b>By ToNG!? - FIA GT1, CC BY 2.0, https://commons.wikimedia.org/w/index.php?curid=20368769</b></p>   
    </div>
  </div>
  <div class="mySlides w3-display-container">
    <img src="images/Formel3_racing_car_amk.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Formula three racing car at Hockenheimring.</h3>
      <p><b>By user:AngMoKio - selfmade photo at Hockenheim 2008, CC BY-SA 2.5, https://commons.wikimedia.org/w/index.php?curid=3883701</b></p>    
    </div>
  </div>
  <div class="mySlides w3-display-container">
    <img src="images/2012_WTCC_Race_of_Japan_(Race_1)_opening_lap.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>World Touring Car Championship 2012 Race of Japan</h3>
      <p><b>By Morio - Own work, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=22398475</b></p>    
    </div>
  </div>  
   <div class="mySlides w3-display-container">
    <img src="images/In_Car_Micheal_Fitzgerald_Cork_Racing.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>In Car Footage from a Van Diemen RF01 driven by Micheal Fitzgerald Cork Racing</h3>
      <p><b>By Glen Duncombe - http://www.flickr.com/photos/corkracing/5412216243/, CC BY 2.0</b></p>    
    </div>
  </div>  
    <div class="mySlides w3-display-container">
    <img src="images/Audi_R18_e-tron_quattro_at_2013_Le_Mans.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Audi R18 e-tron quattro at 2013 Le Mans</h3>
      <p><b>By kevinmcgill from Den Bosch, Netherlands - KAM_5118, CC BY-SA 2.0, https://commons.wikimedia.org/w/index.php?curid=31689732</b></p>    
    </div>
  </div>  
    <div class="mySlides w3-display-container">
    <img src="images/Green_flag_at_Daytona.JPG" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>The green flag flies on a new season of NASCAR. 2015</h3>
      <p><b>By Nascarking - Own work, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=38582044</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/Andreas_Mikkelsen_-_WRC_Portugal_2013_(8647047945).jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Andreas_Mikkelsen_-_WRC_Portugal_2013</h3>
      <p><b>By Tiago J. G. Fernandes from Portimão, Portugal - Andreas Mikkelsen - WRC Portugal 2013, CC BY 2.0, https://commons.wikimedia.org/w/index.php?curid=26871873</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-60881.jpeg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>.</h3>
      <p><b>.</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-158971.jpeg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>.</h3>
      <p><b>.</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-12789.jpeg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>.</h3>
      <p><b>.</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/pexels-photo-169176.jpeg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>.</h3>
      <p><b>.</b></p>    
    </div>
   </div> 
    <div class="mySlides w3-display-container">
    <img src="images/car-race-ferrari-racing-car-pirelli-50704.jpeg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>.</h3>
      <p><b>.</b></p>    
    </div>
  </div>
<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 8000);    
}

</script>

<!-- Main page content-->

<!--NEWS-->
<div class="w3-row">
<div class="w3-col w3-gray w3-round-xlarge w3-text-shadow" style="width:250px">
<div>
    <h2>Last Race</h2>
    <p><button class="w3-btn w3-green">Show</button>
  <button class="w3-btn w3-red">Hide</button></p>
  php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql
</div>

<div>
    <h2>Last Race</h2>
    <p><button class="w3-btn w3-green">Show</button>
  <button class="w3-btn w3-red">Hide</button></p>
  php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql
</div>

<div>
    <h2>Team standings</h2>
    <p><button class="w3-btn w3-green">Show</button>
  <button class="w3-btn w3-red">Hide</button></p>
  php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql
</div>

<div>
    <h2>Driver standings</h2>
    <p><button class="w3-btn w3-green">Show</button>
  <button class="w3-btn w3-red">Hide</button></p>
    php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql php/sql
</div>

</div>

    <div class="w3-rest w3-dark-gray w3-round-xlarge">

  <h2>NEWS</h2>
<p>
<?php
$exe_news = mysql_query("SELECT `news` FROM main LIMIT 1 ORDER BY id DESC");
list($news) = mysql_fetch_array($exe_news);
mysql_free_result($exe_news);
if (!$news) {
    show_error("There\'s no news at the moment.");
    return;
}
echo $news;
?>
</p>  


</div>
</div>