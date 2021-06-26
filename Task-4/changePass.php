<!DOCTYPE html>
<html>
<head>
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
      * <a href="ChangeProfile.php">Edit Profile</a><br><br>
      * <a href="ChangeProfilePic.php">Change Profile Picture</a><br><br>
      * <a href="ChangePass.php">Change Password</a><br><br>
      * <a href="logout.php">Logout</a>
    </div>
    </th>
    <th style="border: 1px solid black;">
	<?php
$currPassErr = $newpassErr = $retypedpassErr = "";
$currPass = $newpass = $retypedpass = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["currPass"])) {
        $currPassErr = "Password is required";
    } else {
        $currPass = test_input($_POST["currPass"]);
        if (!preg_match("/[a-zA-Z0-9.@]/", $currPass)) {
            $currPassErr = "Password must contain characters,number and @";
            $currPass = "";
        }
    }
    if (empty($_POST["newpass"])) {
        $newpassErr = "Type new password.";
    } else {
        $newpass = test_input($_POST["newpass"]);
        if ($currPass == $newpass) {
            $newpassErr = "New password cannot match with previous password.";
            $newpass = "";
        }
    }
    if (empty($_POST["retypedpass"])) {
        $retypedpassErr = "Type new password.";
    } else {
        $retypedpass = test_input($_POST["retypedpass"]);
        if ($retypedpass != $newpass) {
            $retypedpassErr = "Doesn't maatch with new password.Type again.";
            $retypedpass = "";
        }
    }
} ?>
 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <fieldset style=" text-align: left; ">
<legend><B>CHANGE PASSWORD</B></legend><div style="float: left; text-align: right;">  
Current Password: <input type="Password" name="currPass">
  <span class="error"> <?php echo $currPassErr; ?></span>
  <br><br>
  <div style="color: green;">
  New Password: <input type="Password" name="newpass">
  <span class="error"> <?php echo $newpassErr; ?></span>
  <br><br> </div>
  <div style="color: red;">
  Re-type Password: <input type="Password" name="retypedpass">
  <span class="error"> <?php echo $retypedpassErr; ?></span>
  <br><br> </div>
  <input type="submit" name="submit" value="Submit">
</fieldset>
</form></th>
  </tr>
</table>
<div><?php include 'files/footer.php'; ?></div>
</body>
</html>