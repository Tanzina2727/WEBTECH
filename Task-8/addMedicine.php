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


        function checkPrice() {
        if (document.getElementById("price").value == "") {
          document.getElementById("priceErr").innerHTML = "Price can't be blank";
          document.getElementById("priceErr").style.color = "red";
          // document.getElementById("medicine").style.borderColor = "red";
      }
        else{
          document.getElementById("priceErr").innerHTML = "";
      //   document.getElementById("medicine").style.borderColor = "black";
    }
  }


        
      
</script> 
</head>

<body class="banner">
  <?php 
session_start();
require 'resources/header2.php';?>
  <div margin-left: 20px;">
  <div class="registration">
  <legend><B>Add Medicine</B></legend> <br>
  <form action="controller/AddMedicineCon.php" method="POST" enctype="multipart/form-data">
  <div style=" text-align: left;">

  <label for="name"> Medicine Name :</label> <br>
  <input type='text' name='name' id='name' onkeyup='checkName()' onblur='checkName()'>
  <span class="error"  id="nameErr"></span><hr>

  <label for="price"> Price :</label> <br>
  <input type="text" id="price" name="price" onkeyup="checkPrice()" onblur="checkPrice()">
  <span class="error"  id="priceErr"></span><br><hr>

  <input type="submit" name="addmedicine" value="Save"></div>

</form> 
</div>
</div>
<?php require 'resources/footer.php';?>  
</body>
</html>

