<!DOCTYPE html>  
<html>  
<head>  
<title>Registration</title>
<link rel="stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
</head>  
<body class="banner">
<?php 
session_start();

if (isset($_SESSION['name'])){header("location:Welcome.php");}
else{  require 'resources/header.php';}
require 'Controller/storeData.php';
?>

 
<div class="registration">
<fieldset style="width: 400px; margin-left:  -20px;">
<legend>REGISTRATION</legend>                 
  <form method="post"> 

  <label for="name"> Name :</label>
  <input type="text" id="name" name="name">
  <span class="error"> <?php echo $nameErr;?></span><hr>

  <label for="email">Email :</label>
  <input type="text" id="email" name="email">
  <span class="error"> <?php echo $emailErr;?></span><hr>


  <label for="password">Password :</label>
  <input type="password" id="password" name="password">
  <span class="error"> <?php echo $passwordErr;?></span><hr>

  <label for="confirm_password">Confirm Password :</label>
  <input type="password" id="confirm_password" name="confirm_password">
  <span class="error"> <?php echo $confirm_passwordErr;?></span><hr>

<fieldset style="width: 370px">
<legend> Gender</legend> 
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other </label>  
  <span class="error"> <?php echo $genderErr;?></span>
 </fieldset><hr>

<fieldset style="width: 370px">
  <legend>Date of Birthday</legend>
  <input type="date" name="dob"> 
  <span class="error"> <?php echo $dobErr;?></span>
</fieldset><hr>

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
</form>
</fieldset>  
</div>
<?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</div> 
<?php require 'resources/footer.php';?>
</body>  
</html>  