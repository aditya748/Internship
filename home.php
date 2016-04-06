<?php
session_start();
//echo @$_SESSION['chef'];

?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/dish.js"></script>
<link rel="stylesheet" href="css/social.css">

</head>
<body>
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
      
    </div>
  </div>
</nav>
 <div class="container" style="margin-top:60px;">
  <div class="row">
    
	<div class="span8" style="width:40%;float:left">
	<form action="dish_database.php" method="post" enctype="multipart/form-data">
	<div>
      <h3 style="text-color:blue">Dish Entry Form</h3>
    </div>
	<div class="alert alert-danger" role="alert" id="danger">
	  <a href="#" class="alert-link">All fields marked <span style="color:red">*</span> cannot be blank,please fill all fields to continue</a>
	</div> 
	<div class="alert alert-warning" role="alert" id="warn">
	  <a href="#" class="alert-link">Choose correct file to continue...</a>
	</div>
  <div class="form-group">
    <label for="email">Name of the Dish:<span style="color:red">*</span></label>
    <input type="text" class="form-control" name="dish" id="name1" >
  </div>
  <div class="form-group">
    <label for="email">Type of Dish:<span style="color:red">*</span></label>
    <select class="form-control" name="type"id="type" >
		<option value="North Indian ">North Indian </option>
		<option value="South Indian">South Indian</option>
		<option value="Chinese">Chinese</option>
		<option value="Italian ">Italian </option>
		<option value="Continental">Continental</option>
		<option value="Dessert">Dessert</option>
		<option value="Snacks">Snacks</option>
		
	</select>
  </div>
  <div class="form-group">
    <label for="email">Category:<span style="color:red">*</span></label>
    <select class="form-control"id="cat" name="cat" >
	<option value="Veg ">Veg</option>
	<option value="Non-Veg">Non-Veg</option>
	</select>
  </div>
  <div class="form-group">
    <label for="email">Meal<span style="color:red">*</span></label>
    <select class="form-control" name="meal" id="meal">
		<option value="Breakfast">Breakfast</option>
		<option value="Lunch">Lunch</option>
		<option value="Dinner">Dinner</option>
		<option value=""></option>
		<option value=""></option>
	</select>
  </div>
  <div class="form-group">
    <label for="email">Cost of the Dish:<span style="color:red">*</span></label>
    <input type="text" class="form-control" name="cost" id="cost">
  </div>
  
  <div class="form-group">
    <label for="email">About the dish:</label>
    <input type="text" class="form-control" name="abt" id="abt">
  </div>
  <div class="form-group">
    <label for="email">Picture of the dish:<span style="color:red">*</span></label>
    <input type="file" name="file" id="pic">
  </div>
 
  <input type="submit" class="btn btn-primary btn-large active" style="width:100%;margin-bottom:60px" id="submit" value="Add the Dish">
</form>
	</div>
	<div class="span4" style="width:60%;float:right;padding-right:40px">
	<img src="Funny-cook-background-vector-material-01.jpg" class="img-responsive" alt="Cinque Terre" width="70%"> 
	</div>
  </div>
</div>
 

</body>
</html>