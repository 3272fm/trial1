<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
</head>
<body>
<div class="trial">

  	<h2>SIGN UP</h2>
      <link rel="stylesheet" href="style.css"> 
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	
  	  <p>First name</p>
  	  <input type="text" name="fname" placeholder="juma" required="" id="fname" onfocusout="f1()">
<p>last name</p></br>
  	  <input type="text" name="lname" required="" placeholder="zulu" id="lname" onfocusout="f1()">
      <p>Email</p>
  	  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="20" placeholder="Enter Email id" required name="email" onfocusout="f1()"></br>
</BR><p>Password</p>
  	<input type="password" name="password" placeholder="8Character minimum" pattern=".{6,}" id="pass" onfocusout="f1()"></br>
      </br></BR>
  	  <button type="submit" class="btn" name="register" class="btn" onclick="f1()"> Register </button></BR></BR>

  	<p>
      <p>Already registered? click here to login <a href="login.php">login</a></p>
  	</p>
  </form>
</body>
</html>