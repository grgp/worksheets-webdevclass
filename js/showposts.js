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
			console.log("counter: " + outerCounter + " | n: " + n + " | j: " + j + " | counter: " + counter);
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
				console.log("reachme");
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