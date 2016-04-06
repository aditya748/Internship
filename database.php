<?php
include('connection.php');
$name=$_POST['name'];
$last=$_POST['last'];
$email=$_POST['email'];
$gen=$_POST['gen'];
$mobile=$_POST['mobile'];
$pass=md5($_POST['pwd']);
$local=$_POST['local'];
$add=$_POST['add'];
$pin=$_POST['pin'];
$city=$_POST['city'];
$date=$_POST['datepicker'];
$time=$_POST['time'];
$cdate=$_POST['cdate'];
$query="select mobile from info where mobile=$mobile";
$exe=mysql_query($query);
if(mysql_num_rows($exe)==0){
	$query="select email from info where email='$email'";
	$exe=mysql_query($query);
	if(mysql_num_rows($exe)==0){
		$query="INSERT INTO `cook`.`info` (`user_id`,`fname`,`lname`, `gender`, `email`, `mobile`, `password`,`city`, `locality`, `address`, `pin code`,`dob`,`joindate`,`jointime`) VALUES ('','$name','$last', '$gen', '$email', '$mobile', '$pass','$city', '$local', '$add', '$pin',$date,STR_TO_DATE('$cdate', '%Y/%m/%d'),'$time')";
		
		$exe=mysql_query($query) or die(mysql_error());
		
	}
	else{
		echo 1;
	}
}
else{
	echo 2;
}
?>