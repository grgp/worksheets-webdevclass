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