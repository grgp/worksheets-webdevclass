function post() {
	var commLi = document.createElement("LI");
	
	var formUser = document.getElementById("formname");
	var formEmail = document.getElementById("formarea");
	var formText = document.getElementById("formarea");
  var commUser = document.createTextNode(formUser.value);
  var commEmail = document.createTextNode(formEmail.value);
  var commText = document.createTextNode(formText.value);

  if (commUser.length < 1 || commText.length < 3) {
  	return false;
  }

  var br = document.createElement("BR");
  var p = document.createElement("P");
  var hr = document.createElement("HR");
  p.appendChild(commText);
  commLi.appendChild(commUser);
  commLi.appendChild(br);
  commLi.appendChild(p);
  commLi.appendChild(hr);
  commLi.appendChild(br);

  document.getElementById("comments").appendChild(commLi);
}