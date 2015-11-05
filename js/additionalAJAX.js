function displaytable(n) {
	var path = '../../misc/xml/table' + n + '.xml';
	var xml;
  $.get(path, null, function (data, entry) {
    xml=data;
    	var table = (	'<table><tr>' +
    								'<th>Name</th>' +
    								'<th>Type</th>' +
    								'<th>Tail</th>' +
    								'<th>Likes</th>' +
    								'</tr>'
    							);
      $(xml).find('animal').each( function(){
      		var item = $(this);
          var row = (
          						'<tr>' +
          						'<td>' + item.find('name').text() + '</td>' +
          						'<td>' + item.find('type').text() + '</td>' +
          						'<td>' + item.find('tails').text() + '</td>' +
          						'<td>' + item.find('likes').text() + '</td>' +
          						'</tr>'
          					);
          table += row;
     });
      table += '</table>';
      $('#xml1').append(table);
	});
}

function post() {
  var name = $('#formname').val();
  var text = $('#formarea').val();
  var loca = $('#formloca').val();

  if (name.length < 1 || text.length < 3) {
    return false;
  }

  var comment;
  if ($('title').text() == "The Blog Blog | Guestbook") {

    comment = ('<li>' + name + '<br><i class="commenterLoc">from ' + loca + '</i><p>' + text + '</p><hr><br>');
    var guestArray = localStorage.getItem('guestArray');
    if (!guestArray) {
      var statsArray = {
                          'visitors': 0,
                          'shortName': 0,
                          'longName': 0,
                          'fromMongolia': 0
                        };
      localStorage.setItem('guestArray', JSON.stringify(statsArray));
    }
    
    guestArray = localStorage.getItem('guestArray');
    var guestJson = jQuery.parseJSON(guestArray);

    guestJson.visitors += 1;
    if (name.length < 6)
      guestJson.shortName += 1;
    else
      guestJson.longName += 1;
    if (loca.toUpperCase() == "MONGOLIA")
      guestJson.fromMongolia += 1;

    localStorage.setItem('guestArray', JSON.stringify(guestJson));
  }
  else
    comment = ('<li>' + name + '<br><p>' + text + '</p><hr><br>');

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

function showStats() {
  var guestArray = localStorage.getItem('guestArray');
  var guestJson = jQuery.parseJSON(guestArray);

  document.getElementById('g_visit').innerHTML = "Visited today: " + guestJson.visitors;
  document.getElementById('g_short').innerHTML = "Has a short name: " + guestJson.shortName;
  document.getElementById('g_long').innerHTML = "Has a long name: " + guestJson.longName;
  document.getElementById('g_mongol').innerHTML = "Is from Mongolia: " + guestJson.fromMongolia;
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

function cleansession() {
	sessionStorage.setItem("counter", 0);
}

function showposts(n) {
	var counter = 0;
	if (sessionStorage.getItem("counter")) {
		counter = Number(sessionStorage.getItem("counter"));
	}
	else {
		sessionStorage.setItem("counter", 0);
	}

	$.getJSON("misc/json/posts.json", function(json) {
		var outerCounter = counter;
		for (var j = counter; j < n+outerCounter && j < json.length; j++) {
			var post = json[j];
			var postcell = (
					'<div class="outercard grow3">' +
						'<article id="post_' + post.id + '">' +
							'<header> <h2><a href="' + post.link + '">' + post.title + '</a></h2>' +
							'<p><i> by ' + post.author + '  ---  posted ' + post.date + '</i></p>' + '</header>' + post.content +
						'</article></div>'
				);
			$('#postlist').append(postcell);
			counter = counter + 1;
			if (j == json.length - 1) {
				deleteLoadButton();
			}
		}
		sessionStorage.setItem("counter", counter);
	});
}

function deleteLoadButton() {
	document.getElementById('loadButton').innerHTML = "";
}

function showadditional() {
	showposts(4);
}

