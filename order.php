<?php
include('connection.php');
session_start();
$i=0;
$add=$_POST['address'];
$date=date("m/d/Y h:i:s a", time());
$parts = explode(' ', $date);
$email=$_SESSION['email'];
if(!empty($_SESSION['user'])){
	$item=json_decode(@$_COOKIE['item'],true); 
$no=json_decode(@$_COOKIE['no'],true); 
//print_r($no);
foreach($item as $x){
	
	$query="select * from dish where food_id=$x";
	$exe=mysql_query($query);
	$food=mysql_fetch_array($exe);
	$cost=$food['cost'];
	$query1="select user_id from info where email='".$email."'";
	$exe1=mysql_query($query1);
	$food1=mysql_fetch_array($exe1) or die(mysql_error());
	$u_id=$food1['user_id'];
	//echo $no[$i];
	$query2="INSERT INTO  `cook`.`logorder` (`order_id` ,`user_id` ,`orderdate` ,`ordertime`) VALUES ('' ,$u_id ,  STR_TO_DATE('$parts[0]', '%m/%d/%Y'),'$parts[1]')";
	echo $query2;
	$exe2=mysql_query($query2);
	$query2="select * from logorder where user_id=$u_id";
	$exe=mysql_query($query2);
	$data=mysql_fetch_array($exe);
	//echo $data[$i];
	$query2="INSERT INTO  `cook`.`order` (`id` ,`order_id` ,`dish_id` ,`quantity` ,`cost`,`address`) VALUES ($u_id ,$data[$i] ,  $x,  $no[$i],  $cost,'$add')";
	echo $query2;
	$exe2=mysql_query($query2);
	$i++;
	
}
header('Location:success.html');
}?>