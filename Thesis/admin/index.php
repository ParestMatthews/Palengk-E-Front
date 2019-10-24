<?php
require_once '../system/initialize.php';
if(!is_logged_in()){
  header('Location: login.php');
}
include 'includes/header.php';
include 'includes/sidebar.php';
  $transq = "SELECT * FROM transactions WHERE Transaction_shipped = 0 ORDER BY Transaction_date DESC";
  $transresult = $db->query($transq);

  $productq = "SELECT * FROM products WHERE Product_quantity <= 10 AND Deleted = 0";
  $productresult = $db->query($productq);


 ?>
<br>
<div class="container">
  <div class="row">

<div class="col-md-12">
        <div class="card">
                  <div class="card-header text-success text-center"><i class="glyphicon glyphicon-folder-open"></i> Dashboard</div>
                      <div class="card-body">
                        <?php if(!permission('admin')): ?>
  <legend>Orders to ship</legend>
  <?php if(mysqli_num_rows($transresult) == 0): ?>
    <div class="bg-danger cartemp" style="height:100px;">
         <p class="text-center text-light"  style="padding:35px; font-size: 18px;">
        There are no Orders to ship yet
      </p>
    </div>
  <?php else: ?>
  <table class="table table-striped">
    <thead class="text-success">
      <th></th>
      <th>Name</th>
      <th>Description</th>
      <th>Total</th>
      <th>Date</th>
    </thead>

    <tbody>
      <?php while($order = mysqli_fetch_assoc($transresult)): ?>
        <tr>
            <td><a href="orders.php?trans_id=<?=$order['Transaction_id']?>" class="btn btn-xs btn-success">Details</td>
            <td><?= $order['Transaction_fullname']?></td>
            <td><?= $order['Transaction_description']?></td>
            <td><?='₱',$order['Transaction_grandtotal']?></td>
            <td><?=revised_date($order['Transaction_date']);?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php endif;?>
<?php endif;?>
<br>
<div class="row">
  <div class="col-md-12">
      <?php if(permission('admin')): ?>
  <legend>Low Stock: (Threshold is 10)</legend>
  <?php if(mysqli_num_rows($productresult)==0): ?>
    <div class="bg-danger cartemp" style="height:100px;">
         <p class="text-center text-danger text-light"  style="padding:35px; font-size: 18px;">
        There are no Low Stock Products
      </p>
    </div>
  <?php else: ?>
  <table class="table">
    <thead class="text-success">
      <th>Product</th>
      <th>Category</th>
      <th>Quantity</th>

    </thead>

    <tbody>
      <?php while($prodx = mysqli_fetch_assoc($productresult)): ?>
        <tr class="<?php echo (($prodx['Product_quantity'] <= 5)?' text-danger" style="background-color:#ffe6e6;"':'')?>">
            <td><?php echo $prodx['Product_name'];?></td>
            <td><?php
            $q = "SELECT * FROM categories WHERE Category_id = $prodx[Product_category]";
            $query = $db->query($q);
            while ($catx = mysqli_fetch_assoc($query)){
              echo $catx['Category_name'];
            }
            ?></td>
            <td><?php echo $prodx['Product_quantity'];?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <?php endif; ?>
<?php endif;?>
</div>



</div>
</div>
<div class="card-footer">
</div>
</div>
</div>

</div>
</div>

<div class="container">
<br>
</div>
<?php
include 'includes/footer.php'
 ?>
