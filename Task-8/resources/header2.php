<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href='https://css.gg/log-out.css' rel='stylesheet'>
</head>

<body>

<h1 style="color:black; background-color: darkgrey; "><img src="resources/logo.png" width="150" height="150">Urgent E-Pharma System </h1>	
<br><br>
<div class="right">
	<h2><b><?php echo "Logged in as Buyer- ".$_SESSION['name'].""; ?></b><h2>
</div>

<span>
<div class="vertical-menu">
 <h2><b>Dashboard</b></a></h2>
 <a href="Welcome.php"><i class="fa fa-fw fa-home"></i> Home</a>
 <a href="viewProfile.php"><i class='far fa-user-circle'></i> View Profile</a>
 <a href="changeProfile.php"><i class="fas fa-user-edit"></i> Edit Profile</a>
 <!-- <a href="Change Profile Picture.php"><i class='fas fa-file-image'></i> Change Profile Picture</a> -->
 <!-- <a href="Change Password.php"><i class="fa fa-key icon"></i> Change Password</a> -->
 <a href="placeOrder.php"><i class="fas fa-comment-dollar"></i> Place Order</a>
 <!-- <a href="changePass.php"><i class="fa fa-key icon"></i> Change Password</a> -->
 <a href="addprescription.php"><i class="fas fa-notes-medical"></i> Add Prescription</a>
 <a href="showAllPrescription.php"><i class="far fa-folder"></i> Show All Prescription</a>
 <a href="write&ask.php"><i class="fa fa-question-circle"></i> Ask for help</a>
 <a href="Logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
</div>
 </span>
<br>


</body>
</html>