<?php
	require "database.php";

	$resp = "";
	$resp2 = "";
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
				$resp2 = "recorded";
			} else{
				$resp2 = "not recorded";
			}
	  } else {
	  	$resp2 = "the username or email or password entered is correct";
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