<?php 

require_once ('model/model.php');

function fetchAllPrescription(){
	return showAllPrescription();

}
function fetchPrescription($id){
	return showPrescription($id);

}
