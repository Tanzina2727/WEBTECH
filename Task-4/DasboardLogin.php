<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
    <th style="border: 1px solid black;"><?php if (isset($_SESSION['uname'])) {
    echo "<h1> Welcome " . $_SESSION['uname'] . "</h1>";
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
    } else {
        echo "Cookies Not Set. I will forget you !!!!";
    }
} else {
    header("location:Login.php");
} ?></th>
  </tr>
</table>

<div><?php include 'files/footer.php'; ?></div>
</body>
</html>