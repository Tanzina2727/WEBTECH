<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="style.css">
</head>
<body class= "banner">
    <body class = "navbar">

<?php
session_start();
if (isset($_SESSION['name']))
{require 'resources/header2.php';}
else{require 'resources/header.php';}
 ?>
 
<h1 style="text-align: center;color:red; margin-top: -250px;">Welcome to our Company</h1> 
<h3 style="text-align: center; color:blue; " >Ready to serve you immedietly</h3><br><br><br><br><br><br><br><br>
<?php require 'resources/footer.php';?>

</body>
</html>