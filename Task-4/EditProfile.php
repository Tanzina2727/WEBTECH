<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <style>
.error {color: #FF0000;}
</style>
</head>
<body style="border: 5px solid black;">
<?php
session_start();
echo "<div>";
include 'files/header.php';
echo "</div>";
?>
<table style="width:100%; border: 3px solid black;">
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;">
      Account<hr>
      <div style="float: left; text-align: left;">
      * <a href="DasboardLogin.php">Dashboard</a><br><br>
      * <a href="ViewProfile.php">View Profile</a><br><br>
      * <a href="EditProfile.php">Edit Profile</a><br><br>
      * <a href="ChangeProfilePic.php">Change Profile Picture</a><br><br>
      * <a href="ChangePass.php">Change Password</a><br><br>
      * <a href="logout.php">Logout</a>
    </div>
    </th>
    <th>
<?php
$flag = 1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$userNameErr = "";
$message = '';
$error = '';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// NAME
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-.' ]*$/", $name)) {
            $nameErr = "Only letters white space, period & dash allowed";
            $name = "";
        } else if (str_word_count($name) < 2) {
            $nameErr = "At least two words needed";
            $name = "";
        }
    }
    //   EMAIL
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }
    //   DATE OF BIRTH
    if (empty($_POST["birthday"])) {
        $dobErr = "DOB is required";
    } else {
        $dob = test_input($_POST["birthday"]);
    }
    //   GENDER
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}
?>
<?php
echo "<form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
  <fieldset>
<legend>Edit Profile:</legend><div style='float: left; text-align: left;'>  
  Name: <input type='text' name='name'  >
  <span class='error'>" . $nameErr . "</span>
  <br><hr>
  E-mail: <input type='text' name='email'  >
  <span class='error'> " . $emailErr . "</span>
  <br><hr>
  <fieldset>
  <legend>Gender</legend>
  <input type='radio' name='gender' value='Female'  >Female
  <input type='radio' name='gender' value='Male'  >Male
  <input type='radio' name='gender' value='Other' >Other
  <span class='error'> " . $genderErr . "</span>
  </fieldset>
  <hr>
  <fieldset>
  <legend>Date Of Birth</legend>
  <input type='date' name='birthday'  >
  <span class='error'> " . $dobErr . "</span>
  <br></fieldset><hr>
  <input type='submit' name='submit' value='Change'></div></fieldset>
</form>";
?>    
</th>
  </tr>
</table>
<div><?php include 'files/footer.php'; ?></div>
</body>
</html>