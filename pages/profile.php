<?php

include('../php/session.php');



?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | Login</title>
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
					<li><a href="../index.html">home</a></li>
					<li><a href="../pages/archive.html">archive</a></li>
					<li><a href="../pages/about.html">about</a>
					<li><a href="../pages/contact.html">contact</a>
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
		<div class="row">
			<div class="loginbox">
				<div class="genericbox" id="aboutpic">
				<h3>Login</h3>
					<form method="post" action='' id="commentform">
							<p>Username:</p>
							<h3><?php echo $login_session; ?></h3>
							<br>
							<p>Hi there!</p>
							<br>
							<input type="submit" value="Submit" onclick="postParam()">
					</form>
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