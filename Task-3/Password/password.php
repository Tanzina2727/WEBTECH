<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$currPassErr = $newpassErr = $retypedpassErr = "";
$currPass = $newpass = $retypedpass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["currPass"])) {
    $currPassErr = "Password is required";
  } else {
    $currPass = test_input($_POST["currPass"]);
    if (!preg_match("/[a-zA-Z0-9.@]/",$currPass)) {
      $currPassErr = "Password must contain characters,number and @";
      $currPass ="";
    }
  }

  if (empty($_POST["newpass"])) {
    $newpassErr = "Type new password.";
  } else {
    $newpass = test_input($_POST["newpass"]);
    if ($currPass == $newpass) {
      $newpassErr = "New password cannot match with previou password.";
      $newpass ="";
    }
  }

  if (empty($_POST["retypedpass"])) {
    $retypedpassErr = "Type new password.";
  } else {
    $retypedpass = test_input($_POST["retypedpass"]);
    if ($retypedpass != $newpass) {
      $retypedpassErr = "New password didn't match.";
      $retypedpass ="";
    }
  }


  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   
  Current Password: <input type="Password" name="currPass">
  <span class="error"> <?php echo $currPassErr;?></span>
  <br><br>
  New Password: <input type="Password" name="newpass">
  <span class="error"> <?php echo $newpassErr;?></span>
  <br><br>
  Re-type Password: <input type="Password" name="retypedpass">
  <span class="error"> <?php echo $retypedpassErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
   
 

</form>
<p><b>Your Result:</b></p>
<?php
echo $currPass;
echo "<br>";
echo $newpass;
echo "<br>";
echo $retypedpass;
echo "<br>";
?>
</body>
</html>