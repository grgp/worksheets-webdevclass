function showposts() {
	console.log("erere");
	$.getJSON("misc/json/posts.json", function(json) {
		$.each(json, function (i, post) {
			var postcell = (
					'<div class="outercard">' +
						'<article id="post_' + post.id + '">' +
							'<header> <h2><a href="' + post.link + '">' + post.title + '</a></h2>' +
							'<p><i> by ' + post.author + '  ---  posted ' + post.date + '</i></p>' + '</header>' + post.content +
						'</article></div>'
				);
			$('#postlist').prepend(postcell);
		});
	});
}