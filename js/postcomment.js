function post() {
  var name = $('#formname').val();
  var text = $('#formarea').val();

  if (name.length < 1 || text.length < 3) {
    return false;
  }

  var comment =
    (
      '<li>' + name + '<br><p>' + text + '</p><hr><br>'
    );

  $('#comments').append(comment);
  var commentsArray = localStorage.getItem('commentsArray');
  var commentsJson = jQuery.parseJSON(commentsArray);

  for (var k = 0; k < commentsJson.length; k++) {
    if (commentsJson[k].page == $('title').text()) {
      commentsJson[k].comments.push(comment);
      localStorage.setItem('commentsArray', JSON.stringify(commentsJson));
      return;
    }
  }

  var commCell = { 'page' : $('title').text(),
                    'comments' : [comment]
                  };

  commentsJson.push(commCell);
  localStorage.setItem('commentsArray', JSON.stringify(commentsJson));

}

function showcomments() {
  var commentsArray = localStorage.getItem('commentsArray');
  if (!commentsArray) {
    var initJson = "[]";
    localStorage.setItem('commentsArray', initJson);
  } else {
    var commentsJson = jQuery.parseJSON(commentsArray);
    for (var k = 0; k < commentsJson.length; k++) {
      if ( commentsJson[k].page == $('title').text() ) {
        $.each( commentsJson[k].comments, function (i, cell) {
          $('#comments').append(cell);
        });
      }
    }
  }
}

 
 /*function obsolete as of Tugas 2

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
*/