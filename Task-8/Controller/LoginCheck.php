<?php
require 'model/model.php';    
$nameErr = $passwordErr =  "";
$name = $password = $id= "";
if (isset($_POST['name']) && isset($_POST['password'])) 
{
$data=searchData($_POST['name']);
if($data!= null)
{
  $name = $data["Name"];
    $password = $data["Password"];
    $id = $data["Email"];
  }
  echo $name;
  //require 'Controller/CheckLoginData.php';
  if ($_POST['name']==$name && (password_verify($_POST['password'], $password)||$_POST['password']==$password))
  {
    $_SESSION['name'] = $name;

   $_SESSION['id'] = $id;
    if(isset($_POST['remember_me']))
    {
    $time = time();
    setcookie('name', $_POST['name'], $time+500);
    setcookie('password', $_POST['password'], $time+500);
  
    }
    header("location:Welcome.php");
  }
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name))
    {
      $nameErr = "Only letters, white space, period, dash allowed";
      $name="";
    }
    else if (str_word_count($name)<2 ) 
    {
      $nameErr = "Minimum two words";
      $name="";
    } 
    else if($_POST['name']!=$name) 
    {
      $nameErr = "name Invalid "; 
      $name="";
    }
  }
 
  if (empty($_POST["password"])) 
  {
    $passwordErr = "Password is required";
  } 
  else 
  {
    $password = test_input($_POST["password"]);
    if (strlen($password) <= 2)
    {
      $passwordErr = "Must be atleast 8 characters";
      $password="";
    }
    else if (!preg_match("/[!,@,#,$,%,^,&]/",$password)) 
    {
      $passwordErr = "Password must contain at least one of the special character (!,@,#,$,%,^,&)";
      $password ="";
    } 
    else if($_POST['password']!=$password) 
    {
      $passwordErr = "password Invalid "; 
      $password ="";
    }
  }
}
 
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>