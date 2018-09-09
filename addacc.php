
<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	error_reporting(0);
	
$query = "SELECT * FROM `accessory`";
	$result1 = mysqli_query($con, $query);


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
<li><a href="employee.php">Employees</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a class="active" href="sell.php">Sell</a></li>

<form action="index.php" method="get">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>
<form action="addacc.php" method="GET">
 CustomerName
  <input type="text" name="name" value="<?php echo $_GET['name']?>">
  <label>Accessory</label>
 <select name ="acc">
            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option  value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
 </select>
Quantity
<input type="text" name="quan" value="">



  

<br><br><input type="submit" name="submit" value="Add Item">
<br><br><input type="submit" name="gen" value="Generate Invoice">


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
else if($_GET['gen']){
	$query="SELECT * FROM invoiceitem where custname='$_GET[name]'";
	$data=mysqli_query($con,$query);
	$sum=0;
	
	
		?>
		
		<table>
		<tr>
		<th>AccName</th>
		<th>Quantity</th>
		<th>Tax</th>
		<th>Price</th>
		
		</tr>
		<?php
		while($result=mysqli_fetch_assoc($data))
		{
			$sum=$sum + $result['price'];
			echo "<tr>
			<td>". $result['accname']."</td>
			<td>". $result['quantity']."</td>
			<td>". $result['tax']."</td>
			<td>". $result['price']."</td>

			</tr>";
        }
}
?></table>
<table >

<tr><td style="background-color:indianred;color:white">
<?php
       $discount=(2*$sum)/100;
       echo "Total amount:$sum"."<br/>";
	  
	   echo "2% discount: $discount"."<br/>";
	   $net=$sum-$discount;
	   echo "Net amount: $net"."<br/>";

   ?>
   </td></tr>
   </table>

</div>

</body>
</html>
