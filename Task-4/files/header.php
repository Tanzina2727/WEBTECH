<header>
<h1> <img src="files/logo.png" width="100" height="100"> COMPANY</h1>

<?php
if (empty($_SESSION['uname'])) {
    echo "<div style='float: right';><a href='public_home.php'>Home</a> |";
    echo "<a href='login.php'>Login</a> |";
    echo "<a href='registration.php'>Registration</a> </div><br><br><hr>";
} else {
    echo "<div style='float: right';>" . " Logged in as " . $_SESSION['uname'] . "</a> | ";
    echo "<a href='logout.php'>Logout</a><br>";
    echo "</div><br><br><br><br><hr>";
}
?>
	
</header>