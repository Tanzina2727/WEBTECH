<?php 

require_once 'controller/PrescriptionInfo.php';
$Prescription = fetchPrescription($_GET['id']);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/EditPresCon.php" method="POST" enctype="multipart/form-data">
   
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
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateprescription" value="Update">
  <input type="reset"></div>
</form>
</fieldset>
</form> 

</body>
</html>

