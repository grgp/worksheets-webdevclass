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
		<title>The Blog Blog | About</title>
		<link rel="stylesheet" type="text/css" href="../css/basic.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="../css/pages.css"/>
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
			<h2>About</h2>
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
								<h2>About George</h2>
							</header>

							<p>When designing anything with content (websites, brochures, etc.), if you don’t have the real content, using Lorem Ipsum is the most common way to fill those spaces. However, for anyone who designs regularly and needs such filler text, it is pretty boring to use Lorem Ipsum again and again.<br><br>

							If you want to try an alternative to Lorem Ipsum, there are several web-based generators which are easy-to-use, customizable and, usually, fun.<br><br>

							Lorem Ipsum is the most common way to fill those spaces. However, for anyone who designs regularly and needs such filler text, it is pretty boring to use Lorem Ipsum again and again.</p><br>

						</article>
					</div>
					<!-- </div> -->
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