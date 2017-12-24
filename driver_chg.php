<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
$id = addslashes($_GET['id']);
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM driver WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($result) == 0){
	show_error("Driver does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$tquery = "SELECT td.*, t.name teamname FROM team_driver td JOIN team t ON (t.id = td.team) WHERE td.driver = '$id'";
$tresult = mysqli_query($link,$tquery);
if(!$tresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

$teamcount = mysqli_num_rows($tresult);
?>
<h1>Modify driver</h1>

<form action="driver_chg_do.php" method="post">
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
	<td width="120">Name:</td>
	<td><input type="text" name="name" value="<?=$item['name']?>" maxlength="30"></td>
	<td width="40">Car Number:</td>
	<td><input type="number" name="plate" value="<?=$item['plate']?>" min="1" max="999"></td>
	<td width="100">Country:</td>
	<td>
		<select name="country">
			<option value="<?=$item['country']?>">Old Entry</option>
			<optgroup label="European Countries">
				<option disabled>────────────────</option>
				<option value="ax">Åland Islands</option>
				<option value="al">Albania</option>
				<option value="ad">Andorra</option>
				<option value="at">Austria</option>
				<option value="by">Belarus</option>
				<option value="be">Belgium</option>
				<option value="ba">Bosnia and Herzegovina</option>
				<option value="bg">Bulgaria</option>
				<option value="hr">Croatia</option>
				<option value="cy">Cyprus</option>
				<option value="cz">Czechia</option>
				<option value="dk">Denmark</option>
				<option value="ee">Estonia</option>
				<option value="fo">Faroe Islands</option>
				<option value="fi">Finland</option>
				<option value="fr">France</option>
				<option value="de">Germany</option>
				<option value="gi">Gibraltar</option>
				<option value="gr">Greece</option>
				<option value="gg">Guernsey</option>
				<option value="va">Holy See (Vatican City State)</option>
				<option value="hu">Hungary</option>
				<option value="is">Iceland</option>
				<option value="ie">Ireland</option>
				<option value="im">Isle of Man</option>
				<option value="it">Italy</option>
				<option value="je">Jersey</option>
				<option value="lv">Latvia</option>
				<option value="li">Liechtenstein</option>
				<option value="lt">Lithuania</option>
				<option value="lu">Luxembourg</option>
				<option value="mk">Macedonia, The Former Yugoslav Republic of</option>
				<option value="mt">Malta</option>
				<option value="md">Moldova, Republic of</option>
				<option value="mc">Monaco</option>
				<option value="me">Montenegro</option>
				<option value="nl">Netherlands</option>
				<option value="no">Norway</option>
				<option value="pl">Poland</option>
				<option value="pt">Portugal</option>
				<option value="ro">Romania</option>
				<option value="sm">San Marino</option>
				<option value="rs">Serbia</option>
				<option value="sk">Slovakia</option>
				<option value="si">Slovenia</option>
				<option value="es">Spain</option>
				<option value="sj">Svalbard and Jan Mayen</option>
				<option value="se">Sweden</option>
				<option value="ch">Switzerland</option>
				<option value="ua">Ukraine</option>
				<option value="gb">United Kingdom</option>
			</optgroup>
			<optgroup label="African Countries">
				<option disabled>────────────────</option>
				<option value="dz">Algeria</option>
				<option value="ao">Angola</option>
				<option value="bj">Benin</option>
				<option value="bw">Botswana</option>
				<option value="bf">Burkina Faso</option>
				<option value="bi">Burundi</option>
				<option value="cm">Cameroon</option>
				<option value="cv">Cape Verde</option>
				<option value="cf">Central African Republic</option>
				<option value="td">Chad</option>
				<option value="km">Comoros</option>
				<option value="cg">Congo</option>
				<option value="cd">Congo, The Democratic Republic of The</option>
				<option value="ci">Cote D'ivoire</option>
				<option value="dj">Djibouti</option>
				<option value="eg">Egypt</option>
				<option value="gq">Equatorial Guinea</option>
				<option value="er">Eritrea</option>
				<option value="et">Ethiopia</option>
				<option value="ga">Gabon</option>
				<option value="gm">Gambia</option>
				<option value="gh">Ghana</option>
				<option value="gn">Guinea</option>
				<option value="gw">Guinea-bissau</option>
				<option value="ke">Kenya</option>
				<option value="ls">Lesotho</option>
				<option value="lr">Liberia</option>
				<option value="ly">Libyan Arab Jamahiriya</option>
				<option value="mg">Madagascar</option>
				<option value="mw">Malawi</option>
				<option value="ml">Mali</option>
				<option value="mr">Mauritania</option>
				<option value="mu">Mauritius</option>
				<option value="yt">Mayotte</option>
				<option value="ma">Morocco</option>
				<option value="mz">Mozambique</option>
				<option value="na">Namibia</option>
				<option value="ne">Niger</option>
				<option value="ng">Nigeria</option>
				<option value="re">Reunion</option>
				<option value="rw">Rwanda</option>
				<option value="st">Sao Tome and Principe</option>
				<option value="sn">Senegal</option>
				<option value="sc">Seychelles</option>
				<option value="sl">Sierra Leone</option>
				<option value="so">Somalia</option>
				<option value="za">South Africa</option>
				<option value="lk">Sri Lanka</option>
				<option value="sd">Sudan</option>
				<option value="sz">Swaziland</option>
				<option value="tz">Tanzania, United Republic of</option>
				<option value="tg">Togo</option>
				<option value="tn">Tunisia</option>
				<option value="ug">Uganda</option>
				<option value="eh">Western Sahara</option>
				<option value="zm">Zambia</option>
				<option value="zw">Zimbabwe</option>
			</optgroup>
			<optgroup label="American Countries">
					<option disabled>────────────────</option>
					<option value="ai">Anguilla</option>
					<option value="ag">Antigua and Barbuda</option>
					<option value="ar">Argentina</option>
					<option value="aw">Aruba</option>
					<option value="bs">Bahamas</option>
					<option value="bb">Barbados</option>
					<option value="bz">Belize</option>
					<option value="bm">Bermuda</option>
					<option value="bo">Bolivia</option>
					<option value="br">Brazil</option>
					<option value="ca">Canada</option>
					<option value="ky">Cayman Islands</option>
					<option value="cl">Chile</option>
					<option value="co">Colombia</option>
					<option value="cr">Costa Rica</option>
					<option value="cu">Cuba</option>
					<option value="dm">Dominica</option>
					<option value="do">Dominican Republic</option>
					<option value="ec">Ecuador</option>
					<option value="sv">El Salvador</option>
					<option value="fk">Falkland Islands (Malvinas)</option>
					<option value="gf">French Guiana</option>
					<option value="gl">Greenland</option>
					<option value="gd">Grenada</option>
					<option value="gp">Guadeloupe</option>
					<option value="gt">Guatemala</option>
					<option value="gy">Guyana</option>
					<option value="ht">Haiti</option>
					<option value="hn">Honduras</option>
					<option value="jm">Jamaica</option>
					<option value="mq">Martinique</option>
					<option value="mx">Mexico</option>
					<option value="ms">Montserrat</option>
					<option value="an">Netherlands Antilles</option>
					<option value="ni">Nicaragua</option>
					<option value="pa">Panama</option>
					<option value="py">Paraguay</option>
					<option value="pe">Peru</option>
					<option value="pr">Puerto Rico</option>
					<option value="kn">Saint Kitts and Nevis</option>
					<option value="lc">Saint Lucia</option>
					<option value="pm">Saint Pierre and Miquelon</option>
					<option value="vc">Saint Vincent and The Grenadines</option>
					<option value="sr">Suriname</option>
					<option value="tt">Trinidad and Tobago</option>
					<option value="tc">Turks and Caicos Islands</option>
					<option value="us">United States</option>
					<option value="uy">Uruguay</option>
					<option value="ve">Venezuela</option>
					<option value="vg">Virgin Islands, British</option>
					<option value="vi">Virgin Islands, U.S.</option>
				</optgroup>
				<optgroup label="Asian Countries">
					<option disabled>────────────────</option>
					<option value="af">Afghanistan</option>
					<option value="am">Armenia</option>
					<option value="az">Azerbaijan</option>
					<option value="az">Azerbaijan</option>
					<option value="bh">Bahrain</option>
					<option value="bd">Bangladesh</option>
					<option value="bt">Bhutan</option>
					<option value="io">British Indian Ocean Territory</option>
					<option value="bn">Brunei Darussalam</option>
					<option value="kh">Cambodia</option>
					<option value="cn">China</option>
					<option value="ge">Georgia</option>
					<option value="gu">Guam</option>
					<option value="hk">Hong Kong</option>
					<option value="in">India</option>
					<option value="ir">Iran, Islamic Republic of</option>
					<option value="iq">Iraq</option>
					<option value="il">Israel</option>
					<option value="jp">Japan</option>
					<option value="jo">Jordan</option>
					<option value="kz">Kazakhstan</option>
					<option value="kp">Korea, Democratic People's Republic of</option>
					<option value="kr">Korea, Republic of</option>
					<option value="kw">Kuwait</option>
					<option value="kg">Kyrgyzstan</option>
					<option value="la">Lao People's Democratic Republic</option>
					<option value="lb">Lebanon</option>
					<option value="mo">Macao</option>
					<option value="my">Malaysia</option>
					<option value="mv">Maldives</option>
					<option value="mn">Mongolia</option>
					<option value="mm">Myanmar</option>
					<option value="np">Nepal</option>
					<option value="om">Oman</option>
					<option value="pk">Pakistan</option>
					<option value="ps">Palestinian Territory, Occupied</option>
					<option value="qa">Qatar</option>
					<option value="ru">Russian Federation</option>
					<option value="sa">Saudi Arabia</option>
					<option value="sg">Singapore</option>
					<option value="sy">Syrian Arab Republic</option>
					<option value="tw">Taiwan</option>
					<option value="tj">Tajikistan</option>
					<option value="th">Thailand</option>
					<option value="tr">Turkey</option>
					<option value="tm">Turkmenistan</option>
					<option value="ae">United Arab Emirates</option>
					<option value="uz">Uzbekistan</option>
					<option value="vn">Viet Nam</option>
					<option value="ye">Yemen</option>
				</optgroup>
				<optgroup label="Oceanic Countries">
					<option disabled>────────────────</option>
					<option value="as">American Samoa</option>
					<option value="aq">Antarctica</option>
					<option value="au">Australia</option>
					<option value="bv">Bouvet Island</option>
					<option value="cx">Christmas Island</option>
					<option value="cc">Cocos (Keeling) Islands</option>
					<option value="ck">Cook Islands</option>
					<option value="fj">Fiji</option>
					<option value="pf">French Polynesia</option>
					<option value="tf">French Southern Territories</option>
					<option value="hm">Heard Island and Mcdonald Islands</option>
					<option value="id">Indonesia</option>
					<option value="ki">Kiribati</option>
					<option value="mh">Marshall Islands</option>
					<option value="fm">Micronesia, Federated States of</option>
					<option value="nr">Nauru</option>
					<option value="nc">New Caledonia</option>
					<option value="nz">New Zealand</option>
					<option value="nu">Niue</option>
					<option value="nf">Norfolk Island</option>
					<option value="mp">Northern Mariana Islands</option>
					<option value="pw">Palau</option>
					<option value="pg">Papua New Guinea</option>
					<option value="ph">Philippines</option>
					<option value="pn">Pitcairn</option>
					<option value="ws">Samoa</option>
					<option value="sb">Solomon Islands</option>
					<option value="tl">Timor-leste</option>
					<option value="tk">Tokelau</option>
					<option value="to">Tonga</option>
					<option value="tv">Tuvalu</option>
					<option value="um">United States Minor Outlying Islands</option>
					<option value="vu">Vanuatu</option>
					<option value="wf">Wallis and Futuna</option>
				</optgroup>
				<optgroup label="Other Countries">
					<option disabled>────────────────</option>
					<option value="sh">Saint Helena</option>
					<option value="gs">South Georgia and The South Sandwich Islands</option>
				</optgroup>
</select>
    </select>
  </td>
    <td width="120">Photo:</td>
	<td><input type="url" name="driver_photo" value="<?=$item['driver_photo']?>" maxlength="200"></td>
</tr>
<tr class="w3-hover-green">
	<td>Teams (<?=$teamcount?>):</td>
	<td>
	<? while($titem = mysqli_fetch_array($tresult)) { ?>
		<a href="?page=team_driver_rem&amp;id=<?=$titem['id']?>"><img src="images/delete16.png" alt="delete"></a> <?=$titem['teamname']?><br>
	<? } ?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Modify">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
