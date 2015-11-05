function postParam(name, text) {
  if (name.length < 1 || text.length < 3) {
    return false;
  }

  var comment;

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