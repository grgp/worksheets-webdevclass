<?php
	session_start();

	if(!isset($_SESSION["userlogin"])){
		header("Location: pages/login.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<!--ws2 HTML5 -->
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | Home</title>
		<link rel="stylesheet" type="text/css" href="css/basic.css" id="theme_css"/>
		<link rel="stylesheet" type="text/css" href="css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="dummy" id="dummycss"/>

		<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="js/navbar.js"></script>
		<script type="text/javascript" src="js/changeTheme.js"></script>
		<script type="text/javascript" src="js/idle.js"></script>
		<script type="text/javascript" src="js/additionalAJAX.js"></script>
		<!--
		Obsolete as of Tugas 2
		<script type="text/javascript" src="js/readmore.js"></script>
		-->


	</head>
	<body onLoad="cleansession(); showposts(4); displaytable(1); showStats()">

	<div class="row">
		<div class="navhead">
			<div class="navheadcont">
				<h3>the blog blog</h3>
				<ul class="navheadmenus">
					<li><a href="index.php">home</a></li>
					<li><a href="pages/archive.php">archive</a></li>
					<li><a href="pages/about.php">about</a>
					<li><a href="pages/contact.php">contact</a>
					<li onclick="dropdown()">themes
						<ul id="navheadinside">
							<li><a href="#" onclick="changeTheme('css/dummycss.css')">orange</a></li>
							<li><a href="#" onclick="changeTheme('css/alttheme.css')">blue</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="banner">
		<div class="row">
				<h1>the blog blog</h1>
				<h3>Well... this is a blog, I guess.</h3>
		</div>
		<div class="row">
			<div class="featuredrow">
				<div class="col-4-to-12">
					<a href="pages/posts/09SlidesWithoutFramework.html">
					<div class="featuredbox grow">
						<img src="images/resized2.jpg" alt="thumb1"/>
						<div class="featuredboxcont">
							<h3>Responsive Carousel</h3>
							<p>These deadlines :(</p>
						</div>
					</div>
					</a>
				</div>
				<div class="col-4-to-12">
					<a href="pages/posts/07AddAndDrop.html">
					<div class="featuredbox grow">
						<img src="images/castle.jpg" alt="thumb1"/>
							<div class="featuredboxcont">
								<h3>Add and Drop</h3>
								<p>Lorem ipsum igitur placeholder text sucks. Try hovering over!</p>
							</div>
					</div>
					</a>
				</div>
				<div class="col-4-to-12">
					<a href="pages/posts/08ResponsiveYoutube.html">
					<div class="featuredbox grow" id="lastbox">
						<img src="images/flying-carpet.jpg" alt="thumb1"/>
						<div class="featuredboxcont">
							<h3>Fourth post</h3>
							<p>Too much deadlines to make the bonus...</p>
						</div>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-8-to-12">
				<div class="content">

					<div id="postlist">
					</div>

					<div id="loadButton" onClick="showadditional()">
						<div class="outercard grow3">
							<div class="readmoreb"><br>more posts</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col-4-to-12">
				<div class="navsidebar grow">
					<ul>
						<li>
							<?php 
								if (isset($_SESSION["userlogin"])) {
									echo "logged in as <b>" . $_SESSION["userlogin"] . "</b>";
								} else {
									echo '<li>login to access the guestbook</li>';
								}
							?>
						</li>
						<br>
						<hr>

						<li><b><i>
							<?php
								if (isset($_SESSION["userlogin"])) {
									echo '<a href="pages/logout.php">Logout</a><br><br><hr><a href="pages/guestbook.php">Guestbook</a>';
								} else {
									echo '<a href="pages/login.php">Login</a>';
								}
							?>
						</i></b></li>
					</ul>
				</div>

				<div class="navsidebar grow">
					<div class="calendar">
					</div>

					<div class="recent">
						<ul>
							<li>
								<a href="#">October 2015</a>
								<ul>
									<li><a href="pages/posts/16XmlTable.php">XML Table</a></li>
									<li><a href="pages/posts/15TheNthPost.html">The Nth Post</a></li>
									<li><a href="pages/posts/14HeresAnotherPost.html">Here's Another Post</a></li>
									<li><a href="pages/posts/09SlidesWithoutFramework.html">Responsive Carousel</a></li>
								</ul>
							</li>
							<li>
								<a href="#">September 2015</a>
								<ul>
									<li><a href="pages/posts/07AddAndDrop.html">Add and Drop</a></li>
									<li><a href="pages/posts/08ResponsiveYoutube.html">Responsive Youtube Embed</a></li>
								</ul>
							</li>
							<li>
								<a href="#">August 2015</a>
								<ul>
									<li><a href="#">Fourth post</a></li>
									<li><a href="#">Third post</a></li>
									<li><a href="#">Second post</a></li>
								</ul>
							</li>
							<li>
								<a href="#">July 2015</a>
								<ul>
									<li><a href="#">First post</a></li>
									<li><a href="#">Test post please ignore</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>

				<div class="navsidebar grow stats">
					<ul>
						<li><b>Statistics for Visitors</b></li>
						<li>
							<li id="g_visit">Visited today: 0</li>
							<li id="g_short">Has a short name: 0</li>
							<li id="g_long">Has a long name: 0</li>
							<li id="g_mongol">Is from Mongolia: 0</li>
						</li>
						<br>
						<hr>

						<li><b><i><a href="pages/guestbook.html">Old Guestbook</a></i></b></li>
					</ul>
				</div>
			</div>
		</div>

		<footer>
			<p>Copyright 2015. Image credit from Unsplash.</p>
			<a href="https://github.com/grgp">Find me on my inactive Github.</a>
		</footer>

	</div>

	</body>
</html>
