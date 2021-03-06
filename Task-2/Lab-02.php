<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$i=0;
$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bgErr = "";
$name = $email = $dob = $gender = $bgroup = "";
$degree = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $name ="";
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words required";
      $name ="";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email ="";
    }
  }

  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } 
  else {
    foreach ($_POST["degree"] as $key) {
      array_push($degree, $key);
    }
    if(count($degree)<2){
    $degreeErr = "At least two degrees must be selected";
  }
  }

  if (empty($_POST["bgroup"])) {
    $bgErr = "Blood Group is required";
  } else {
    $bgroup = test_input($_POST["bgroup"]);
    $bgErr = "";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date Of Birth:
  <input type="date" name="dob">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:
  <input type="checkbox" name="degree[]" value="SSC">SSC
  <input type="checkbox" name="degree[]" value="HSC">HSC
  <input type="checkbox" name="degree[]" value="BSc">BSc
  <input type="checkbox" name="degree[]" value="MSc">MSc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
  Blood Group:
  <select name="bgroup">
  <option name="bgroup" value=""></option>
  <option name="bgroup" value="A+">A+</option>
  <option name="bgroup" value="A-">A-</option>
  <option name="bgroup" value="B+">B+</option>
  <option name="bgroup" value="B-">B-</option>
  <option name="bgroup" value="O+">O+</option>
  <option name="bgroup" value="AB+">AB+</option>
  <option name="bgroup" value="AB+">AB-</option>
  </select>
  <span class="error">* <?php echo $bgErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
$arrlength = count($degree);
for($x = 0; $x < $arrlength; $x++) {
  echo $degree[$x];
  echo "<br>";
}
echo $bgroup;
?>

</body>
</html>