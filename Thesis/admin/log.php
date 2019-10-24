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
  $transq = "SELECT * FROM transactions WHERE Transaction_paid = 1 ORDER BY Transaction_date DESC";
  $transresult = $db->query($transq);
 ?>
<br>
<div class="container">
  <div class="row">
<div class="col-md-12">
        <div class="card">
                  <div class="card-header text-success text-center"><i class="glyphicon glyphicon-folder-open"></i> History Logs</div>
                      <div class="card-body">
  <legend>History</legend>
  <?php if(mysqli_num_rows($transresult) == 0): ?>
    <div class="bg-danger cartemp" style="height:100px;">
         <p class="text-center text-light"  style="padding:35px; font-size: 18px;">
        There is no History of Transactions yet
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
            <td><a href="orderlog.php?trans_id=<?=$order['Transaction_id']?>" class="btn btn-xs btn-success">Details</td>
            <td><?= $order['Transaction_fullname']?></td>
            <td><?= $order['Transaction_description']?></td>
            <td><?='₱',$order['Transaction_grandtotal']?></td>
            <td><?=revised_date($order['Transaction_date']);?></td>
        </tr>
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
