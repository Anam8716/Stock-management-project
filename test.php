<!DOCTYPE html>
<html>
<body>
<?php
	session_start();
	include("dbconfig/config.php");
	//phpinfo();


$a=2;
$b=2;
$c=2;
$d=2;
$e=2;


$x=($a*$b*$c)/$d;


$calc=sqrt($x);

$da="2013-03-15";
$date=date_create($da);
date_add($date,date_interval_create_from_date_string("$calc month"));
$a= date_format($date,"Y-m-d");
echo $a;



$result = "SELECT holdingcost,setupcost FROM khc WHERE id='1' ";
$a=mysqli_query($con,$result);
$value = mysqli_fetch_row($a);
$x= $value[0];
echo $x;
$y=$value[1];
echo $y;
   
	
	$sql = "SELECT * FROM khc";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Id"]. " - HoldingCost: " . $row["HoldingCost"]. " SetupCost: " . $row["SetupCost"]. "<br>";
    }
} else {
    echo "0 results";
}
	
	
	


date_default_timezone_set('Asia/Kolkata');
$from = strtotime('2018-04-03');
$today = time();
$difference = $today - $from;
echo floor($difference / 86400);  // (60 * 60 * 24)





  ?>






</body>
</html>

