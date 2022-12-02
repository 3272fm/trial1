<?php
session_start();

$fname = "";
$lname = "";
$email    = "";
$errors = array(); 

//database connection
$db = mysqli_connect('localhost', 'root', '', 'trial1');

//registration
if (isset($_POST['register'])) {

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password= mysqli_real_escape_string($db, $_POST['password']);

  //ensuring no empty records are recorded into the database
  if (empty($fname)) { array_push($errors, "first name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

   //avoiding duplicate database records by checking first name and email
  $user_check_query = "SELECT * FROM users WHERE first_name='$fname' OR user email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['first_name'] === $fname) {
      array_push($errors, "name already exists");
    }

    if ($user['user email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

//saving the records with zero errors
  if (count($errors) == 0) {
  	
    $password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO `users`(`first_name`, `last_name`, `user_email`, `password`) VALUES ('$fname','$lname','$email','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['fname'] = $fname;
  	header('location: welcome.php');
  }
}

//LOGIN USER
if (isset($_POST['s'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
  	$query = "SELECT * FROM users WHERE user_email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['fname'] = $fname;
  	  header('location: welcome.php');
  	}else {
  		array_push($errors, "Wrong authentication credentials");
  	}
  }
}
