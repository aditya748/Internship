<?php
include('connection.php');
session_start(true);
$email=$_POST['email'];
$pass=md5($_POST['pass']);
$query="select password from chef where email='$email'";
$exe=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($exe)==0){
	echo 1;
}
else{
	$query="select * from chef where email='$email'";
	$exe=mysql_query($query) or die(mysql_error());
	$data=mysql_fetch_array($exe) or die(mysql_error());
	//echo $data['fname'];
	$_SESSION['chef']=$data['fname'].' '.$data['lname'];
}
?>