<?php
	session_start();

	if(!isset($_SESSION["userlogin"])){
		header("Location: login.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | Archive</title>
		<link rel="stylesheet" type="text/css" href="../css/basic.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="../css/pages.css"/>
		<link rel="stylesheet" type="text/css" href="dummy" id="dummycss"/>
		<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'> -->
		<script src="../js/navbar.js" type="text/javascript"></script>
		<script language="javascript" type="text/javascript" src="../js/changeTheme.js"></script>
		<script language="javascript" type="text/javascript" src="../js/idle.js"></script>
	</head>
	<body>

	<div class="row">
		<div class="navhead">
			<div class="navheadcont">
				<h3>the blog blog</h3>
				<ul class="navheadmenus">
					<li><a href="../index.php">home</a></li>
					<li><a href="../pages/archive.php">archive</a></li>
					<li><a href="../pages/about.php">about</a>
					<li><a href="../pages/contact.php">contact</a>
					<li><a href="#" onclick="dropdown()">themes</a>
						<ul id="navheadinside">
							<li><a href="#" onclick="changeTheme('../css/dummycss.css')">orange</a></li>
							<li><a href="#" onclick="changeTheme('../css/alttheme.css')">blue</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row pagetitle">
			<h2>Archive</h2>
		</div>

		<div class="row">
			<div class="col-8-to-12">
				<div class="genericbox">
					<h3>Main pages</h3>
						<ul>
							<li> <a href="../index.php">Homepage</a> </li>
							<li> <a href="../pages/archive.php">Sitemap</a> </li>
							<li> <a href="../pages/about.php">About</a> </li>
							<li> <a href="../pages/contact.php">Contact</a> </li>
						</ul>
					<hr>
					<h3>Posts</h3>
						<ul>
							<li><b>October 2015</b>
								<ul>
									<li><a href="posts/09SlidesWithoutFramework.html">Responsive Carousel</a></li>
								</ul>
							</li>
							<li><b>September 2015</b>
								<ul>
									<li> <a href="posts/07AddAndDrop.html">Add and Drop</a> </li>
									<li> <a href="posts/08ResponsiveYoutube.html">Responsive Youtube Embed</a> </li>
								</ul>
							</li>
							<li><b>August 2015</b>
								<ul>
									<li> <a href="#">Fourth post</a> </li>
									<li> <a href="#">Third post</a> </li>
									<li> <a href="#">Second post</a> </li>
								</ul>
							</li>
							<li><b>July 2015</b>
								<ul>
									<li> <a href="#">First post</a> </li>
									<li> <a href="#">Test post please ignore</a> </li>
								</ul>
							</li>
						</ul>
					<hr>
				</div>
			</div>

			<div class="col-4-to-12">
				<div class="genericbox">
					<p>Search box</p>
				</div>
			</div>
		</div>

		<footer>
			<p>Copyright 2015.</p>
			<a href="https://github.com/grgp">Find me on my inactive Github.</a>
		</footer>

	</div>

	</body>
</html>