<?php  
require_once '../model/model.php';


if (isset($_POST['updateprescription'])) {
	$data['name'] = $_POST['name'];
	$data['age'] = $_POST['age'];
	$data['medicine'] = $_POST['medicine'];
	 


  if (updatePrescription($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	 
  	// header('Location: ../showPrescription.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>