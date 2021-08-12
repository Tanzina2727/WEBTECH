
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
			<th>User_id</th>
			<th>Name</th>
			<th>Age</th>
			<th>Medicine</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $user): ?>
			<tr>
				<td><a href="../showPrescription.php?id=<?php echo $user['ID'] ?>"><?php echo $user['ID'] ?></a></td>
				<td><?php echo $user['Name'] ?></td>
				<td><?php echo $user['Age'] ?></td>
				<td><?php echo $user['Medicine'] ?></td>
				<td><a href="../editPrescription.php?id=<?php echo $user['ID'] ?>">Edit</a>&nbsp<a href="deletePrescription.php?id=<?php echo $user['ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>