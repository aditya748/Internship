<?php
include('connection.php');
session_start(); 
$name1=@$_FILES['file']['name'];
$ext=strtolower(substr($name1,strpos($name1,'.')+1));
$tmp_name=@$_FILES['file']['tmp_name'];
$size=@$_FILES['file']['size'];
$type=@$_FILES['file']['type'];
if(isset($name1)){
	if(!empty($name1)){
		if(($ext=='jpg'||$ext=='jpeg')&&$type=='image/jpeg'){
			$location='food/';
			if(@move_uploaded_file($tmp_name,$location.$name1)){
			//echo "uploaded";
			}
			else{
			echo "error";
			}
		}
	}
}
 $name=$_POST['dish'];
$cost=@$_POST['cost'];
$abt=@$_POST['abt'];
$type=@$_POST['type'];
 $meal=@$_POST['meal'];
$cat=@$_POST['cat'];
$date=date("m/d/Y h:i:s a", time());
$parts = explode(' ', $date);


 $chef=$_SESSION['chef'];
$fname=explode(' ', $chef);

$query='select chef_id from chef where fname="'.$fname[0].'" and lname="'.$fname[1].'"';
 $query;
$exe=mysql_query($query);
$chef=mysql_fetch_array($exe);
$chef=$chef['chef_id'];
$query="select chef_id from dish where chef_id=".$chef;

$exe=mysql_query($query);
$chef1=mysql_fetch_array($exe);
if($chef1['chef_id']!=$chef){
		echo "no";
		$query="INSERT INTO `cook`.`dish` (`food_id`,`chef_id`,`name`,`cost`,`about` ,`picture`,`type`,`category`,`meal`,`date`,`time` ) VALUES ('','$chef','$name','$cost','$abt','$name1','$type','$cat','$meal',STR_TO_DATE('$parts[0]', '%m/%d/%Y'),'$parts[1]' )";
		
		$exe=mysql_query($query);
		$query="INSERT INTO `cook`.`totaldish` (`food_id`,`chef_id`,`name`,`cost`,`about` ,`picture`,`type`,`category`,`meal`,`date`,`time` ) VALUES ('','$chef','$name','$cost','$abt','$name1','$type','$cat','$meal',STR_TO_DATE('$parts[0]', '%m/%d/%Y'),'$parts[1]' )";
		$exe=mysql_query($query);
		header('Location: home1.php');
}
else{
	echo "yes";
	$query="update `cook`.`dish` set name='".$name."',cost='".$cost."',about='".$abt."',picture='".$name1."',type='".$type."',category='".$cat."',meal='".$meal."',date=STR_TO_DATE('$parts[0]', '%m/%d/%Y'),time='".$parts[1]."' where chef_id='".$chef."'";
	$exe=mysql_query($query) or die(mysql_error());
	
	$query="INSERT INTO `cook`.`totaldish` (`food_id`,`chef_id`,`name`,`cost`,`about` ,`picture`,`type`,`category`,`meal`,`date`,`time` ) VALUES ('','$chef','$name','$cost','$abt','$name1','$type','$cat','$meal',STR_TO_DATE('$parts[0]', '%m/%d/%Y'),'$parts[1]' )";
	$exe=mysql_query($query);
	header('Location: home1.php');
}
?>