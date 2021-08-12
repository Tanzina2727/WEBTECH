<!DOCTYPE html>
<html>
<head>
<title>LogIn</title>
<link rel="stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body class= "banner">
<body class="navbar">
<?php 
session_start();
if (isset($_SESSION['name'])){header("location:Welcome.php");}
else{require 'resources/header.php';}
require 'Controller/LoginCheck.php';             
?>


<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
<fieldset style="width: 420px">
<legend>LOGIN</legend>

  <label for="name">Name :</label>
  <input type="text" id="name" name="name" value="<?php if(isset($_COOKIE["name"])) { echo $_COOKIE["name"]; } ?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>

  <label for="password">Password :</label>
  <input type="text" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>

  <hr>

  <input type="checkbox" id="remember_me" name="remember_me">
  <label for="remember_me">Remember Me</label><br><br>

  <input type="submit" value="Submit"><a href="Forgot Password.php">Forgot Password?</a>
</fieldset>
</div>
 <?php require 'resources/footer.php';?>
</form>
</body>
</html>