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

<script type="text/javascript" src="js/jquery.cookie.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/social.css">
</head>
<body style="background-color:grey">
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
  <?php
	  $tcost=0;
	  if(!empty($item)){?>
	  <div class="jumbotron container" style="background-color:white;margin-left:auto" >
	  <?php
	foreach($item as $x){
	$query="select * from dish where food_id=$x";
	$exe=mysql_query($query);
	$data=mysql_fetch_array($exe);
	  
	?>
	
  <div class="row">
			<div class="col-md-8 col-xs-8 col-sm-8"><img src="food/<?php echo $data['picture']; ?>" class="img-responsive" alt="..." style="height:140px;width:140px"></div>
			<div class="col-md-4 col-xs-4 col-sm-4" style="font-size:20px"><?php echo $data['name'];?><br><img src="images/rupee.png" width="20" height="20"/><?php echo $data['cost'];?><br>Total Quantity:<span><?php echo $no[array_search($x,$item)];?></span><br>Total cost:<img src="images/rupee.png" width="20" height="20"/><?php echo ($data['cost']*$no[array_search($x,$item)]);?><br><a onclick="remove_div('<?php echo $x;?>')"/>Remove</a></div>
			
		</div><hr>
		

<?php $tcost=$tcost+($data['cost']*$no[array_search($x,$item)]);
	  } ?>
	  
	  <hr style="color:green"></hr>
	<div class="row" id="<?php echo $x; ?>">
		<div class="col-md-4 col-sm-4 col-xs-4"><h4>Estimate Cost:</h4></div>
		<div class="col-md-4 col-sm-4 col-xs-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $tcost;?></div>
		<?php
		if(!empty($_SESSION['user'])){
		?>
		<div class="col-md-4 col-sm-4 col-xs-4"><a type="button" class="btn btn-info btn-lg" href="address.php">Confirm</a></div>
		<?php }
			else{
				?>
				<div class="col-md-4 col-sm-4 col-xs-4"><a type="button" class="btn btn-info btn-lg" href="#">Confirm</a></div>
				
				  <a href="#" class="alert-link" style="color:red"><h4>Please Sign In to Continue...</h4></a>
				
			<?php } ?>
	</div>

</div>
	  <?php } else{?>
	  <div class="container">
		<div class="jumbotron" style="background-color:white;">
		
		</div>
	</div>
	  <?php } ?>
</div>




</body>
</html>