<?php
require_once '../system/initialize.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE Product_id = '$id'";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result);
 ?>



<?php ob_start(); ?>
<div class="modal fade" id="details-modal" tableindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden=true data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title text-center w-100" style="color:black; text-shadow: 0px 0 black, 0 0px black, 0px 0 black, 0 0px black;"><?= $product['Product_name']?></h4>
      <button class="close" type="button" onclick="closemodal()" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <span id="modal_errors"></span>
            <div class="row">



              <div class="col-sm-6">
                <div class="center-block">
                  <img src="<?= $product['Product_image']?>" class="details img-responsive" style=" margin: 30px auto;
                   height: 300px;
                   width: 350px;;
                   border-radius: 10px;
                   border-color: black;
                   border-width: 2px;
                   border-style: solid;">
                </div>
              </div>

              <div class="col-sm-6">
              <legend>Description: </legend>
                <p><?= nl2br($product['Product_description'])?></p>
                <hr/>
                <p>Price: Php <?= $product['Product_price']?></p>

                <form action="add_cart.php" method="post" id="add_product_form">
                  <input type="hidden" name="product_id" value="<?php echo $id?>">
                  <input type="hidden" name="stock" id="stock" value="<?php echo $product['Product_quantity']?>">
                  <input type="hidden" name="old" id="old" value="<?php echo $product['Product_origprice']?>">
                  <input type="hidden" name="new" id="new" value="<?php echo $product['Product_price']?>">

                  <div class="form-group">
                             <div class="col-sm-4">
                      <label for="quantity">Quantity</label>
                      <input class="form-control" type="number" value="1" min="1" max="99"  id="quantity" name="quantity" >
                      <br/>
                      <label for="stock">Currently on stock:</label><?= $product['Product_quantity']?>
                    </div>
                </form>

                  </div>
              </div>
            </div>
        </div>
<div class="modal-footer">
  <button class="btn btn-danger" onclick="closemodal()">Close</button>
  <button class="btn btn-success" onclick="add_to_cart()" <?php echo (!is_logged_in_customer())?'disabled':''?>><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</button>
</div>
    </div>
    </div>
  </div>
</div>

  <script>
  function closemodal(){
    jQuery("#details-modal").modal('hide');
    setTimeout(function(){
      jQuery("#details-modal").remove();
      jQuery('.modal-backdrop').remove();
    },500);
  }
</script>
<?php echo ob_get_clean(); ?>
