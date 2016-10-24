<!--Team standing block-->
<div>
	<p><button class="w3-btn w3-green">Show</button>
  <button class="w3-btn w3-red">Hide</button></p>

	<ul class="w3-pagination">
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '1');"><i class="w3-margin-center"></i>1</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '2');"><i class="w3-margin-center"></i>2</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '3');"><i class="w3-margin-center"></i>3</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '4');"><i class="w3-margin-center"></i>4</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '5');"><i class="w3-margin-center"></i>5</a></li>
	  <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, '6');"><i class="w3-margin-center"></i>6</a></li>
	</ul>


Numbers of page (1,2,3,4,5) indicate season number in database ( for example: 1 blancpain, 2 WTCC, 3 F3)


<div id="1" class="myLink">
	  Show season.name nº1<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>
</div>


<div id="2" class="myLink">
	  Show season.name nº2<br />
	  Show Team - Points<br />
   
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<div id="3" class="myLink">
	  Show season.name nº3<br />
	  Show Team - Points<br />
	
<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<div id="4" class="myLink">
	  Show season.name nº4<br />
	  Show Team - Points<br />
	

<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<div id="5" class="myLink">
	  Show season.name nº5<br />
	  Show Team - Points<br />
	

<!--Driver standing-->

	<div class="w3-center w3-black w3-text-white"><h2>Driver Standings</h2></div>

show driver name - points


<p></p>

</div>

<div id="6" class="myLink">
	  Show season.name nº6<br />
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