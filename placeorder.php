
<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	error_reporting(0);
	

	

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
<li><a  class="active" href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>

<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>
<table>
<th>AccessoryName</th>
<th>NextOrderDate</th>
<?php
$getinfo = "select 
                   accname,nextorder from accessory ";
             



date_default_timezone_set('Asia/Kolkata');
$today = time();

if ($result = mysqli_query($con,$getinfo)) {    
     while ($row = mysqli_fetch_object($result)) {
        $a = $row->nextorder;
		$b=$row->accname;
		$from = strtotime($a);
		
		$difference = $from-$today ;
        $s= floor($difference / 86400);  // (60 * 60 * 24)
		if($s<=5)
		{
			echo"<tr><td> $b</td><td>$a</td></tr>";
			
		}
		
		
	
		
		
		
        
    }
    $result->close();
}
else
{
   echo'something went wrong.';
}

?>
</table>

</div>

</body>
</html>
