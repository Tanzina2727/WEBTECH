<?php  
require_once '../model/model.php';


if (isset($_POST['addmedicine'])) {
	$data['name'] = $_POST['name'];
	$data['price'] = $_POST['price'];
	 

// 	$target_dir = "../uploads/";
// 	$target_file = $target_dir . basename($_FILES["image"]["name"]);

// 	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }

  if (addMedicine($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>