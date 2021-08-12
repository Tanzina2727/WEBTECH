<?php 

require_once '../model/model.php';

if (deletePrescription($_GET['id'])) {
    header('Location: ../showAllPrescription.php');
}

 ?>