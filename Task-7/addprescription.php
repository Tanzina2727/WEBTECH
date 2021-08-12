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
  <form>
   
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
</fieldset>
</form> 
</div>
</div>
<?php require 'resources/footer.php';?>  
</body>
</html>

