<?php  
require_once 'controller/PrescriptionInfo.php';

$prescription = fetchPrescription($_GET['id']);

 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<table>


	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			 
		</tr>
	</thead>
	<tbody>
		<?php foreach ($medicines as $i => $medicine): ?>
			<tr>
				<td><a href="showPrescription.php"><?php echo $medicine['Name'] ?></a></td>
				<td><?php echo $medicine['Name'] ?></td>
				<td><?php echo $medicine['Price'] ?></td>
				<td><a href="modifyPrescription.php">Edit</a>&nbsp<a href="controller/deletePrescription.php" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td> 
			</tr>
		<?php endforeach; ?>
		

	</tbody>
</table>


</body>
</html>