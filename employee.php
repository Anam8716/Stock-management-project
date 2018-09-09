<style>
td{
	padding:10px;
}
</style>

<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 15%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: IndianRed  ;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>
<body style="background-image:url('http://biteinto.info/wp-content/uploads/2016/02/light-gray-wood-background-and-light-gray-backgrounds-light-grey-gradient-background-21.jpg')">
<ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a href="stock.php">Stock Details</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a href="supplier.php">Suppliers</a></li>
<li><a class="active" href="employee.php">Employees</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>
<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>
<?php
	


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
<th colspan="2">Operations</th>
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
		 <td><a href='updateemp.php?a=$result[EmployeeId]&b=$result[EmployeeName]&c=$result[EmployeeAddress]&d=$result[Telephone]&e=$result[AdhaarNo]&f=$result[HireDate]&g=$result[Skill]&h=$result[Salary]'>Edit</a></td>
		 <td><a href='deleteemp.php?a=$result[EmployeeId]&b=$result[EmployeeName]&c=$result[EmployeeAddress]&d=$result[Telephone]&e=$result[AdhaarNo]&f=$result[HireDate]&g=$result[Skill]&h=$result[Salary]'>Delete</a></td>
         </tr>";

}
}
else
{
	echo"No records found";
}
?>
</table>
	 <form action="register.php" method="post">
	 <a href="empregister.php"><button type="button" >Register New Employee</button></a><br>
	 	 

</form>

</div>

</body>
</html>
