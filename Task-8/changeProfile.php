<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
  
  <style>
.error {color: #FF0000;}
</style>

  <!-- //js validation -->
  
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
			if (document.getElementById("birthday").value == "") {
			  	document.getElementById("birthdayErr").innerHTML = "Date of birth can't be blank";
			  	document.getElementById("birthdayErr").style.color = "red";
			  	 
			}else{
			  	document.getElementById("birthdayErr").innerHTML = "";
				 
			}
			
        }
      
</script>  

</head>
<body class="banner">
<?php session_start(); require 'resources/header2.php';
  ?>
<div class="div">
<div class="registration">
<?php
require_once ('model/model.php');
$user = showUser($_SESSION['name']);
$check="checked";
echo"<form name='myForm' onsubmit='return validateform()' method='post' action='Controller/editProfileController.php'>
<fieldset>
  <legend>Edit Profile:</legend>
  Name: <input type='text' name='name' id='name' value='".$user['Name']."' onkeyup='checkName()' onblur='checkName()'>
  <span id='nameErr'></span>
<br/> <hr>

  Email: <input type='text' name='email' id='email' value='".$user['Email']."' onkeyup='checkEmail()' onblur='checkEmail()'>
  <span id='emailErr'></span>
<br/> "; ?><hr>

   Gender: 
   <input type='radio' name='gender' id='gender' value='Female' <?php if($user['Gender']=='Female'){echo $check;} ?>  onblur='checkgender()'> Female
   <input type='radio' name='gender' id='gender' value='Male' <?php if($user['Gender']=='Male'){echo $check;} ?>  onblur='checkgender()'> Male
   <input type='radio' name='gender' id='gender' value='Other' <?php if($user['Gender']=='Other'){echo $check;} ?>   onblur='checkgender()'> Other
   <span id='genderErr'></span>
<br/><hr> <?php echo "

  Date Of Birth: <input type='date' name='birthday' id='birthday'  value='".$user['DateOfBirth']."'  onblur='checkDOB()'>
  <span id='birthdayErr'></span>
<br/> <hr>
 
<input type='submit' value='update'>
</form>";
?>
</div>
	</div>
<!-- </th>
  </tr>
</table> -->
<div><?php require 'resources/footer.php'; ?></div>
</body>
</html>