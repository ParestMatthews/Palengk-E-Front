<?php
require_once 'system/initialize.php';
include 'includes/home.php';
include 'includes/sidebar.php';

$id = linis($_POST['productname']);

$sql = "SELECT * FROM products WHERE  Product_id = '$id' AND Deleted = 0";
$proq = $db->query($sql);
$productq = mysqli_fetch_assoc($proq);
?>
<?php
include 'includes/popup.php';
 ?>
 <br>

<?php if($id == '' || $id == null): ?>
<?php
header('Location: index.php');
 ?>
<?php else: ?>
<div class="container">
      <div class="card">
     <div class="card-header text-center text-success"><?php echo $productq['Product_name']?></div>

     <div class="card-body">
       <div class="container">
                <span id="modal_errors"></span>
           <div class="row">

             <div class="col-md-5 col-xs-5">
               <div class="center-block">
                 <img src="<?= $productq['Product_image']?>"  style="filter: brightness(100%);
                   margin: 30px auto;
                   height: 300px;
                   width: 600px;;
                   border-radius: 10px;
                   border-color: black;
                   border-width: 2px;
                   border-style: solid;">
               </div>
             </div>

             <div class="col-md-6 col-xs-6">
               <span class="cardname">Description: </span>
               <br>
               <p><?= nl2br($productq['Product_description'])?></p>
               <hr/>
               <p>Price: Php <?= $productq['Product_price']?></p>

               <form action="add_cart.php" method="post" id="add_product_form">
                 <input type="hidden" name="product_id" value="<?php echo $id?>">
                 <input type="hidden" name="stock" id="stock" value="<?php echo $productq['Product_quantity']?>">
                 <div class="form-group">
                   <div class="col-md-3 col-xs-3">
                     <label for="quantity">Quantity</label>
                     <input class="form-control" type="number" value="1" min="1" max="99"  id="quantity" name="quantity" >
                     <br/>
                     <label for="stock">Currently on stock:</label><?= $productq['Product_quantity']?>
                   </div>
               </form>

                 </div>
             </div>
           </div>

       </div>
     </div>

<div class="card-footer text-right">
    <a href="index.php" class="btn btn-danger"  onclick="closemodal()"><span class="glyphicon glyphicon-home"></span> Return Home</a>
<button class="btn btn-success" onclick="add_to_cart2()" <?php echo (!is_logged_in_customer())?'disabled':''?>><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</button>
</div>
   </div>
 </div>
 <br>
<?php endif; ?>
<?php
include 'includes/footer.php';
 ?>
