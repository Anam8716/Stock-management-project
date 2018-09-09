<?php
	session_start();
	include("dbconfig/config.php");
		error_reporting(0);

	//phpinfo();
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
<body>

<ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a href="stock.php">Stock Details</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a  href="supplier.php">Suppliers</a></li>
<li><a href="employee.php">Employees</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>
<li><a class="active"href="khc.php">Change holding/setup cost</a></li>
<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>

<form action="khcregister.php" method="GET">
Id<input type="text" name="id" value=""/>

HoldingCost<input type="text" name="cusid" value=""/>
SetupCost<input type="text" name="cusname" value=""/>

<input type="submit" name="submit" value="submit"/>



</form>

<?php

if($_GET['submit'])
{
		$id0=$_GET['id'];

	$id=$_GET['cusid'];
	$sn=$_GET['cusname'];
	
	if($id!=""&&$sn!=""&&$id0!="")
	{
	$query="INSERT INTO khc VALUES ('$id0','$id','$sn')";
    $data=mysqli_query($con,$query);
    if($data)
    {
	echo "Data entered into database";
    }	
	}
	else
	{
		echo "All fields are required";
	}
}






?>
<form action="register.php" method="post">
	 <a href="khc.php"><button type="button" ><<Back</button></a><br>

</table>

</div>

</body>
</html>
