<?php
include('connection.php'); 
$sum=$_POST['sum1'];
$name=$_POST['name'];
$query="update dish set likes=$sum where name='".$name."'";
echo $query;
$exe=mysql_query($query) or die(mysql_error());

?>