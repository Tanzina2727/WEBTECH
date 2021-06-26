<?php
session_start();
$username = "";
$password = "";
$data = file_get_contents("data.json");
$data = json_decode($data, true);
foreach ($data as $row) {
    $username = $row['username'];
    $password = $row['password'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["remember"])) {
        setcookie("username", $_POST["uname"], time() + 10);
        setcookie("password", $_POST["pass"], time() + 10);
        echo "Cookies Set Successfuly <br>";
    } else if (empty($_POST["remember"])) {
        // setcookie("username","");
        // setcookie("password","");
        setcookie("username", "", time() - 3600);
        setcookie("password", "", time() - 3600);
    }
    if ($_POST['uname'] == $username && $_POST['pass'] == $password) {
        $_SESSION['uname'] = $username;
        header("location:DasboardLogin.php");
    } else {
        $msg = "username or password invalid";
        //echo "<script>alert('uname or pass incorrect!')</script>";
        
    }
}
?>


 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 <fieldset>
<legend> <B>LOGIN</B> </legend>

 Username: <input name="uname" type="text" value="<?php if (isset($_COOKIE['username'])) {
    echo $_COOKIE['username'];
} ?>"> <br> <br>
	
		 Password: <input name="pass" type="password" value="<?php if (isset($_COOKIE['password'])) {
    echo $_COOKIE['password'];
} ?>"> <br> <br>

   <input type="checkbox" name="remember"> Remember me <br>

   <input type="submit" value="Login">
   </fieldset>

 </form>
