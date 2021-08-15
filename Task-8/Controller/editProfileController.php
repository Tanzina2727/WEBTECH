<!DOCTYPE html>  
<html>  
<head>  
<title>Registration</title>
<style>
.error {color: #FF0000;}
</style>
</head>  
<body></body>
<html>
<?php
require_once '../model/model.php';

if (isset($_SESSION['name'])){}
else
{
    $name = $email = $gender = $dob = '';
}
    
$nameErr = $emailErr  = $genderErr = $dobErr = '';
$message = '';  
$error = '';
$flag=1;
$update="on"; 
if($_SERVER["REQUEST_METHOD"] == "POST")  
{

  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
    $flag=0;
    $update="off";
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "Only letters, white space, period, dash allowed and minimum two words";
      $name="";
      $flag=0;
      $update="off";
    }
  }

      
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
    $flag=0;
    $update="off";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
      $email="";    
      $flag=0;
      $update="off";
    }
  }
  

  if(empty($_POST["gender"]))  
  {  
    $genderErr = "Select Gender"; 
    $flag=0; 
    
  }
  else 
  {
    $gender = test_input($_POST["gender"]);
  } 

  if(empty($_POST["dob"]))  
  {  
    $dobErr = "Enter Date of Birth";
    $flag=0; 
    
  }
  else 
  {
    $dob = test_input($_POST["dob"]);
  }

  
    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} 
//if($flag == 1) {
  $data['name'] = $_POST["name"];
  $data['gender'] = $_POST["gender"];
  $data['dob'] = $_POST["birthday"];

  if (updateProfile($_POST["email"], $data)) {
    //header('Location: ../welcome.php');
    echo "Updated";
  }
  else {
  echo '<p>Error</p>';
  header('Location: ../editAdminProfile.php');
}
//}
?>

 
