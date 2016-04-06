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
$cui=$_POST['cui'];
$yr=$_POST['yr'];
$land=$_POST['land'];
$abt=$_POST['abt'];
$city=$_POST['city'];
$date=$_POST['datepicker'];
$time=$_POST['time'];
$cdate=$_POST['cdate'];
$query="select mobile from chef where mobile=$mobile";
$exe=mysql_query($query);
if(mysql_num_rows($exe)==0){
	$query="select email from chef where email='$email'";
	$exe=mysql_query($query);
	if(mysql_num_rows($exe)==0){
		$query="INSERT INTO `cook`.`chef` (`chef_id`,`fname`,`lname`, `email`, `gender`, `mobile`, `password`,`city`, `locality`, `cuisine`, `yourself`, `year`, `address`, `landmark`, `pincode`,`joindate`,`jointime`,`dob`) VALUES (null,'$name','$last', '$email', '$gen', '$mobile', '$pass','$city', '$local', '$cui', '$abt', '$yr', '$add', '$land', '$pin',STR_TO_DATE('$cdate', '%Y/%m/%d'),'$time',$date)";
		echo $query;
		$exe=mysql_query($query) or die(mysql_error());
		//echo "Successfully signed up,sign in to continue....";
	}
	else{
		echo 1;
	}
}
else{
	echo 2;
}
?>