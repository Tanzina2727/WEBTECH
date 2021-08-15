<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="banner">

<?php 
session_start();
require 'resources/header2.php';?>
   
   <div style="margin-top: -300px; margin-left: 20px;">

  <div class="registration">
  	<h3>Total Quantity: <?php echo $_POST['quantity'] ?></h3>
  	<h3>Total Amount: <?php $total = floatval($_POST['quantity']) * floatval($_GET['price']); echo $total; ?></h3>
  <form>
   
   
   <h2 style="border: 2px solid black; margin: auto; width:280px; background-color: rgb(82, 87, 93); color: white; padding: 12px 16px;">Choose Payment Method</h2> <br>
  <button class="choosebutton" style="border: 2px solid black;"> </i>Bkash</a></button><br><br>
  <button class="choosebutton" style="border: 2px solid black"> </i>Rocket</a></button><br><br>
  <button class="choosebutton" style="border: 2px solid black"> </i>COD</a></button>
   
 
</form> 
</div>
</div>
<?php require 'resources/footer.php';?>  
</body>
</html>

