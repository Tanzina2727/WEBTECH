<?php 

require_once 'db_connect.php';


function showAllPrescription(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `prescription_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showPrescription($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `prescription_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `prescription_info` WHERE Name LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addPrescription($data){
	$conn = db_conn();
    $selectQuery = "INSERT into prescription_info (Name, Age, Medicine)
VALUES (:name, :age, :medicine)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':age' => $data['age'],
        	':medicine' => $data['medicine'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updatePrescription($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE prescription_info set Name = ?, Age = ?, Medicine = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['age'], $data['medicine'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deletePrescription($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `prescription_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}