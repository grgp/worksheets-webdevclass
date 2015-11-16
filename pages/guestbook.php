<?php
	require "../php/database.php";
	session_start();

	if(!isset($_SESSION["userlogin"])){
		header("Location: pages/login.php");
	}

	$conn = connectDB();
	$start = 0;
	if(isset($_GET["num"])){
		$start = $_GET["num"];
	}
	
	//$query = "SELECT username, email FROM users LIMIT 3 OFFSET ".$start; 
	$query = "SELECT name, content FROM comments LIMIT 50 OFFSET ".$start; 
	
	$result = $conn->query($query);
	
	$query2 = "SELECT COUNT(*) as number FROM users";
	
	$result2 = $conn->query($query2);
	$number = 0;
	if ($result2->num_rows > 0) {
		$row = $result2->fetch_assoc();
		$number = $row["number"];
	}

	// POST COMMENT

	$username = $_SESSION["userlogin"];
	
	$sql2 = "SELECT * FROM users WHERE username='$username'";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = $result2->fetch_assoc()) {
		$email = $row2["email"];
	}

	$commentErr = "";
	$comment = "";	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valid = True;

	  if (empty($_POST["comment"])) {
	    $commentErr = "Comment is required"; $valid = False;
	  } elseif ( (strlen($comment) > 144)) {
	  	$commentErr = "Comments can't be longer than 144 characters"; $valid = False;
		} else {
	    $comment = test_input($_POST["comment"]);
	  }

	  if ($valid) {
	  	$commentErr = "";
	  	
	  	$sql = "INSERT into comments (name, email, content) VALUES('$username','$email','$comment')";
	
			if(mysqli_query($conn, $sql)) {
				$resp2 = "recorded";
			} else{
				$resp2 = "not recorded";
			}

			header("Location: daftar_user4.php");

	  }

	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | New Guestbook</title>
		<link rel="stylesheet" type="text/css" href="../css/basic.css" id="theme_css"/>
		<link rel="stylesheet" type="text/css" href="../css/posts.css"/>
		<link rel="stylesheet" type="text/css" href="../css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="dummy" id="dummycss"/>

		<script src="../js/jquery-2.1.4.js" type="text/javascript"></script>
		<script src="../js/navbar.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/changeTheme.js"></script>
		<script type="text/javascript" src="../js/idle.js"></script>
		<script src="../js/additionalAJAX.js" type="text/javascript"></script>
	</head>
	<body>

	<div class="row">
		<div class="navhead">
			<div class="navheadcont">
				<h3>the blog blog</h3>
				<ul class="navheadmenus">
					<li><a href="../index.php">home</a></li>
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
			<div class="col-8-to-12">
				<div class="content">
					<div class="outercard">
						
					</div>
				</div>

				<div class="genericbox">

				<h3 style="margin-left: 15px; color: #555555">Statistics for Visitors</h3>
				<ul>
					<li>
							<li id="g_visit">Visited today: 0</li>
							<li id="g_short">Has a short name: 0</li>
							<li id="g_long">Has a long name: 0</li>
							<li id="g_mongol">Is from Mongolia: 0</li>
					</li>
					<br>
					<br>
					<hr>
				</ul>

				<h3 style="margin-left: 15px; color: #555555">comments</h3>
					<ul id="comments">
						<!--
						<li>
							Stan<br>
							<p>How amazing</p>
							<hr><br>
						</li>
						<li>
							Andy<br>
							<p>So interesting<p>
							<hr><br>
						</li>
						-->
					</ul>

					<br> <hr> <br>
					
					<div class="commentbox">
					Your comment:<br>
					<form id="commentform">
						<input type="text" name="name" id="formname" required placeholder="Name is required"><br>
						<input type="email" name="emailaddr" id="formemail" placeholder="E-mail is optional"><br>
						<input type="text" name="location" id="formloca" placeholder="Country currently on"><br>
						<!--
						<input type="text" name="comment" id="formtext" required pattern=".{20,}" placeholder="Jangan pendek2 yaa :)"><br>
						-->
					</form>
					
					<textarea name="comment" form="commentform" id="formarea"></textarea><br>
					<input type="button" value="Submit" onclick="post()">

					
				</div>
				</div>

			</div>

			<div class="col-4-to-12">
				<div class="navsidebar">
					<div class="calendar">
					</div>

					<div class="recent">
						<ul>
							<li>
								<a href="#">October 2015</a>
								<ul>
									<li><a href="../posts/09SlidesWithoutFramework.html">Responsive Carousel</a></li>
								</ul>
							</li>
							<li>
								<a href="#">September 2015</a>
								<ul>
									<li><a href="../07AddAndDrop.html">Add and Drop</a></li>
									<li><a href="../08ResponsiveYoutube.html">Responsive Youtube Embed</a></li>
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
			</div>
		</div>

		<footer>
			
			<p>Copyright 2015.</p>
			<a href="https://github.com/grgp">Find me on my inactive Github.</a>
		</footer>

	</div>

	</body>
</html>