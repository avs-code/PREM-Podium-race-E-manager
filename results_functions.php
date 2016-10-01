<?
$race_status = array("OK", "Did not finish", "Disqualified", "Did not start");
$race_status_s = array("OK", "DNF", "DQ", "DNS");

define("RACE_NEW", 0x0);
define("RACE_QUALIFYING", 0x1);
define("RACE_RACE", 0x2);

function time_hr($time) {
	$hour = floor($time / 3600000);
	$time = $time % 3600000;
	$min = floor($time / 60000);
	$time = $time % 60000;
	$sec = floor($time / 1000);
	$ms = $time % 1000;
	
	if($hour > 0)
		return sprintf("%d:%02d:%02d.%03d", $hour, $min, $sec, $ms);
	else
		return sprintf("%02d:%02d.%03d", $min, $sec, $ms);
}

function points_race($position, $ruleset) {
	if($position < 1 || $position > 15) return 0;

	$race = array();
	for($x = 1; $x <= 15; $x++) {
		eval('$race[' . $x . '] = $ruleset[\'rp' . $x . '\'];');
	}
	
	return $race[$position];
}

function points_qualifying($position, $ruleset) {
	if($position < 1 || $position > 5) return 0;

	$qual = array();
	for($x = 1; $x <= 5; $x++) {
		eval('$qual[' . $x . '] = $ruleset[\'qp' . $x . '\'];');
	}
	
	return $qual[$position];
}

function points_fl($fl, $ruleset) {
	if($fl == 1 || $fl == true)
		return $ruleset['fl'];
	else
		return 0;
}

function points_total($race, $grid, $fl, $ruleset_race) {
	$total = 0;
	$total += points_race($race, $ruleset_race);
	$total += points_qualifying($grid, $ruleset_race);
	$total += points_fl($fl, $ruleset_race);
	return $total;
}

function point_sort($a, $b) {
	if($a['points'] == $b['points']) {
		if($a['name'] == $b['name'])
			return 0;
		return $a['name'] > $b['name'] ? 1 : -1;
	}
	return $a['points'] < $b['points'] ? 1 : -1;
}

function point_sort_qual($a, $b) {
	if($a['pointsqualifying'] == $b['pointsqualifying']) {
		if($a['name'] == $b['name'])
			return 0;
		return $a['name'] > $b['name'] ? 1 : -1;
	}
	return $a['pointsqualifying'] < $b['pointsqualifying'] ? 1 : -1;
}
?>
