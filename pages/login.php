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

					<?php

					session_start(); // Starting Session
					$error=''; // Variable To Store Error Message

					// if (isset($_POST['submit'])) {
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						
						if (empty($_POST['username']) || empty($_POST['password'])) {
							$error = "Username or Password is invalid";
						}
						
						else {
						
							// Define $username and $password
							$username=$_POST['username'];
							$password=$_POST['password'];
							
							// Establishing Connection with Server by passing server_name, user_id and password as a parameter
							$connection = mysql_connect("localhost", "root", "");
							
							// To protect MySQL injection for Security purpose
							$username = stripslashes($username);
							$password = stripslashes($password);
							$username = mysql_real_escape_string($username);
							$password = mysql_real_escape_string($password);
							
							// Selecting Database
							$db = mysql_select_db("ppw", $connection);
							
							// SQL query to fetch information of registerd users and finds user match.
							$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
							$rows = mysql_num_rows($query);
							
							if ($rows == 1) {
								$_SESSION['login_user']=$username; // Initializing Session
								header("location: profile.php"); // Redirecting To Other Page
							} else {
								$error = "Username or Password is invalid";
							}
							
							mysql_close($connection); // Closing Connection

							if(isset($_SESSION['login_user'])){
								header("location: profile.php");
							}

						}
					}

					?>

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
							<p>Username: <?php echo $username;?></p>
							<input type="text" name="username" id="loginname">
								<span class="error" style="color: #dd6666">&nbsp;&nbsp;&nbsp;<?php echo ""?></span>
							<br>
							<p>Password:</p>
							<input type="password" name="password" id="loginpass">
								<span class="error" style="color: #dd6666">&nbsp;&nbsp;&nbsp;<?php echo ""?></span>
							<br>
							<br>
							<input type="submit" value="Submit"">
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