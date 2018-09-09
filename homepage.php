
<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: brown;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: darkred}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

</head>
<body style="background-image:url('http://czerwonaszpilka.pl/wp-content/uploads/2016/10/background-1.jpg')">

<div>
<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>

</div>
<div >


  <img src="https://i.ytimg.com/vi/UY5G3reiDcI/maxresdefault.jpg" style="height:500px;width:1000px;margin-left:200px">
</div>

<div>
<table>
<tr>
</tr><tr>
</tr><tr>
</tr><tr>
</tr><tr>
</tr><tr>
</tr>
<tr>
<td>	 <a href="stock.php"><button class="button" >Stock Details</button></a><br>
</td>
<td><a href="customer.php"><button class="button" >Manage Customers</button></a><br></td>

<td><a href="supplier.php"><button class="button" >Supplier Details</button></a><br></td>

<td><a href="employee.php"><button class="button" >Manage Employees</button></a><br></td>

<td><a href="placeorder.php"><button class="button" >Place Orders</button></a><br></td>
<td><a href="sell.php"><button class="button" >Start Billing</button></a><br></td>

<td><a href="khc.php"><button class="button" >Holding/setup cost</button></a><br></td>




</tr>
</table>
</div>



</body>
</html>
