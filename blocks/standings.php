<!--Standing block-->



<div>
	

	<ul class="w3-pagination">
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '1');"><i class="w3-margin-center"></i>1</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '2');"><i class="w3-margin-center"></i>2</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '3');"><i class="w3-margin-center"></i>3</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '4');"><i class="w3-margin-center"></i>4</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '5');"><i class="w3-margin-center"></i>5</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '6');"><i class="w3-margin-center"></i>6</a></li>
      <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '7');"><i class="w3-margin-center"></i>7</a></li>
	</ul>


<!--
Numbers of page (1,2,3,4,5) indicate season number in database ( for example: 1 Formula1, 2 blancpain, 3 WTCC)
-->


<!--Page 1-->
<!--Team standing-->
<div id="1" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>

<h3>Formula1</h3><br />
Mercedes 	765<br />
Red Bull Racing TAG Heuer 	468<br />
Ferrari 	398<br />
Force India Mercedes 	173<br />
Williams Mercedes 	138<br />
McLaren Honda 	76<br />
   
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

Nico Rosberg Mercedes 385<br />
Lewis Hamilton Mercedes 380<br />
Daniel Ricciardo Red Bull Racing TAG Heuer 256<br />
Sebastian Vettel Ferrari 	212<br />
Max Verstappen Red Bull Racing TAG Heuer 204<br />
Kimi Räikkönen Ferrari 186<br />


<p></p>

</div>

<!--Page 2-->
<!--Team standing-->

<div id="2" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>

<h3>Blancpain GT Series</h3><br />

HTP Motorsport 167<br />
Belgian Audi Club Team WRT 160<br />
Belgian Audi Club Team WRT 133<br />
Garage 59 130<br />
Bentley Team M-Sport 126<br />
ROWE Racing 96<br />
GRT Grasser Racing Team 86<br />
Akka ASP 80<br />
Sainteloc Racing 56<br />
ISR 45<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

Maximilian Buhk 134<br />
Dominik Baumann 134<br />
Rob Bell 124<br />
Laurens Vanthoor 112<br />
Maxime Soulet 106<br />
Andy Soucek 106<br />
Frederic Vervisch 103<br />
Enzo Ide 102<br />
Christopher Mies 97<br />
Philipp Eng 79<br />



<p></p>
</div>

<!--Page 3-->
<!--Team standing-->

<div id="3" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>
	  Show season.name nº3<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<!--Page 4-->
<!--Team standing-->


<div id="4" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>
	  Show season.name nº4<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<!--Page 5-->
<!--Team standing-->


<div id="5" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>
	  Show season.name nº5<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<!--Page 6-->
<!--Team standing-->


<div id="6" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>
	  Show season.name nº6<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<!--Page 7-->
<!--Team standing-->


<div id="7" class="myLink">
<div class="w3-center w3-black w3-text-white"><h2>Team Standings</h2></div>
	  Show season.name nº7<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>



<script>
// Team and driver Standings
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
	  x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>


</div>