<?php
require_once '../system/initialize.php';
if(!is_logged_in()){
  header('Location: login.php');
}
if(permission('admin')){
  permission_error_redirect('index.php');
}
include 'includes/header.php';
include 'includes/sidebar.php';
  $protransq = "SELECT * FROM producttrans ORDER BY Added_date DESC";
  $protransresult = $db->query($protransq);
 ?>
<br>
<div class="container">
  <div class="row">
<div class="col-md-12">
        <div class="card">
                  <div class="card-header text-success text-center"><i class="glyphicon glyphicon-folder-open"></i> Product History</div>
                      <div class="card-body">
  <legend>History</legend>
  <?php if(mysqli_num_rows($protransresult) == 0): ?>
    <div class="bg-danger cartemp" style="height:100px;">
         <p class="text-center text-light"  style="padding:35px; font-size: 18px;">
        There is no History of Products yet
         </p>
    </div>
  <?php else: ?>
  <table class="table table-striped">
    <thead class="text-success">
      <th></th>
      <th>Name</th>
      <th>Quantity</th>
      <th>Date Added/Reduced</th>
    </thead>
  <?php $i=1;?>
    <tbody>
      <?php while($product = mysqli_fetch_assoc($protransresult)): ?>
        <tr>

          <td><?= $i?></td>
            <td><?= $product['Product_name']?></td>
            <td><?= $product['Product_quantity']?></td>
            <td><?=revised_date($product['Added_date']);?></td>
        </tr>
        <?php $i++;?>
      <?php endwhile; ?>
    </tbody>
  </table>
<?php endif;?>
<br>

</div>
<div class="card-footer">
</div>
</div>
</div>

</div>
</div>
<div class="container-fluid">
    <br>
</div>
<?php
include 'includes/footer.php'
 ?>
