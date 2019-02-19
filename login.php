<?php
session_start();
require_once('con.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
<?php

if (isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
	
    $qr = $conn->prepare("SELECT * FROM `user` WHERE username='$username' and password='$password'");
    
    $qr->execute();
    
  if ($qr->rowCount() > 0) {
        
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
         header("Location: index.php");
		
    }
    else{
		echo "'Oops, Record not found!";
	}
    
}  

?>
<div class="form">
<h1>Log In</h1>
<form  method="post">

Username:
<input type="text" name="username">
<br><br>
Password:
<input type="password" name="password">
<br><br>
<input name="login" type="submit" value="Login">
</form>
<p>Not registered yet? <a href='sing-up.php'>Register Here</a></p>
</div>
</body>
</html>