
<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	error_reporting(0);
	$da=$_GET['name'];
	echo $da;
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
<body>

<ul>
  <li><a  href="homepage.php">Home</a></li>
  <li><a href="stock.php">Stock Details</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a href="supplier.php">Suppliers</a></li>
<li><a href="employee.php">Employees</a></li>
<li><a href="salesReport.php">Sales Report</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a class="active" href="sell.php">Sell</a></li>

<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>

  
 
	
	
	
	<table>
	<th>InvoiceId</th>
	<th>CustomerName</th>
	<th>AccessoryName</th>
	<th>Quantity</th>
	<th>Tax</th>
	<th>Price</th>
	<th>NetAmount</th>
	<th>Date</th>
	<?php
	echo"<tr><td> $id</td><td> $cus</td><td> $acc</td><td> $quan</td><td>$tax </td><td>$price </td><td>$netamt </td><td>$date</td></tr>"
	?>
	</table>
	<?php
	


	?>
</div>

</body>
</html>
