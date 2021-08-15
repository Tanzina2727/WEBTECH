<?php  
require_once 'controller/prescriptionInfo.php';

$prescriptions = fetchAllPrescription();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body style="background-color: whitesmoke; margin: 200px;">
	<div class="banner">
<table class="registration">
	<thead>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Medicine</th>
			 
		</tr>
	</thead>
	<tbody>
		<?php foreach ($prescriptions as $i => $prescription): ?>
			<tr>
				<td><a href="showPrescription.php?id=<?php echo $prescription['ID'] ?>"><?php echo $prescription['Name'] ?></a></td>
				<td><?php echo $prescription['Age'] ?></td>
				<td><?php echo $prescription['Medicine'] ?></td>
				<td><a href="modifyPrescription.php?id=<?php echo $prescription['ID'] ?>">Edit</a>&nbsp<a href="controller/deletePrescription.php?id=<?php echo $prescription['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td> 
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</div>

</body>
</html>