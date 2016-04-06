<?php
include('connection.php');
session_start();
$email=$_SESSION['email'];
$item=json_decode(@$_COOKIE['item'],true); 
$no=json_decode(@$_COOKIE['no'],true); 
$query='select user_id from info where email="'.$email.'"';
$exe=mysql_query($query) or die(mysql_error());
$user_id=mysql_fetch_array($exe);
$len=count($item);
for($x=0;$x<$len;$x++){
	echo $item[$x];
	$query1='select cost from dish where food_id='.$item[$x];
	$exe1=mysql_query($query1);
	$cost=mysql_fetch_array($exe1);
	print_r($cost);
	$cost=$cost*($no[$x]);
$query="insert into order('cust_id','food_id','quantity','cost','status') values($user_id,$item[$x],$no[$x],$cost,0)";
$exe=mysql_query($query);
}
?>