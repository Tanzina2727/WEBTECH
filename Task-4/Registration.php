<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body style="border: 5px solid black;">  
<div>
	<?php
include 'files/header.php';
?>
	<br>
<?php
$nameErr = $emailErr = $genderErr = $dobErr = $userNameErr = $passErr = $confirmpassErr = "";
$username = $password = $name = $email = $dob = $gender = $confirmpass = "";
$message = '';
$error = '';
// NAME
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-.' ]*$/", $name)) {
            $nameErr = "Only letters white space, period & dash allowed";
            $name = "";
        } else if (str_word_count($name) < 2) {
            $nameErr = "At least two words needed";
            $name = "";
        }
    }
    //   EMAIL
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }
    //   DATE OF BIRTH
    if (empty($_POST["birthday"])) {
        $dobErr = "DOB is required";
    } else {
        $dob = test_input($_POST["birthday"]);
    }
    //   GENDER
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    //   USERNAME
    if (empty($_POST["username"])) {
        $userNameErr = "UserName is required";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-._]*$/", $username)) {
            $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
            $username = "";
        } else if (strlen($username) < 2) {
            $userNameErr = "At least two charecters needed";
            $username = "";
        }
    }
    //   PASSWORD
    if (empty($_POST["Password"])) {
        $passErr = "Password is required";
    } else {
        $password = test_input($_POST["Password"]);
        if (strlen($password) < 8) {
            $passErr = "Password must be 8 charecters";
            $password = "";
        } else if (!preg_match("/[a-zA-Z0-9]*@/", $password)) {
            $passErr = "Password must contain characters,number and @";
            $password = "";
        }
    }
    if (empty($_POST["confirmpass"])) {
        $confirmpassErr = "Retype The Current Password";
    } else {
        $confirmpass = test_input($_POST["confirmpass"]);
        if ($password != $confirmpass) {
            $confirmpassErr = "Password & Retyped Password Dosen't Match";
            $confirmpass = "";
        }
    }
    if (isset($_POST["submit"])) {
        if (file_exists('data.json')) {
            $current_data = file_get_contents('data.json');
            $array_data = json_decode($current_data, true);
            $extra = array('name' => $_POST['name'], 'email' => $_POST["email"], 'username' => $_POST["username"], 'password' => $_POST["confirmpass"], 'gender' => $_POST["gender"], 'dateOfBirth' => $_POST["birthday"]);
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('data.json', $final_data)) {
                $message = "<label>Data Recorded Successfully</p>";
                header("location:Login.php");
            }
        } else {
            $error = 'JSON File not exits';
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

 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <fieldset >
<legend>REGISTRATION:</legend>  
  Name: <input type="text" name="name">
  <span class="error"> <?php echo $nameErr; ?></span>
  <br><hr>
  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr; ?></span>
  <br><hr>
  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $userNameErr; ?></span>
  <br><hr>
  Password: <input type="Password" name="Password">
  <span class="error"> <?php echo $passErr; ?></span>
  <br><hr>
  Confirm Password: <input type="Password" name="confirmpass">
  <span class="error"> <?php echo $confirmpassErr; ?></span>
  <br><hr>
  <fieldset>
  <legend>Gender</legend>
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error"> <?php echo $genderErr; ?></span>
  </fieldset>
  <hr>
  <fieldset>
  <legend>Date Of Birth</legend>
  <input type="date" name="birthday">
  <span class="error"> <?php echo $dobErr; ?></span>
  <br></fieldset><hr>
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">  </fieldset>
</form>
<?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
<div><?php include 'files/footer.php'; ?></div>
</body>
</html>