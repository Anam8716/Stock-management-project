
<?php
	session_start();
	include("dbconfig/config.php");
	error_reporting(0);
	//phpinfo();
	$query = "SELECT * FROM `supplier`";
	$result1 = mysqli_query($con, $query);
	$result = "SELECT holdingcost,setupcost FROM khc WHERE id='1' ";

	$a=mysqli_query($con,$result);
$value = mysqli_fetch_row($a);
$x= $value[0];

$y=$value[1]
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">

.form-style-5{
    max-width: 100%;
    padding: 10px 20px;
    background: white;


    padding: 20px;
    background: #f1f1f1;
    
    font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{

    border: none;
}
.form-style-5 legend {
    font-size: 1.4em;
    margin-bottom: 10px;
}
.form-style-5 label {
    display: block;
    margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
    font-family: Georgia, "Times New Roman", Times, serif;
    background: rgba(255,255,255,.1);
    border: none;
    border-radius: 4px;
    font-size: 16px;
    margin: 0;
    outline: 0;
    padding: 7px;
    width: 100%;
    box-sizing: border-box; 
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box; 
    background-color: #e8eeef;
    color:#8a97a0;
    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
    margin-bottom: 30px;
    
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
    background: #d2d9dd;
}
.form-style-5 select{
    -webkit-appearance: menulist-button;
    height:35px;
}
.form-style-5 .number {
    background: #1abc9c;
    color: #fff;
    height: 30px;
    width: 30px;
    display: inline-block;
    font-size: 0.8em;
    margin-right: 4px;
    line-height: 30px;
    text-align: center;
    text-shadow: 0 1px 0 rgba(255,255,255,0.2);
    border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
    position: relative;
    display: block;
    padding: 19px 39px 18px 39px;
    color: #FFF;
    margin: 0 auto;
    background: indianred;
    font-size: 18px;
    text-align: center;
    font-style: normal;
    width: 100%;
    border: 1px solid #16a085;
    border-width: 1px 1px 3px;
    margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
    background: #109177;
}
</style>
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
  <li><a class="active" href="stock.php">Stock Details</a></li>
  <li><a href="customer.php">Customers</a></li>
  <li><a href="supplier.php">Suppliers</a></li>
<li><a  href="employee.php">Employees</a></li>
<li><a href="placeorder.php">Place Order</a></li>
<li><a href="sell.php">Sell</a></li>
<form action="index.php" method="post">
			<button  style=" margin-left:10px;margin-top:10px;background-color:IndianRed;color:white";type="submit">Log Out</button>
</form>
</ul>

<div class="form-style-5" style="margin-left:15%;padding:1px 16px;height:1000px;">

<center><h1 style="font-size:300%;color:IndianRed">Welcome <?php echo $_SESSION['username']; ?></h1></center>
<form action="accregister.php" method="GET">
  
  <br> AccName<br>
  <input type="text" name="accname"><br>
  <label>SupplierName</label>
 <select name ="name">
            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option  value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
 </select>
  
  <br>DemandPerMonth<br>
  <input type="text" name="dpm" value="">
<br>Tax<br>
  <input type="text" name="tx" value="">
  <br>Quantity<br>
  <input type="text" name="q" value="">
  <br>ArrivalDate<br>
  <input type="date" name="ad" value="">
  
  <br>Price<br>
  <input type="text" name="pc" value="">



<br><br><input type="submit" name="submit" value="Submit">
<a href="stock.php"><button type="button" ><< Go Back </button></a><br>
</form>

</div>
<?php

if($_GET['submit']){
	$emp=$_GET['accname'];
	$add=$_GET['name'];
	$te=$_GET['dpm'];
	$an=$_GET['tx'];
	$q1=$_GET['q'];
	$ad1=$_GET['ad'];
	$hd=$_GET['pc'];
	$tw=2;
	$mul=($tw*$y)/($te*$x);
	$calc=sqrt($mul);
	$calc1=$calc*30;
	$fin=round($calc1);//days
	
$date = str_replace('/', '-', $ad1);
$f= date('Y-m-d', strtotime($date));

$data=date_create($ad1);//arrival date
date_add($data,date_interval_create_from_date_string("$fin days"));
$a= date_format($data,"Y-m-d");

$quantity=sqrt(($tw*$te*$y)/$x);
	
	
	
	
	if($emp!="" &&$add!="" &&$te!="" &&$an!="" &&$q1!=""&&$ad1!=""&&$hd!=""  )
	{
		$query="INSERT INTO accessory values('','$emp','$add','$te','$an','$q1','$ad1','$hd','$a','$quantity')";
	     $data=mysqli_query($con,$query);
	     if($data)
		 {
			 echo"Data inserted successfully";
			 echo $a;
			 
		 }
	     else
		 {
			 echo"All fields are required";
			 
		 }
	
	
	}
	
}


?>

</body>
</html>


