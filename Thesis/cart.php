<?php
  require_once 'system/initialize.php';
  if(!is_logged_in_customer()){
    login_error_redirect();
  }
  include 'includes/home.php';
  include 'includes/sidebar.php';
  $items = json_decode($cart_data['Cart_items'], true);
  $i = 1;
  $sub_total = 0;
  $item_count = 0;
    $sub_origtotal=0;
 ?>
<br>
 <div class="container">
       <div class="card">
      <div class="card-header text-center text-success"><i class="glyphicon glyphicon-shopping-cart"></i> My Shopping Cart</div>
          <div class="card-body">
    <br>

        <?php if($cart_data['Cart_items'] == '{}'): ?>
          <div class="bg-danger cartemp" style="height:100px;">
            <p class="text-center text-light" style="padding:35px; font-size: 18px;">
              Your shopping Cart is empty!
            </p>
          </div>
        <?php else: ?>
          <legend>Inventory</legend>
          <table class="table table-striped">
            <thead class="text-success">
              <th>#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Sub Total</th>
            </thead>

            <tbody>
              <?php
                foreach ($items as $item) {
                  $product_id = $item['id'];
                  $productq = $db->query("SELECT * FROM products WHERE Product_id = '{$product_id}'");
                  $product = mysqli_fetch_assoc($productq);
                  ?>
                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$product['Product_name']; echo (($item['quantity'] > $product['Product_quantity'])?' <span class="text-danger">(There is '.$product['Product_quantity']. ' available) </span>' :'')?></td>
                    <td>₱ <?=$product['Product_price'];?></td>
                    <td>
                      <button class="btn btn-sm btn-light btn-outline-secondary " onclick="update_cart('remove','<?=$product['Product_id']?>');">-</button>
                      <?=$item['quantity'] ?>
                      <?php if($item['quantity'] < $product['Product_quantity']): ?>
                      <button class="btn btn-sm btn-light btn-outline-secondary" onclick="update_cart('add','<?=$product['Product_id']?>');">+</button>
                      <?php else: ?>
                        <span class="text-danger">Max</span>
                      <?php endif; ?>
                    </td>
                    <td>₱ <?= $item['quantity'] * $product['Product_price']?></td>
                  </tr>
                  <?php
                  $i++;
                  $item_count += $item['quantity'];
                  $sub_total += ($product['Product_price'] * $item['quantity']);
                  $sub_origtotal += ($product['Product_origprice'] * $item['quantity']);
                }
                $shippingfee = 60.00;
                $grand_total = $shippingfee + $sub_total;
                ?>

            </tbody>
          </table>
		  <br>
		  <?php if($sub_total < 300): ?>
			<p class="text-danger">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Sub Total must be at least ₱ 300 before purchasing
			</p>
			<?php endif;?>
          <table class="table">
            <br>
            <legend>Total</legend>
            <thead class="totals-table-header text-success">
              <th>Total Items</th>
              <th>Shipping fee</th>
              <th>Sub Total</th>
              <th>Grand Total</th>
            </thead>

            <tbody>
              <tr>
                <td><?= $item_count?></td>
                  <td>₱ <?= $shippingfee?></td>
                    <td>₱ <?= $sub_total?></td>
                <td class="text-success" style="background-color: #d6f5d6;">₱ <?= $grand_total?></td>
              </tr>
            </tbody>
          </table>
          <br>

        <?php endif; ?>

</div>
<div class="card-footer text-right">
    <?php if($cart_data['Cart_items'] != '{}'): ?>
    <form method="post" action="cod.php">
      <input type="hidden" name="grand" value="<?=$grand_total?>">
      <input type="hidden" name="cartid" value="<?=$cart_id?>">
      <input type="hidden" name="ship" value="<?=$shippingfee?>">
      <input type="hidden" name="sub" value="<?=$sub_total?>">
        <input type="hidden" name="subog" value="<?=$sub_origtotal?>">
      <input type="hidden" name="itemcount" value="<?=$item_count.' item'.(($item_count > 1)?'s':'').' from Palengk-E' ?>">

      <div class="row">
      <div class="col-md-3">
      <img src="images/cod.png" style="height: 35px; border-width: 0px; width: auto;">
      Cash on Delivery
    </div>
    <div class="col-md-9">
      <button type="submit" class="btn btn-success"  <?php echo (($sub_total < 300)?'disabled':'')?>><i class="	glyphicon glyphicon-edit"></i> Payment</button>
</div>
    </div>

  </form>
<?php endif; ?>
</div>
</div>

</div>
<br>


<?php
 include 'includes/footer.php';
  ?>
