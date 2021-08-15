<?php 
require 'model/model.php';

$id="";
$data=searchData($_POST['name']);
if($data!= null)
{
	$name = $data["Name"];
  	$password = $data["Password"];
  	$id = $data["Email"];
  }

?>