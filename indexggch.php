<?php
include('connection.php');
session_start(); ?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/front.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
#value{
	pointer:cursor;
}
</style>
</head>
<body>
<script>
function plus(val){
	
	var a=document.getElementById(val).nextSibling;
	sum=parseInt(a.innerHTML)+1;
	a.innerHTML=sum;
	
	$.ajax({
			type: "POST",
			url: "food_database.php",
			data: {name:val,sum1:sum}, 
		 

			success: function(data){
				document.getElementById(val).removeChild;
			}
	});
}
function minus(val,obj){
	
	var a=obj.previousSibling;
	if(parseInt(a.innerHTML)>0){
	sum=parseInt(a.innerHTML)-1;
	a.innerHTML=sum;
	
	$.ajax({
			type: "POST",
			url: "food_database.php",
			data: {name:val,sum1:sum}, 
		 

			success: function(data){
				
			}
	});
	}
}
</script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="aa.png" height="80px" width="100px" style="margin-top:-30px"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="work.php">How It Works</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li style="margin:-10px"><a href="#" ><button style="float:right"type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Sign In</button></a></li>
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
for($x=0;$x<($num-$r);$x=$x+3){?>
<div class="row">

  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-md-4"><h4><?php echo $data[$x]['name']; ?></h4></div>
		  <div class="col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x]['name']; ?>" onclick="plus('<?php echo $data[$x]['name']; ?>')" style="color:green" value="<?php echo $data[$x]['name']; ?>"></span><span id="value"><?php echo $data[$x]['likes'];?></span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x]['name']; ?>',this)" style="color:red" value="<?php echo $data[$x]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x+1]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-md-4"><h4><?php echo $data[$x+1]['name']; ?></h4></div>
		  <div class="col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+1]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:green"  id="<?php echo $data[$x+1]['name']; ?>" onclick="plus('<?php echo $data[$x+1]['name']; ?>')"></span><span id="value"><?php echo $data[$x+1]['likes'];?></span></i><span class="glyphicon glyphicon-minus"  onclick="minus('<?php echo $data[$x]['name']; ?>',this)" aria-hidden="true"  style="color:red" value="<?php echo $data[$x+1]['name']; ?>"></span></i></div>
		</div>
      </div>
    </div>
  </div><div class="col-md-4">
    <div class="thumbnail">
      <img src="food/<?php echo $data[$x]['picture']; ?>" alt="...">
      <div class="caption">
        <div class="row">
		  <div class="col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-md-4"><h4><?php echo $data[$x+2]['name']; ?></h4></div>
		  <div class="col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+2]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:green"  id="<?php echo $data[$x+2]['name']; ?>" onclick="plus('<?php echo $data[$x+2]['name']; ?>')"></span><span id="value"><?php echo $data[$x+2]['likes'];?></span></i><span class="glyphicon glyphicon-minus"  onclick="minus('<?php echo $data[$x]['name']; ?>',this)" aria-hidden="true" style="color:red" value="<?php echo $data[$x+1]['name']; ?>"></span></i></div>
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
		  <div class="col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-md-4"><h4><?php echo $data[$x]['name']; ?></h4></div>
		  <div class="col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" id="<?php echo $data[$x]['name']; ?>" onclick="plus('<?php echo $data[$x]['name']; ?>')" style="color:green" value="<?php echo $data[$x]['name']; ?>"></span><span id="value"><?php echo $data[$x]['likes'];?></span><span class="glyphicon glyphicon-minus" id="minus" aria-hidden="true" onclick="minus('<?php echo $data[$x]['name']; ?>',this)" style="color:red" value="<?php echo $data[$x]['name']; ?>"></span></i></div>
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
		  <div class="col-md-4"><img src="chef/19124470-Chef-woman--Stock-Photo-kitchen.jpg" class="img-circle" alt="Cinque Terre" width="80" height="80"></div>
		  <div class="col-md-4"><h4><?php echo $data[$x+1]['name']; ?></h4></div>
		  <div class="col-md-4"><img src="images/rupee.png" width="20" height="20"/><?php echo $data[$x+1]['cost'];?><br><br><span class="glyphicon glyphicon-plus" aria-hidden="true" style="color:green"  id="<?php echo $data[$x+1]['name']; ?>" onclick="plus('<?php echo $data[$x+1]['name']; ?>')"></span><span id="value"><?php echo $data[$x+1]['likes'];?></span></i><span class="glyphicon glyphicon-minus"  onclick="minus('<?php echo $data[$x]['name']; ?>',this)" aria-hidden="true"  style="color:red" value="<?php echo $data[$x+1]['name']; ?>"></span></i></div>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <nav class="navbar-inverse navbar-fixed-bottom" style="height:30px">	
	<div class="container">
		<span style="color:white;margin-bottom:-10px">Copyright &copy; TalentFreek</span>
		
	</div>
</nav>
</body>
</html>