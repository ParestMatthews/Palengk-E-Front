<?php
require_once 'system/initialize.php';
include 'includes/home.php';
include 'includes/sidebar.php';
$sql = "SELECT * FROM products WHERE Product_featured = 1 AND Deleted = 0";
$featured = $db->query($sql);
?>


<br>
<br>

<div class="container">
  <div class="row">
<div class="col-md-12">
        <div class="card">
          <div class="card-header text-success text-center"><i class="glyphicon glyphicon-user"></i> About us</div>
  <div class="card-body">

<legend>Mission: </legend>
<p>
  To provide the Customers easy navigation throughout their purchase.<br>
  To deliver fresh  products that Palengk-E has to offer.
</p>

<legend>About the Company</legend>
<p>
  Palengk-E is an Ecommerce web application that aims to sell food products to potential consumers that will use this website. With the growth and development of online marketing, local markets need to start
utilizing the internet to expand their range of customers and use innovative marketing
techniques to satisfy customer needs. The researchers conducted this study to find out the
effect online marketing has on local markets. The researchers came up with the idea of
the study because local sellers can appeal to a larger customer base and expand their
market beyond the limitations they have at the location of the local market.
</p>


</div>
<div class="card-footer">

</div>
</div>
</div>
</div>

</div>


<br><br>

<?php
include 'includes/footer.php';
?>
