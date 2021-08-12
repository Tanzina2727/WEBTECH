<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
session_start();
  echo "<div>";include 'resources/header.php';echo "</div>";

 ?>
  <table style="width:100%; border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;">
      Account<hr>
      <div style="float: left; text-align: left;">
      * <a href="dashboard.php">Dashboard</a><br><br>
      * <a href="profile.php">View Profile</a><br><br>
      * <a href="changeProfile.php">Edit Profile</a><br><br>
      * <a href="changeProfilePic.php">Change Profile Picture</a><br><br>
      * <a href="changePassword.php">Change Password</a><br><br>
      * <a href="logout.php">Logout</a>
    </div>
    </th>
    <th style="border: 1px solid black;">
	<?php 
$cpassErr = $npassErr = $rtnpassErr = "";
$cpass = $npass = $rtnpass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpass"])) {
    $cpassErr = "Current Password is required";
  }
  else if (!strcmp($_SESSION['password'], $_POST["cpass"])==0) {
      $cpassErr = "Current Password is incorrect";
      $cpass ="";
    } 
  else {
    $cpass = $_POST["cpass"];
  }

  if (empty($_POST["npass"])) {
    $npassErr = "Enter The New Password";
  } else {
    $npass = test_input($_POST["npass"]);
    if (strlen($npass)<8) {
      $npassErr = "Password must be 8 charecters";
       $npass ="";
    }
    else if (!preg_match("/[@,#,$,%]/",$npass)) {
      $npassErr = "Password must contain at least one of the special characters (@, #, $,%)";
       $npass ="";
    }
    else if (strcmp($cpass, $npass)==0) {
      $npassErr = "New Password should not be same as the Current Password";
       $npass ="";
    }
  }

  if (empty($_POST["rtnpass"])) {
    $rtnpassErr = "Retype The New Password";
  } else {
    $rtnpass = $_POST["rtnpass"];
    if (!strcmp($npass, $rtnpass)==0) {
      $rtnpassErr = "New Password & Retyped Password Dosen't Match";
      $rtnpass ="";
    }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!empty($rtnpass)){
        $servername = "localhost";
$uname = "root";
$pword = "";
$dbname = "finaldb";
// Create connection
$conn = new mysqli($servername, $uname, $pword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE labtask6 SET password='".$rtnpass."' WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'";

if ($conn->query($sql) === TRUE) {
  echo "<p>Password Changed Successfully</p>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
<legend><B>CHANGE PASSWORD</B></legend><div style="float: left; text-align: right;">  
  Current Password: <input type="Password" name="cpass">
  <span class="error">*<?php echo $cpassErr;?></span>
  <br><br>
  New Password: <input type="Password" name="npass">
  <span class="error">*<?php echo $npassErr;?></span>
  <br><br>
  Retype New Password: <input type="Password" name="rtnpass">
  <span class="error">*<?php echo $rtnpassErr;?></span>
  <br><hr>
  <input type="submit" name="submit" value="Submit"></div>
</fieldset>
</form></th>
  </tr>
</table>
<div><?php include 'resources/footer.php';?></div>
</body>
</html>