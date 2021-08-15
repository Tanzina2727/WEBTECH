<!DOCTYPE html>
<html>
<head>
<title>LogIn</title>
<link rel="stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
<script>  
    //name
    function validateform(){ } 
      function checkName() {
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("nameErr").style.color = "red";
          document.getElementById("name").style.borderColor = "red";
      }else{
          document.getElementById("nameErr").innerHTML = "";
        document.getElementById("name").style.borderColor = "black";
      }
      
        }

        //password
        function checkPass(){
          if (document.getElementById("password").value == "") {
          document.getElementById("passErr").innerHTML = "Password can't be blank";
          document.getElementById("passErr").style.color = "red";
          document.getElementById("password").style.borderColor = "red";
      }else if(document.getElementById("password").value.length<6){
          document.getElementById("password").style.borderColor = "red";
          document.getElementById("passErr").style.color = "red";
        document.getElementById("passErr").innerHTML = "Password must be at least 6 characters long.";
      }
      else{
        document.getElementById("passErr").innerHTML = "";
          document.getElementById("passErr").style.color = "red";
        document.getElementById("password").style.borderColor = "black";
      }
        }
      </script>
</head>

<body class= "banner">
<?php 
session_start();
if (isset($_SESSION['name'])){header("location:Welcome.php");}
else{require 'resources/header.php';}
require 'Controller/LoginCheck.php';             
?>


<div class="registration">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
<fieldset style="width: 420px">
<legend>LOGIN</legend>
<?php if(!empty($_GET['msg'])){echo $_GET['msg'];} ?> <br>
  <label for="name"> Name :</label>
  <input type="text" name="name" id="name" value="<?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?>" onkeyup="checkName()" onblur="checkName()">
  <span class="error"  id="nameErr"> <?php echo $nameErr;?></span> <hr>

  <label for="password">Password :</label>
  <input type="password" id="password" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" onkeyup="checkPass()" onblur="checkPass()">
  <span class="error"  id="passErr"> <?php echo $passwordErr;?></span><hr>

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