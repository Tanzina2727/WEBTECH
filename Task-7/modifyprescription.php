<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="banner">
<?php 
session_start();
require 'resources/header2.php';?>
  <div style="margin-top: -300px; margin-left: 20px;"> 
    
    <div class="registration">
   <form>
   <fieldset>
    <legend><B>Edit Prescription</B></legend> <br>
    <div style="float: left; text-align: right;">  
    Name: <input type="text" name="name">
    <br><hr>
    Age: <input type="text" name="age">
    <br><hr>
    Medicine List: <input type="text" name="medicine">
    <br><hr>
    <input type="checkbox" name="display" value="Yes">
    <label for="display">Display</label>
    <br><hr>  
     
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

