
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
  <li><a href="homepage.php">Home</a></li>
  <li><a href="stock.php">Stock Details</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a href="supplier.php">Suppliers</a></li>
<li><a class="active" href="employee.php">Employees</a></li>
<li><a href="salesReport.php">Sales Report</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>
<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div class="form-style-5" style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>
<form action="addacc.php" method="GET">
 CustomerName
  <input type="text" name="name" value="">
  <label>Accessory</label>
 <select name ="acc">
            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option  value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
 </select>
Quantity
<input type="text" name="quan" value="">



  

<br><br><input type="submit" name="submit" value="Add Item">
<a href="invoice.php"><button type="button" >Generate Invoice</button></a><br>


</form>
<?php

	if($_GET['submit']){
		$cus=$_GET['name'];
	$acc=$_GET['acc'];
	$quan=$_GET['quan'];

	
	
	$result = "SELECT tax,price FROM accessory WHERE accname='$acc' ";

	$a=mysqli_query($con,$result);
$value = mysqli_fetch_row($a);
$tax= $value[0];

$price=$value[1]*$quan;

mysqli_query($con,"insert into invoiceitem values ('','$cus','$acc','$quan','$tax','$price')");



}
	?>
  
</div>

</body>
</html>


















