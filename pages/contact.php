<?php
	session_start();

	if(!isset($_SESSION["userlogin"])){
		header("Location: login.php");

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<!--ws2 HTML5 -->
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | Contact</title>
		<link rel="stylesheet" type="text/css" href="../css/basic.css"/>
		<link rel="stylesheet" type="text/css" href="../css/pages.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="dummy" id="dummycss"/>
		<script src="../js/navbar.js" type="text/javascript"></script>
		<script language="javascript" type="text/javascript" src="../js/changeTheme.js"></script>
		<script language="javascript" type="text/javascript" src="../js/idle.js"></script>
		<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'> -->
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
			<h2>Contact</h2>
		</div>
		<div class="row">
			<div class="col-4-to-12">
				<div class="genericbox" id="aboutpic">
						<img src="../images/rabbitthingy.jpg"/>
						<p>artist's rendition might not be accurate</p>
				</div>
			</div>
			<div class="col-8-to-12">
				<div class="content">
					<div class="outercard">
						<article id="largertext">
							<header>
								<h2>George Albert Pitoy</h2>
							</header>
							<p>Student at the Computer Science Faculty of University of Indonesia</p>

							<p>NPM: 1406569781</p>

							<p>E-mail: g.a.pitoy [at] gmail (dot)[com]
							<i>(Because spammer bots are annoying)</i></p>

							<p>Github: <a href="https://github.com/grgp">grgp</a>
							<br><br>

						</article>
					</div>
				</div>
			</div>

		</div>

		<footer>
			<p>Copyright 2015. Image <a href="http://heathersketcheroos.tumblr.com/"> <b>neither mine</b></a> nor me.</p>
			<a href="https://github.com/grgp">Find me on my inactive Github.</a>
		</footer>

	</div>

	</body>
</html>	