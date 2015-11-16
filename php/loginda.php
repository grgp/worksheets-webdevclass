<?php
	require "database.php";

	$resp = "";
	$resp2 = "";
	$respUser = "";
	$respEmail = "";
	$respPass = "";
	$email = "";
	if(isset($_POST["username"])){
		$resp = login($_POST["username"], $_POST["password"]);
		if($resp === ""){
			session_start();
			
			$conn = connectDB();
			$_SESSION["userlogin"] = $_POST["username"];
		}
	} elseif(isset($_GET["username"])) {
		$username = $_GET["username"];
		$email = $_GET["email"];
		$password = $_GET["password"];
		
		if ( ctype_lower($username) and ctype_alnum($password) and filter_var($email, FILTER_VALIDATE_EMAIL) ){
	    $conn = connectDB();
		
			$sql = "INSERT into users (username, email, password) VALUES('$username','$email','$password')";
		
			if(mysqli_query($conn, $sql)) {
				$resp2 = "registration successful, you can login now";
			} else{
				$resp2 = "";
			}
	  } else {
		  	if ( !ctype_lower($username) ) {
		  		$respUser = "the username must all be lowercase alphabet";
		  	}

		  	if ( !ctype_alnum($password) ) {
	  			$respPass = "the password must be alphanumeric";
	  		}

	  		if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	  			$respEmail = "the email address is invalid";
	  		}
	  }

	}
	
	function login($user, $pass){
		$conn = connectDB();
		
		// $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
		$sql = "SELECT * FROM users WHERE username='$user'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) <= 0) {
			mysqli_close($conn);
			return "username not found";
		}

		while($row = $result->fetch_assoc()) {
      if ($row["password"] != $pass) {
      	return "wrong password";
      }
    }

		mysqli_close($conn);
		return "";
		
	}
?>