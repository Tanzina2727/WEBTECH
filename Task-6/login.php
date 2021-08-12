<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<div><?php include 'resources/header.php';?></div>

<?php
$userNameErr = $passErr = "";
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
    }
    else if (strlen($username)<2) {
      $userNameErr = "At least two charecters needed";
      $username ="";
    }
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["Password"]);
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!empty($username)) {
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

$sql = "SELECT * FROM labtask6 WHERE username='".$username."' AND password='".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $unamedb=$username;
  $pworddb=$password;
} else {
  $unamedb="";
$pworddb="";
}

$conn->close();

    }
session_start();

if (isset($_POST['username'])) {
	if ($username==$unamedb && $password==$pworddb) {
		$_SESSION['username'] = $unamedb;
    $_SESSION['password'] = $pworddb;
		header("location:dashboard.php");
	}
	else{
		$msg="username or password invalid";
		echo "<script>alert('username or pass incorrect!')</script>";
	}

}

 ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
<legend><B>LOGIN</B></legend>  
  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $userNameErr;?></span>
  <br><br>
  Password: <input type="Password" name="Password">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  <input type="checkbox" id="reme" name="rememberMe">
  <label for="reme"> Remember Me</label><br>
  <br>
  <input type="submit" name="submit" value="Submit">
  <a href="">Forgot Password?</a>
</fieldset>

</form>

<div><?php include 'resources/footer.php';?></div>
</body>
</html>