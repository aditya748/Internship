<?php
session_start();

?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cook.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/social.css">
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
	   <li><a href="index.php">Home</a></li>
	   <?php
		}
		else{
	   ?>
	   <li><a href="food.php">Home</a></li>
	   <?php
		}
	   ?>
        
        <li><a href="work.php">How It Works</a></li>
      </ul>
     
    </div>
  </div>
</nav>
 <div class="container" style="font-size:130%">
  <h2>Frequently Asked Questions</h2>
  <p>refer these answers to clear your doubts</p> 
  <p class="text-danger">Q. What is Yfood?</p>
   <p class="text-primary">Ans:- YFOOD is a connection between people who loves home-food and the Indian house-wives who love to cook food for other people. YFOOD helps in delivering the cooked food from Indian house-wives to the customers. The food is prepared by Indian women who loves to cook food and want to spread the happiness of home cooked food.</p>
    <p class="text-danger">Q. What is Yfood?</p>
   <p class="text-danger">Q. How does Yfood works?</p>
   <p class="text-primary">Ans:-The food is prepared by Indian women in their own kitchen, packed in Yfood special packages that keep the food absolutely fresh delivered to your doorstep through ‘Yservice’-Our delivery service.</p>
   <p class="text-danger">Q.Where does Yfood deliver?</p>
   <p class="text-primary">Ans:-Currently, Yfood is only available in Koramangala but soon it will expanded to other places</p>
   <p class="text-danger">Q.Who can join Yfood?</p>
   <p class="text-primary">Ans:- Yfood is open to all who enjoys food and want to spread the joy of eating .</p>
   <p class="text-danger">Q. Do I need any cooking qualification to join?</p>
   <p class="text-primary">Ans:- No, You can be home maker who loves to cook and you can be a professional . The only qualification you need is passion to cook.</p>
   <p class="text-danger">Q. Where and when do I have to cook?</p>
   <p class="text-primary">Ans:-You will cook from the convenience of your home at time mutually suitable for both of us.</p>
   <p class="text-danger">Q. Do I need to cook daily?</p>
   <p class="text-primary">Ans:-No, you just have to tell us the day before about your availability.</p>
   <p class="text-danger">Q. Can I add more meals to an already placed order?</p>
   <p class="text-primary">Ans:- Yes, you can. You just need to make a new order.</p>
   <p class="text-danger">Q. Can I pre-book a meal?</p>
   <p class="text-primary">Ans:- Yes, Just call at +91 7750817368 to pre-book a order that you see at Yfood.</p>
   <p class="text-danger">Q. Can I plan a party or place a bulk order with Yfood?</p>
   <p class="text-primary">Ans:- Yes you can. You can call us at +91 7750817368 for placing bulk order.</p>
   <p class="text-danger">Q. Where will my personal information be used?</p>
   <p class="text-primary">Ans:-Yfood take security very seriously and we take precautions to keep your personal information secure and will not disclose your information until it is asked by any government agencies.</p>
   
</div>
 
</body>
</html>