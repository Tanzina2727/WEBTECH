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
//if (isset($_SESSION['name'])){}
//else
//{
    $name = $email =  $password = $confirm_password = $gender = $dob = $encrypted_password = '';
//}
    
$nameErr = $emailErr  = $passwordErr = $confirm_passwordErr = $genderErr = $dobErr = '';
$message = '';  
$error = '';
$flag=1;
$update=""; 
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
  
  if (empty($_POST["password"])) 
  {
    $passwordErr = "Password is required";
    $flag=0;
   
  } 
  else 
  {
    $password = test_input($_POST["password"]);
    if (strlen($password) <= 2)
    {
      $passwordErr = "Must be atleast 8 characters";
      $password="";
      $flag=0;
      
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) 
    {
      $passwordErr = "Password must contain at least one of the special character (@, #, $,%)";
      $password ="";
      $flag=0;
      
    }
  }

  if (empty($_POST["confirm_password"])) 
  {
    $confirm_passwordErr = "Password is required";
    $flag=0;
    
  } 
  else 
  {
    $confirm_password = test_input($_POST["confirm_password"]);
    if($confirm_password!=$password)
    {
      $confirm_passwordErr = "Password doesn't match";
      $confirm_password="";
      $flag=0;
     
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
if($flag==0){
    $args = array(
    'nameErr' => $nameErr,
    'emailErr' => $emailErr,
    'passErr' => $passErr,
    'confirmpassErr' => $confirmpassErr,
    'genderErr' => $genderErr,
    'dobErr' => $dobErr
);
      header("location:../registration.php?" . http_build_query($args));
   }
  if ($flag==1) 
  {
    // if(isset($_POST["submit"]))  
    // {
    //   $encrypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 10]);
    //     if(addData($encrypted_password))
    //     {
    //       $message= 'Registration Completed';
    //       //header("location:../Login.php?msg=Registration Completed");
          
    //     }
        
    // }
    if(isset($_POST['submit'])) {
  $data['name'] = $_POST["name"];
  $data['email'] =$_POST["email"];
  $data['password'] =$_POST["confirm_password"];
  $data['gender'] = $_POST["gender"];
  $data['dateofbirth'] = $_POST["dob"];
  if (addData($data)) {
    echo '<p>User Successfully added!!</p><br>';
    header("location:../Login.php?msg=Registration Completed");
  }
  else{
        $dberror = '<br><label>Data Not stored in database<br>';
           header("location:../registration.php?dbmsg=" . $dberror);  
  }
}  
  }
  if($update=="on")
  {
    if(isset($_POST["submit"]) && isset($_SESSION['name']))
    {
      $data['name'] = $_POST['name'];
      $data['email'] = $_POST['email'];
      if (updateData($_SESSION['id'], $data)) 
      {
        //echo 'Successfully Updated';
      }
    }
  }       
} 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} 
?>

 
