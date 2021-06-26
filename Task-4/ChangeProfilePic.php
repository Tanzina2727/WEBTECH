<!DOCTYPE html>
<html>
<head>
	<title>Profile Picture</title>
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
      * <a href="changeProfilePic.php">Change Profile Picture</a><br><br>
      * <a href="changePass.php">Change Password</a><br><br>
      * <a href="logout.php">Logout</a>
    </div>
    </th>
    <th style="border: 1px solid black;">
    $propic = "";

<form action="upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
  <legend><B>PROFILE PICTURE</B></legend><div style='float: left; text-align: left;'>  <br>
  <?php echo "<img src='" . $_SESSION['proPic'] . "' width='180' height='200'><br><br>"; ?>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><hr>
  <input type="submit" name="submit">
</form> </div>
</fieldset>
<div><?php include 'files/footer.php'; ?></div>
</body>
</html>