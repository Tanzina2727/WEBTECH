<?php 
require 'model/model.php';
$data=searchData($_POST['name']);
if($data!= null)
{
	$name = $data["Name"];
  	$password = $data["Password"];
  	$id = $data["ID"];
}
?>