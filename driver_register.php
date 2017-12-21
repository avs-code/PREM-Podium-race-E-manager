<h1>Register as a driver for the Series xx</h1>

<form action="driver_register_do" method="post">
<table border="0">
<tr>
  <td>Real First + Last Name: <input type="text" name="name" maxlength="30"></td>
</tr>
<tr>
  <td>Country <select name="country">
    	<option value="AL">Albania</option>
    	<option value="AD">Andorra</option>
    	<option value="AT">Austria</option>
    	<option value="BE">Belgium</option>
    	<option value="BA">Bosnia and Herzegovina</option>
    	<option value="BG">Bulgaria</option>
    	<option value="HR">Croatia</option>
    	<option value="CY">Cyprus</option>
    	<option value="CZ">Czech Republic</option>
    	<option value="DK">Denmark</option>
    	<option value="EE">Estonia</option>
    	<option value="FO">Faroe Islands</option>
    	<option value="FI">Finland</option>
    	<option value="FR">France</option>
    	<option value="GE">Georgia</option>
    	<option value="DE">Germany</option>
    	<option value="GI">Gibraltar</option>
    	<option value="GR">Greece</option>
    	<option value="VA">Holy See (Vatican City State)</option>
    	<option value="HU">Hungary</option>
    	<option value="IS">Iceland</option>
    	<option value="IE">Ireland</option>
    	<option value="IM">Isle of Man</option>
    	<option value="IT">Italy</option>
    	<option value="LV">Latvia</option>
    	<option value="LI">Liechtenstein</option>
    	<option value="LT">Lithuania</option>
    	<option value="LU">Luxembourg</option>
    	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
    	<option value="MT">Malta</option>
    	<option value="MC">Monaco</option>
    	<option value="ME">Montenegro</option>
    	<option value="NL">Netherlands</option>
    	<option value="NO">Norway</option>
    	<option value="PL">Poland</option>
    	<option value="PT">Portugal</option>
    	<option value="RU">Russian Federation</option>
    	<option value="SM">San Marino</option>
    	<option value="RS">Serbia</option>
    	<option value="SK">Slovakia</option>
    	<option value="SI">Slovenia</option>
    	<option value="ES">Spain</option>
    	<option value="SE">Sweden</option>
    	<option value="CH">Switzerland</option>
    	<option value="UA">Ukraine</option>
    	<option value="GB">United Kingdom</option>
    </select>
  </td>
</tr>
  <td>Desired car#:<br><input type="number" name="car_nr" min="1" max="999"></td>
</tr>
<tr>
  <td>Desired team: (max. 2 Drivers/team)<input type="text" name="wanted_team" maxlength="30"></td>
</tr>
<tr>
    <td width="120">Photo:<br><input type="url" name="driver_photo" value="<?=$item['driver_photo']?>" maxlength="200"></td>
</tr>
<tr>
	<td>
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
