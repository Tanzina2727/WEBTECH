<?php  
require_once '../model/model.php';


if (isset($_POST['view'])) {
	$data['name'] = $_POST["name"];
  $data['gender'] = $_POST["gender"];
  $data['dob'] = $_POST["birthday"];

  if (showUser($_POST["email"], $data)) {
    header('Location: ../viewProfile.php');
    //echo "Updated";
  }
  else {
  echo '<p>Error</p>';
  // header('Location: ../editAdminProfile.php');
}
	 
} 

  // if (showData($_POST['id'], $data)) {
  // 	//echo 'Successfully updated!!';
  	 
  // 	// header('Location: ../showPrescription.php?id=' . $_POST["id"]);
  // }
// else {
// 	echo 'You are not allowed to access this page.';
// }


?>