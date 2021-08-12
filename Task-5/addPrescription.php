<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
   

 <form action="controller/AddPresController.php" method="POST" enctype="multipart/form-data">
   
  <fieldset>
  <legend style="float: left;"><B>Add Prescription</B></legend> <br>
  <div style="float: left; text-align: right;">  
  Name: <input type="text" name="name">
  <br><hr>
  Age: <input type="text" name="age">
  <br><hr>
  Medicine List: <input type="text" name="medicine">
  <br><hr>
  <input type="checkbox" name="display" value="Yes">
  <label for="display">Display</label>
  <input type="submit" name="submit" value="Save"></div>
</form>
</fieldset>
</form> 

</body>
</html>

