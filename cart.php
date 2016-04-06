<?php
include('connection.php');
session_start(); 
//$val=$_GET['val'];
$item=json_decode(@$_COOKIE['item'],true); 
$no=json_decode(@$_COOKIE['no'],true); 
//print_r($item);?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cook.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
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
        <?php
		if(empty($_SESSION['user'])){
	   ?>
	   <li class="active"><a href="index.php">Home</a></li>
	   <?php
		}
		else{
	   ?>
	   <li class="active"><a href="food.php">Home</a></li>
	   <?php
		}
	   ?>
       
        <li><a href="work.php">How It Works</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	   <li style="margin:-8px"><a href="#" ><button class="btn btn-info btn-md" onclick="window.location.assign('cart.php')"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;Cart&nbsp;&nbsp;&nbsp;<span class="badge" id="value"><?php echo count($item);?></span></button></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span><span style="color:#5BC0DE"> <?php echo $_SESSION['user']?></span></a></li>
        
      </ul>
    </div>
  </div>
</nav>


 <?php
 $tcost=0;
if(!empty($item)){
foreach($item as $x){
	$query="select * from dish where food_id=$x";
	$exe=mysql_query($query);
	$data=mysql_fetch_array($exe);?>
	 <div class="jumbotron" style="background-color:#F8F8F8">
   <div class="row" style="margin-left:10px;width:100%">
		  <div class="col-md-4"><img src="food/<?php echo $data['picture']; ?>" alt="..." style="height:150px;width:150px"></div>
		  <div class="col-md-4"><p><h1><?php echo $data['name'];?></h1></p><p><img src="images/rupee.png" width="20" height="20"/><?php echo $data['cost'];?></p><p>Total Quantity:<span><?php echo $no[array_search($x,$item)];?></span></p></div>
		  <div class="col-md-4"><p>Total Cost:<img src="images/rupee.png" width="20" height="20"/><span><?php echo ($tcost+=$data['cost']*$no[array_search($x,$item)]);?></span></p><p><a href=""/>Remove</a></p></div>		  
		</div>
		</div>
		<?php }?>
		<div class="jumbotron">
		  <div class="col-md-4"></div>
		  <div class="col-md-4"><p>Total Cost:</p><img src="images/rupee.png" width="20" height="20"/><?php echo $tcost;?></div>
		  <div class="col-md-4"></div>		  
		</div>
		<p><a class="btn btn-success btn-lg" href="place_order.php" role="button">Place Order</a></p>
		<?php}
else{ ?>
<span style="margin:500px"><a class="btn btn-success btn-lg" href="food.php" role="button">Continue to food selection</a></span>
<?php }?>


 <nav class="navbar-inverse navbar-fixed-bottom" style="height:30px">	
	<div class="container">
		<span style="color:white;margin-bottom:-10px">Copyright &copy; TalentFreek<a style="float:right" href="faq.php">FAQ</a></span>
		
	</div>
</nav>
</body>
</html>