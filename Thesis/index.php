<?php
require_once 'system/initialize.php';
include 'includes/home.php';
include 'includes/sidebar.php';
$sql = "SELECT * FROM products WHERE Product_featured = 1 AND Deleted = 0";
$featured = $db->query($sql);
?>


<br>
<br>
<div class="jumbotron" style="margin-top:-46px;height: 100px; background-image: url('./images/jumbotronbg.jpg'); box-shadow: 3px 7px 3px 0px rgba(0,0,0,0.6);">
  <div class="container" style="margin-top:-46px;" >
    <div class="row">
    <h2 class="col-md-12 col-xs-12 row justify-content-center palengke">Palengk-E</h2>
  </div>
  </div>
</div>
<!-- <div id="demo" class="carousel slide" data-ride="carousel" style="margin-top: -31px;">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/meat.jpg" class="caro" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Buy Products</h3>
        <p>Learn how to buy products</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/cart.jpg" class="caro" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Shopping Cart</h3>
        <p>Put your orders in a Shopping Cart</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/records.jpg" class="caro" width="1100" height="500">
      <div class="carousel-caption">
        <h3>My Orders</h3>
        <p>Keep track on your orders!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div> -->
<h2 class="title text-center">Get Started</h2>
<br>
<div class="container">
  <div class="row">

    <div class="col-md-3">
    <div class="card">
    <div class="card-header text-center text-success"><i class="glyphicon glyphicon-user"></i> Account</div>

    <div class="card-body">
      <p>New to Palengk-E? Better create an account first to purchase our products</p>
      <a href="customer.php">Learn More <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
    </div>
    </div>

    <div class="col-md-3">
  <div class="card">
  <div class="card-header text-center text-success"><i class="glyphicon glyphicon-search"></i> Navigate</div>

  <div class="card-body">
    <p>Explore our products here at Palengk-E.com, most products can be searched</p>
        <a href="tos.php">Learn More <i class="glyphicon glyphicon-menu-right"></i></a>
  </div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<div class="card-header text-center text-success"><i class="glyphicon glyphicon-envelope"></i> Contact Us</div>
<div class="card-body">
  <p>Wanna send feedback about our site? Try to contact us via email</p>
    <a href="contact.php">Learn More <i class="glyphicon glyphicon-menu-right"></i></a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card">
<div class="card-header text-center text-success"><i class="glyphicon glyphicon-lock"></i> Terms of Service</div>
<div class="card-body">
<p>Check out the rules of Palengk-E to ensure your understanding of our site</p>
<a href="tos.php">Learn More <i class="glyphicon glyphicon-menu-right"></i></a>
</div>
</div>
</div>



</div>
</div>
<br>
<?php
include 'includes/footer.php';
?>
