<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
    <th><?php if (isset($_SESSION['username'])) {
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

$sql = "SELECT * FROM labtask6 WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
while($row = $result->fetch_assoc()) {
    $name=$row["name"];
    $email=$row["email"];
    $gender=$row["gender"];
    $dateofbirth=$row["dateofbirth"];
  }
} else {
  $unamedb="";
$pworddb="";
}

$conn->close();

	echo "<fieldset>
<legend><B>PROFILE</B></legend><div style= 'margin-right: 750px;float: left; text-align: left; color:blue;'> Username: ".$_SESSION['username']."<hr>
	<br>Name: ". $name."<hr>
	<br>Email: ". $email."<hr>
	<br>Gender: ". $gender."<hr>
	<br>Date Of Birth: ". $dateofbirth."<hr>
	</div>
	<div style= 'float: right;position: absolute;left:700px; top: 250px; '>
	
	</div></fieldset>";

}?>
    
</th>
  </tr>
</table>

<div><?php include 'resources/footer.php';?></div>
</body>
</html>