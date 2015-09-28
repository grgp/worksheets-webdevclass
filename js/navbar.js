var visi = false;

function dropdown() {
	var list = document.getElementById("navheadinside");
	if (visi == true) {
		list.style.display = "none";
		visi = false;
	}
	else {
		list.style.display = "block";
		visi = true;
	}
}

function init() {
	var list = document.getElementById("navheadinside");
	list.style.display = "block";
}