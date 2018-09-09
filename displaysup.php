<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	
	$query="SELECT * FROM Supplier";
	$data=mysqli_query($con,$query);
	$total=mysqli_num_rows($data);
	
	if($total!=0)
	{
		?>
		
		<table>
		<tr>
		<th>SupplierId</th>
		<th>SupplierName</th>
		<th colspan='2'>Operations</th>
		</tr>
		<?php
		while($result=mysqli_fetch_assoc($data))
		{
			echo "<tr>
			<td>". $result['SupplierId']."</td>
			<td>". $result['SupplierName']."</td>
			<td><a href='updatesup.php?id=$result[SupplierId]&sn=$result[SupplierName]'>Edit</a></td>
			<td><a href='deletesup.php?id=$result[SupplierId]&sn=$result[SupplierName]'>Delete</a></td>
			</tr>";
		}
		
		
	}
	else
	{
		echo "No record found";
	}
?>
</table>
