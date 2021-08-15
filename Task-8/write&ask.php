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
   
   
   <h2 style="border: 2px solid black; margin: auto; width:130px; background-color: rgb(82, 87, 93); color: white; padding: 12px 16px;">HELP BOX</h2> <br>
   <textarea name="ask" id="ask" cols="30" rows="10" style="margin-left: 40px; width:290px;">Write here...</textarea>
   <input type="submit" name="submit" value="Submit" style="margin-left: 40px; font-size: 15px;">
   <input type="reset" name="reset" value="Reset" style="font-size: 15px;">
 
</form> 
</div>
</div>
<?php require 'resources/footer.php';?>  
</body>
</html>

