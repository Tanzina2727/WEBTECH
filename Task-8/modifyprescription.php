<!DOCTYPE html>
<html>
<head>
	<title></title>
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

        function checkAge(){
          if (document.getElementById("age").value == "") {
          document.getElementById("ageErr").innerHTML = "age can't be blank";
          document.getElementById("ageErr").style.color = "red";
          // document.getElementById("age").style.borderColor = "red";
      }else if(document.getElementById("age").value < 10){
          document.getElementById("ageErr").style.color = "red";
        document.getElementById("ageErr").innerHTML = "age is less than 10";
      } 
      else{
           document.getElementById("ageErr").innerHTML = "";
      //   document.getElementById("name").style.borderColor = "black";
       }
    
        }

        function checkMedicine() {
      if (document.getElementById("medicine").value == "") {
          document.getElementById("medicineErr").innerHTML = "Medicine can't be blank";
          document.getElementById("medicineErr").style.color = "red";
          // document.getElementById("medicine").style.borderColor = "red";
      }
      else{
          document.getElementById("medicineErr").innerHTML = "";
      //   document.getElementById("medicine").style.borderColor = "black";
       }
      
        }
      </script>
</head>
<body class="banner">
<?php 
session_start();
require 'resources/header2.php';?>
  <div class="div">
    
  <div class="registration">
  <legend><B>Add Prescription</B></legend> <br>
  <form action="controller/EditPresCon.php" method="POST" enctype="multipart/form-data">
  <div style=" text-align: left;">

  <label for="name"> Name :</label> <br>
  <input type='text' name='name' id='name' onkeyup='checkName()' onblur='checkName()'>
  <span class="error"  id="nameErr"></span><hr>

  <label for="age"> Age :</label> <br>
  <input type="number" id="age" name="age" onkeyup="checkAge()" onblur="checkAge()">
  <span class="error"  id="ageErr"></span><br><hr>

  <label for="medicine"> Medicine List :</label> <br>
  <input type="text" id="medicine" name="medicine" onkeyup="checkMedicine()" onblur="checkMedicine()">
  <span class="error"  id="medicineErr"></span><hr>
     
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <input type="submit" name = "updateprescription" value="Update">
    <input type="reset"></div>
  </form>
  </fieldset>
  </form> 
  </div>
</div>
<?php 
 require 'resources/footer.php';
?>  

</body>
</html>

