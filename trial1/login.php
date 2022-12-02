<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" href="style.css"> 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
      <div class="login">
    <h2>Login Here</h2>
    <p> User Email</p>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="20" placeholder="Enter Email id" required name="email" onfocusout="f1()"></br>
</BR></br>
    <p>Password</p>
    <input type="password" name="password" onclick="f1()" placeholder="password">  <br><br><br>

     <button type="submit" name="s" class="btn" name="log" onclick="f1()">log in</button></br></BR>
     <p>
     <p>Don't have an account? click here to register <a href="register.php">Register</a></p>
  </form>
        </html>
