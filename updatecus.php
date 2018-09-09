<?php
	session_start();
	include("dbconfig/config.php");
	//phpinfo();
	
	error_reporting(0);
	 $_GET['id'];
	 $_GET['sn'];
	 $_GET['ad'];
	 $_GET['cn'];
	
	
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
  <li><a  href="homepage.php">Home</a></li>
  <li><a href="stock.php">Stock Details</a></li>
  <li><a class="active"href="customer.php">Customers</a></li>
  <li><a  href="supplier.php">Suppliers</a></li>
<li><a href="employee.php">Employees</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>
<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>

<html>
<head>
<body>

<form action="updatecus.php" method="GET">

CustomerId<input type="text" name="cusid" value="<?php echo $_GET['id']; ?>"/>
CustomerName<input type="text" name="cusname" value="<?php echo $_GET['sn']; ?>"/>
Address<input type="text" name="add" value="<?php echo $_GET['ad']; ?>"/>
Contact No.<input type="text" name="cno" value="<?php echo $_GET['cn']; ?>"/>

<input type="submit" name="submit" value="Update"/>



</form>

<?php

if($_GET['submit'])
{
	$id1=$_GET['cusid'];
	$sn1=$_GET['cusname'];
	$ad1=$_GET['add'];
	$cn1=$_GET['cno'];
	$query="UPDATE Customer SET CUSTOMERNAME='$sn1', ADDRESS='$ad1' ,CONTACTNO='$cn1' WHERE  CUSTOMERID='$id1'";
	$data=mysqli_query($con,$query);
	if($data)
	{
		echo "Updated";
	}
	else
	{
		echo "Not updated";
		
	}
	
}
else
{
	echo "Click on update button";
}






?>


</div>

</body>
</html>
