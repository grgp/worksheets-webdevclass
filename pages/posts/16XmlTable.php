<!DOCTYPE html>
<html>

	<head>
		<!--ws2 HTML5 -->
		<meta charset="utf-8">
		<meta name="description" content="Currently an empty blog.">
		<title>The Blog Blog | XML Table</title>
		<link rel="stylesheet" type="text/css" href="../../css/basic.css" id="theme_css"/>
		<link rel="stylesheet" type="text/css" href="../../css/posts.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/dropdown.css"/>
		<link rel="stylesheet" type="text/css" href="dummy" id="dummycss"/>
		<script src="../../js/jquery-2.1.4.js" type="text/javascript"></script>
		<script src="../../js/navbar.js" type="text/javascript"></script>
		<script language="javascript" type="text/javascript" src="../../js/changeTheme.js"></script>
		<script language="javascript" type="text/javascript" src="../../js/idle.js"></script>
		<script src="../../js/postcomment.js" type="text/javascript"></script>
		<script src="../../js/additionalAJAX.js" type="text/javascript"></script>
		<script src="../../js/phphelper.js" type="text/javascript"></script>
		<!--
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		-->
	</head>
	<body onLoad="showcomments(); displaytable(1);">

<?php

	$nameErr = $emailErr = $commentErr = "";
	$name = $email = $comment = "";	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valid = True;

	  if (empty($_POST["name"])) {
	    $nameErr = "Name is required"; $valid = False;
	  } else {
	    $name = test_input($_POST["name"]);
	    if (!preg_match("/^[a-z]*$/", $name)) {
	      $nameErr = "Only lower case letters allowed"; $valid = False;
	    }
	  }

	  if (empty($_POST["emailaddr"])) {
	    $emailErr = "Email is required"; $valid = False;
	  } else {
	    $email = test_input($_POST["emailaddr"]);
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	$emailErr = "Email is invalid"; $valid = False;
	    }
	  }

	  if (empty($_POST["comment"])) {
	    $commentErr = "Comment is required"; $valid = False;
	  } else {
	    $comment = test_input($_POST["comment"]);
	  }

	  if ($valid) {
	  	$nameErr = "";
	  	$emailErr = "";
	  	$commentErr = "";
	  	echo '<script type="text/javascript">' . 'postParam("' . $name . '", "' . $comment . '");</script>';
	  } else {

	  }

	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>

	<div class="row">
		<div class="navhead">
			<div class="navheadcont">
				<h3>the blog blog</h3>
				<ul class="navheadmenus">
					<li><a href="../../index.html">home</a></li>
					<li><a href="../../pages/archive.html">archive</a></li>
					<li><a href="../../pages/about.html">about</a>
					<li><a href="../../pages/contact.html">contact</a>
					<li><a href="#" onclick="dropdown()">themes</a>
						<ul id="navheadinside">
							<li><a href="#" onclick="changeTheme('../../css/dummycss.css')">orange</a></li>
							<li><a href="#" onclick="changeTheme('../../css/alttheme.css')">blue</a></li>
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
						<article>
							<header>
								<h2>XML Table</h2>
								<p><i>26 October 2015</i></p>
							</header>

							<p>It's inside this link. <br><br> If you don’t have the real content, using Lorem Ipsum is the most common way to fill those. <br><br> Real content, using Lorem Ipsum is the most common way to fill those filler text, it is pretty boring to use. <br><br> Lorem Ipsum again and again.<br><div id='xml1'></div>

						</article>
					</div>
				</div>
=
				<div class="genericbox">
				<h3 style="margin-left: 15px; color: #555555">comments</h3>
				<br>
					<ul id="comments"> </ul> <br> <hr> <br>

					<div class="commentbox">
						<b>Your comment: </b> <br>
						<form method="post" action='' id="commentform">
							<p>Name:</p>
							<input type="text" name="name" id="formname" placeholder="Name is required">
								<span class="error" style="color: #dd6666">&nbsp;&nbsp;&nbsp;<?php echo $nameErr?></span>
							<br>
							<p>E-mail:</p>
							<input type="text" name="emailaddr" id="formemail" placeholder="E-mail is optional">
								<span class="error" style="color: #dd6666">&nbsp;&nbsp;&nbsp;<?php echo $emailErr?></span>
							<br>
							<!--
							<input type="text" name="comment" id="formtext" required pattern=".{20,}" placeholder="Jangan pendek2 yaa :)"><br>
							-->
							<p>Comment:</p>
							<textarea name="comment" form="commentform" id="formarea"></textarea>
								<span class="error" style="color: #dd6666">&nbsp;&nbsp;&nbsp;<?php echo $commentErr?></span>
							<br>
							<input type="submit" value="Submit" onclick="postParam()">
						</form>					
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
									<li><a href="posts/09SlidesWithoutFramework.html">Responsive Carousel</a></li>
								</ul>
							</li>
							<li>
								<a href="#">September 2015</a>
								<ul>
									<li><a href="07AddAndDrop.html">Add and Drop</a></li>
									<li><a href="08ResponsiveYoutube.html">Responsive Youtube Embed</a></li>
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