<?php

require_once 'model/model.php';

if (isset($_POST['order'])) {
	
		

    try {
    	
    	$allSearchedProduct = searchUser($_POST['name']);
    	//require_once '../placeOrder.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

