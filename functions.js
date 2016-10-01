function ele(eleName) {
	if(document.getElementById && document.getElementById(eleName)) {
		return document.getElementById(eleName);
	}
	else if (document.all && document.all(eleName)) {
		return document.all(eleName);
	}
	else if (document.layers && document.layers[eleName]) {
		return document.layers[eleName];
	} else {
		return false;
	}
}
