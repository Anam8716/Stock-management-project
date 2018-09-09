<?php
	session_start();
	require_once('dbconfig/config.php');
	


$query="Select * from Employee";
	$data=mysqli_query($con,$query);
	$total=mysqli_num_rows($data);
if($total !=0)
{
     ?>

<table>
<tr>

<th>Employee Id</th>
<th>Name</th>
<th>Address</th>
<th>Telephone</th>
<th>Adhaar No.</th>
<th>Hiredate</th>
<th>Skill</th>
<th>Salary</th>
</tr>

<?php

while($result=mysqli_fetch_assoc($data))
{
	echo"<tr>
	     <td>".$result['EmployeeId']."</td>
		 <td>".$result['EmployeeName']."</td>
		 <td>".$result['EmployeeAddress']."</td>
		 <td>".$result['Telephone']."</td>
		 <td>".$result['AdhaarNo']."</td>
		 <td>".$result['HireDate']."</td>
		 <td>".$result['Skill']."</td>
		 <td>".$result['Salary']."</td>
         </tr>";

}
}
else
{
	echo"No records found";
}
?>
</table>



