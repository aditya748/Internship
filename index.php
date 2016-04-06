<?php
include('connection.php');
session_start();
$item=json_decode(@$_COOKIE['item'],true); 
$no=json_decode(@$_COOKIE['no'],true);
?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/food.js"></script>
<script type="text/javascript" src="js/front.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/social.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>
#value{
	pointer:cursor;
}
</style>
</head>
<body>
<script>
var item=[];
var no=[];

function plus(id,val){
	//alert(id);
	var a=document.getElementById(id).nextSibling;
	if(parseInt(a.innerHTML)<9){
	sum=parseInt(a.innerHTML)+1;
	a.innerHTML=sum;
	if (item.indexOf(val) > -1) 
	{
			no[item.indexOf(val) ]+=1;
			$.cookie('no', JSON.stringify(no));
	}
	else {
		item.push(val);
		no[item.indexOf(val)]=1;
		var value=document.getElementById('value');
		value.innerHTML=parseInt(value.innerHTML)+1;
		$.cookie('item', JSON.stringify(item));
		$.cookie('no', JSON.stringify(no));
	}
	
	//alert($.cookie('item'));
	//alert($.cookie('no'));
	
	}
}
function minus(val,food,obj){
	
	var a=obj.previousSibling;
	var id=document.getElementById('value');
	if(parseInt(a.innerHTML)>0){
	sum=parseInt(a.innerHTML)-1;
	a.innerHTML=sum;
	if(parseInt(a.innerHTML)!=0){
			no[item.indexOf(food)]-=1;
			$.cookie('no', JSON.stringify(no));
			//alert($.cookie('no'));
	}
	else{
		//alert("inside");
		no[item.indexOf(food)]-=1;
		no.splice(item.indexOf(food),1);
		item.splice(item.indexOf(food),1);
		id.innerHTML=parseInt(id.innerHTML)-1;
		$.cookie('no', JSON.stringify(no));
		$.cookie('item', JSON.stringify(item));
		//alert($.cookie('no'));
	}
	}
}
function direct(){
	window.location.assign('test.php');
}
function remove(val){
	var id=document.getElementById(val);
	 $(val).hide();
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
	   <li style="margin:-8px"><a href="#" ><button class="btn btn-info btn-md"  onclick="direct()"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;Cart&nbsp;&nbsp;&nbsp;<span class="badge" id="value"><?php echo count($item);?></span></button></a></li>
	   <?php if(empty($_SESSION['user'])){ ?>
	   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Sign Up <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="user.php">Sign up for User</a></li>
            <li><a href="cook.php">Sign up for Cook</a></li>
            
          </ul>
        </li>
	   <?php } ?>
	   <?php
		if(!empty($_SESSION['user'])){
	   ?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['user']?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <li><a href="#">View Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
            
          </ul>
        </li>
        <?php }
		else{?>
		
		<!-- Single button -->
<li style="margin:8px"><div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sign In <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#" data-toggle="modal" data-target="#myModal">Sign in for User</a></li>
    <li><a href="#">Sign in for Cook</a></li>
    
  </ul>
</div></li>
		<?php } ?>
		
      </ul>
    </div>
  </div>
</nav>

<div style="margin:60px 60px 60px 60px">
<?php
$data=array();
$query="select * from dish where name is not null";
$exe=mysql_query($query) or die(mysql_error());
 while($row = mysql_fetch_assoc($exe))
        {
            $data[] = $row;
        }
	
$num=mysql_num_rows($exe);

$val=(int)$num/3;
$r=$num%3;
for($x=0;$x<($num-$r);$x=$x+3){
	?>
<div class="row">

  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><h4><?php echo $data[$x]['name']; ?></h4></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x]['name']; ?>" onclick="plus('<?php echo $data[$x]['name']; ?>','<?php echo $data[$x]['food_id']; ?>')" style="color:green" value="<?php echo $data[$x]['name']; ?>"></span><span id="value">0</span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x]['name']; ?>','<?php echo $data[$x]['food_id']; ?>',this)" style="color:red" value="<?php echo $data[$x]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
 <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x+1]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><h4><?php echo $data[$x+1]['name']; ?></h4></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+1]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x+1]['name']; ?>" onclick="plus('<?php echo $data[$x+1]['name']; ?>','<?php echo $data[$x+1]['food_id']; ?>')" style="color:green" value="<?php echo $data[$x+1]['name']; ?>"></span><span id="value">0</span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x+1]['name']; ?>','<?php echo $data[$x+1]['food_id']; ?>',this)" style="color:red" value="<?php echo $data[$x+1]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x+2]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><h4><?php echo $data[$x+2]['name']; ?></h4></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+2]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x+2]['name']; ?>" onclick="plus('<?php echo $data[$x+2]['name']; ?>','<?php echo $data[$x+2]['food_id']; ?>')" style="color:green" value="<?php echo $data[$x+2]['name']; ?>"></span><span id="value">0</span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x+2]['name']; ?>','<?php echo $data[$x+2]['food_id']; ?>',this)" style="color:red" value="<?php echo $data[$x+2]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
  
 
  </div>
<?php }?>
<?php
if($r!=0){ ?>
<div class="row">
	
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><h4><?php echo $data[$x]['name']; ?></h4></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x]['name']; ?>" onclick="plus('<?php echo $data[$x]['name']; ?>','<?php echo $data[$x]['food_id']; ?>')" style="color:green" value="<?php echo $data[$x]['name']; ?>"></span><span id="value">0</span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x]['name']; ?>','<?php echo $data[$x]['food_id']; ?>',this)" style="color:red" value="<?php echo $data[$x]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
	<?php 
	if($r==2){?>
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x+1]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><h4><?php echo $data[$x+1]['name']; ?></h4></div>
		  <div class="col-xs-4 col-sm-4 col-sm-4 col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+1]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x+1]['name']; ?>" onclick="plus('<?php echo $data[$x+1]['name']; ?>','<?php echo $data[$x+1]['food_id']; ?>')" style="color:green" value="<?php echo $data[$x+1]['name']; ?>"></span><span id="value">0</span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x+1]['name']; ?>','<?php echo $data[$x+1]['food_id']; ?>',this)" style="color:red" value="<?php echo $data[$x+1]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
 
	<?php } ?>
  </div>
<?php } ?>
 </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Sign In</h4>
      </div>
      <div class="modal-body">
		  <div class="alert alert-danger" role="alert" id="danger_sign">
		  <a href="#" class="alert-link">All fields marked <span style="color:red">*</span> cannot be blank,please fill all fields to continue</a>
			</div>
			<div class="alert alert-danger" role="alert" id="valid">
		  <a href="#" class="alert-link">Not a valid user</a>
			</div>
		<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email1" >
		</div>
		<div class="form-group">
		<label for="email">Password:</label>
		<input type="password" class="form-control" id="pwd1" >
		</div>
      </div>
      <div class="modal-footer">
	   <a href="#" class="btn btn-success active" id="sign">Sign In</a>
        <a href="user.php" class="btn btn-default" >Sign Up</a>
      </div>
    </div>

  </div>
</div>



</body>
</html>