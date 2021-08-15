
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="style.css">
    <script>  
    function validateform(){ }
    function checkName() {
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = "Name can't be blank";
          document.getElementById("nameErr").style.color = "red";
      }
      else{
           document.getElementById("nameErr").innerHTML = "";
      //   document.getElementById("name").style.borderColor = "black";
       }
      }

   function checkamount() {
         if (document.getElementById("quantity").value == "") {
           document.getElementById("quantityErr").innerHTML = "uantity can't be blank";
           document.getElementById("quantityErr").style.color = "red";
           // document.getElementById("medicine").style.borderColor = "red";
       }
         else{
           document.getElementById("quantityErr").innerHTML = "";
       //   document.getElementById("medicine").style.borderColor = "black";
     }
   }


        
      
</script> 
</head>
  <body class="banner">
  <?php 
session_start();
require 'resources/header2.php';
?>
  <div class="div">
  <div class="registration">
  
  
  <form method="post" style=" text-align: left; ">

  <label for="user_name"> Name :</label> <br>
  <input type='text' name='name' id='name' onkeyup='checkName()' onblur='checkName()'>
  <span class="error"  id="nameErr"></span><hr>

  <input type="submit" name="order" value="Search">
  </form>
  

  <?php
  $price = "";
  if($_SERVER["REQUEST_METHOD"] == "POST") {
require 'Controller/findUser.php';
   foreach ($allSearchedProduct as $i => $product):
      echo "<br><p> ".$product['MedicineName']." ". $product['Price'] ." </p> <br> ";
      $price = $product['Price'];
    endforeach;
      
     echo "<div><form method='post' action='payment.php?price=".$price."'>
  <div style=' text-align: left;'>

  <label for='user_name'> Amount :</label> <br>
  <input type='text' name='quantity' id='quantity' onkeyup='checkAmount()' onblur='checkAmount()'>
  <span class='error'  id='quantityErr'></span><hr>

  <input type='submit' name='order' value='Next'>
  </form> <br> </div>";
}
     ?>
  </div>
</div>
</div>

<?php require 'resources/footer.php';?> 
 
  </body>
</html>