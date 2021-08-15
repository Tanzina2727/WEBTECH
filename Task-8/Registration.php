<!DOCTYPE html>  
<html>  
<head>  
<title>Registration</title>
<link rel="stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
<script>  
    function validateform(){}  
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
        //email check
        function checkEmail() {
      if (document.getElementById("email").value == "") {
          document.getElementById("emailErr").innerHTML = "Email can't be blank";
          document.getElementById("emailErr").style.color = "red";
          document.getElementById("email").style.borderColor = "red";
      }else{
          document.getElementById("emailErr").innerHTML = "";
        document.getElementById("email").style.borderColor = "black";
      }
      
        }

        //check pass
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
        //confirm pass
        function confirmPass(){
          if (document.getElementById("confirm_password").value == "") {
          document.getElementById("confirmPassErr").innerHTML = "Password can't be blank";
          document.getElementById("confirmPassErr").style.color = "red";
          document.getElementById("confirm_password").style.borderColor = "red";
      }else if(document.getElementById("confirm_password").value.length<6){
          document.getElementById("confirm_password").style.borderColor = "red";
          document.getElementById("confirmPassErr").style.color = "red";
        document.getElementById("confirmPassErr").innerHTML = "Password must be at least 6 characters long.";
      }
      else{
        document.getElementById("confirmPassErr").innerHTML = "";
          document.getElementById("confirmPassErr").style.color = "red";
        document.getElementById("confirm_password").style.borderColor = "black";
      }
        }
        //gender
         
        function checkgender() {
      if (document.getElementById("gender").value == "") {
          document.getElementById("genderErr").innerHTML = "gender can't be blank";
          document.getElementById("genderErr").style.color = "red";
           
      }else{
          document.getElementById("genderErr").innerHTML = "";
      }
      
        }

        //dob
         
        function checkDOB() {
      if (document.getElementById("dob").value == "") {
          document.getElementById("dobErr").innerHTML = "Date of birth can't be blank";
          document.getElementById("dobErr").style.color = "red";
           
      }else{
          document.getElementById("dobErr").innerHTML = "";
         
      }
      
        }
      
</script>  
</head>  
<body class="banner">
<?php 
require 'resources/header.php';
//require 'Controller/storeData.php';
?>

 
<div class="registration">
<fieldset style="width: 400px; margin-left:  -20px;">
<legend>REGISTRATION</legend>                 
  <form method="post" action="<?php echo htmlspecialchars('Controller/storeData.php');?>"> 

  <label for="name"> Name :</label>
  <input type='text' name='name' id='name' onkeyup='checkName()' onblur='checkName()'>
  <span class="error"  id="nameErr"><?php if(!empty($_GET['nameErr'])){echo $_GET['nameErr'];} ?></span><hr>

  <label for="email">Email :</label>
  <input type='text' name='email' id='email' onkeyup='checkEmail()' onblur='checkEmail()'>
  <span class="error"  id="emailErr"><?php if(!empty($_GET['emailErr'])){echo $_GET['emailErr'];}?></span><hr>


  <label for="password">Password :</label>
  <input type="password" id="password" name="password" onkeyup="checkPass()" onblur="checkPass()">
  <span class="error"  id="passErr"> <?php if(!empty($_GET['passErr'])){echo $_GET['passErr'];}?></span><hr>

  <label for="confirm_password">Confirm Password :</label>
  <input type="password" id="confirm_password" name="confirm_password" onkeyup="confirmPass()" onblur="confirmPass()">
  <span class="error"  id="confirmPassErr"> <?php if(!empty($_GET['confirmpassErr'])){echo $_GET['confirmpassErr'];}?></span><hr>

<fieldset style="width: 370px">
<legend> Gender</legend>
  <input type="radio" name="gender" id="gender" value="Male"  onblur="checkgender()">
  <label for="Male">Male</label>

  <input type="radio" name="gender" id="ender" value="Female"  onblur="checkgender()">
  <label for="Memale">Female</label> 

  <input type="radio" name="gender" id="gender" value="Other"  onblur="checkgender()">
  <label for="Other">Other </label>  
  <span  class="error" id="genderErr"> <?php  if(!empty($_GET['genderErr'])){echo $_GET['genderErr'];}?></span>
 </fieldset><hr>

<fieldset style="width: 370px">
  <legend>Date of Birthday</legend>
  <input type="date" name="dob" id="dob" onkeyup="checkDOB()" onblur="checkDOB()"> 
  <span  class="error" id="dobErr"><?php if(!empty($_GET['dobErr'])){echo $_GET['dobErr'];}?></span>
</fieldset><hr>

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
</form>
</fieldset>  
</div>
<?php
//echo $error;
//echo "<br>";
//echo $message;
//echo "<br>";
// if(!empty($message)){
// header("location:../Login.php?msg=Registration Completed");  
// }

?>
</div> 
<?php require 'resources/footer.php';?>
</body>  
</html>  