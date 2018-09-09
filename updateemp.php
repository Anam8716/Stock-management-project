<?php
	session_start();
	include("dbconfig/config.php");
	//phpinfo();
	error_reporting(0);
$_GET['a'];
$_GET['b'];
$_GET['c'];
$_GET['d'];
$_GET['e'];
$_GET['f'];
$_GET['g'];
$_GET['h'];
?>




?>
<!DOCTYPE html>
<html>
<head>
<style>
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
  <li><a href="homepage.php">Home</a></li>
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
<form action="updateemp.php" method="GET">
  Employee id<br>
  <input type="text" name="id" value="<?php echo $_GET['a'];?> " >
  <br> Employee Name:<br>
  <input type="text" name="empname" value="<?php echo $_GET['b'];?> "><br>
  Employee Address:<br>
  <input type="text" name="address"value="<?php echo $_GET['c'];?> ">
  
  <br>Employee Telephone :<br>
  <input type="text" name="tel" value="<?php echo $_GET['d'];?> ">
<br>Employee AdhaarNo:<br>
  <input type="text" name="adhaar" value="<?php echo $_GET['e'];?> ">
  <br>Hire Date:<br>
  <input type="date" name="hiredate"value="<?php echo $_GET['f'];?> ">

<br>Skill  :<br>
  <input type="text" name="skill" value="<?php echo $_GET['g'];?> ">

<br>Salary :<br>
  <input type="text" name="salary" value="<?php echo $_GET['h'];?> ">

<br><br><input type="submit" name="submit" value="Update">
<a href="employee.php"><button type="button" ><< Go Back </button></a><br>
</form>



<?php
if($_GET['submit']){
	$id=$_GET['id'];$en=$_GET['empname'];$add=$_GET['address'];$tel=$_GET['tel'];$ad=$_GET['adhaar'];$hd=$_GET['hiredate'];$sk=$_GET['skill'];$sal=$_GET['salary'];
	$query="UPDATE Employee SET EmployeeName='$en',EmployeeAddress='$add',Telephone='$tel',AdhaarNo='$ad',HireDate='$hd',Skill='$sk',Salary='$sal' WHERE EmployeeId='$id' ";
	$data=mysqli_query($con,$query);
	if($data){
		echo "Updated";
		
	}
	else{
		echo "Not updated";
	}
}
else{
	echo "";
	
}
	
	
?>
</div>
</body>
</html>