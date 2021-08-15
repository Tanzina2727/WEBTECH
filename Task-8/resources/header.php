<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href='https://css.gg/log-out.css' rel='stylesheet'>
<style>
.btn {
    background-color: gray;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
 }
.btn:hover {
    background-color: RoyalBlue;
}
  </style>
</head>
<body class ="navbar">

<header>

<h1 style="color:black; background-color: darkgrey;"><img src="resources/logo.png" width="100" height="100">Urgent E-Pharma System </h1>
<!-- <div class="right">
<button class="btn"><i class="fa fa-home"></i><a href="Welcome.php"> Home</a></button>
<button class="btn"><i class="fa fa-user"></i>	<a href="Login.php">Login</a></button>
<button class="btn"><i class="fas fa-registered"></i><a href="Registration.php"> Registration</a></button>
</div> -->
<div class="right">
<?php
if (empty($_SESSION['name'])) {
    echo "<button class='btn'><i class='fa fa-home'></i><a href='Welcome.php'> Home</a></button>";
    echo"<button class='btn'><i class='fa fa-user'></i>	<a href='Login.php'>Login</a></button>";
	echo"<button class='btn'><i class='fas fa-cash-register'></i><a href='Registration.php'> Registration</a></button>";  
} else {
    echo "<div style='float: right';>" . " Logged in as " . $_SESSION['name'] . "</a> | ";
    echo "<a href='logout.php'>Logout</a><br>";
    echo "</div><hr>";
}
?>
</div>
</header> 
<br>
<br>
<hr>
</body>
</html>