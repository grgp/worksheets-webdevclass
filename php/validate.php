<?php

$nameErr = $emailErr = $commentErr = "";
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-z ]*$/", $name)) {
      $nameErr = "Only lower case letters and white space allowed"; 
    }
  }

  if (empty($_POST["emailaddr"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["emailaddr"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>