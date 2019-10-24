<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in()){
  login_error_redirect();
}
if(!permission('admin')){
  permission_error_redirect('index.php');
}
include 'includes/header.php';
include 'includes/sidebar.php';


if(isset($_GET['archived']))
{
 $p_id = linis($_GET['archived']);
 $reset = "UPDATE products SET Deleted = 0, Product_featured = 1 WHERE Product_id = '$p_id'";
 $db->query($reset);
 header('Location: archive.php');
}

///get from DB
$sql = "SELECT * FROM products WHERE deleted = 1";
$products_result = $db->query($sql);
?>


<br>
<div class="container">
        <div class="card">
    <div class="card-header text-success text-center"><i class="glyphicon glyphicon-trash"></i> Archieved Products</div>
          <div class="card-body">
<?php if(mysqli_num_rows($products_result) == 0): ?>
  <div class="bg-danger cartemp" style="height:100px;">
       <p class="text-center text-light"  style="padding:35px; font-size: 18px;">
      There are no Archived Products yet
    </p>
  </div>
<?php else: ?>
<table class="table table-striped">

<thead class="text-success">
 <th></th>
 <th>Product</th>
 <th>Price</th>
 <th>Quantity</th>
 <th>Category</th>

</thead>

<tbody>
  <?php while($product = mysqli_fetch_assoc($products_result)): ?>
   <tr>
        <td>
          <a href="archive.php?archived=<?=$product['Product_id'];?>" class="btn btn-xs btn default"><span class="glyphicon glyphicon-refresh"></span></a> Restore
        </td>
        <td><?=$product['Product_name'];?></td>
        <td>₱<?=$product['Product_price'];?></td>
        <td><?=$product['Product_quantity'];?></td>
        <td><?=$product['Product_category'];?></td>

   </tr>
  <?php endwhile; ?>
</tbody>
</table>
<?php endif; ?>
</div>
<div class="card-footer text-right">
</div>
</div>
</div>
</div>
<br>
<?php
include 'includes/footer.php';
?>
