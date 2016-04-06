<?php
include('connection.php');
session_start();
$email=$_POST['email'];
$pass=md5($_POST['pass']);
$query="select password from info where email='$email'";
$exe=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($exe)==0)
{
	echo 1;
}
else{
	$query="select * from info where email='$email'";
	$exe=mysql_query($query);
	$data=mysql_fetch_array($exe);
	//echo $data['fname'];
	$_SESSION['user']=$data['fname'].' '.$data['lname'];
	$_SESSION['email']=$data['email'];
}
?>