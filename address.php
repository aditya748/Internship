<?php
include('connection.php');
session_start(); 
//$val=$_GET['val'];
$item=json_decode(@$_COOKIE['item'],true); 
$no=json_decode(@$_COOKIE['no'],true); 
$name=explode(' ',$_SESSION['user']);

$query='select address from info where fname="'.$name[0].'" and lname="'.$name[1].'"';

$exe=mysql_query($query);
$address=mysql_fetch_array($exe);

//print_r($item);?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.cookie.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/social.css">
</head>
<body>
<script>
var no=<?php echo @$_COOKIE['item'];?>;
var item=<?php echo @$_COOKIE['no']?>;
function remove_div(val){
	//alert("okk");
	no.splice(item.indexOf(val),1);
		item.splice(item.indexOf(val),1);
		$.cookie('no', JSON.stringify(no));
		$.cookie('item', JSON.stringify(item));
		window.location.assign('test.php');
}
</script>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle pull-left"  data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="aa.png" height="80px" width="100px" style="margin-top:-30px"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li class="active"><a href="index.php">Home</a></li>
        
        <li><a href="work.php">How It Works</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	   <li style="margin:-8px"><a href="#" ><button class="btn btn-info btn-md"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;Cart&nbsp;&nbsp;&nbsp;<span class="badge" id="value"><?php echo count($item);?></span></button></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><span style="color:#5BC0DE"> <?php echo @$_SESSION['user']?></span></a></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container" style="margin-top:60px">
<form action="order.php" method="post">
 <div class="form-group">
    <label for="email">Enter Your Address:<span style="color:red">*</span></label>
    <textarea class="form-control"style="height:100px"name="address" id="address"><?php echo $address['address'];?></textarea>
  </div>
  <input type="submit" class="btn btn-primary btn-large active"/>
  </form>
</div>




</body>
</html>