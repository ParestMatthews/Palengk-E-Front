<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in_customer()){
  login_error_redirect();
}
include 'includes/home.php';
include 'includes/sidebar.php';
  $transq = "SELECT * FROM transactions WHERE Cart_id = '{$cart_id}' ORDER BY Transaction_id DESC";
  $transresult = $db->query($transq);
 ?>
<br>
 <div class="container">
   <div class="row">
 <div class="col-md-12">
    <div class="card">
      <div class="card-header text-center text-success"><i class="glyphicon glyphicon-duplicate"></i> My Orders</div>

    <div class="card-body">
   <?php if(mysqli_num_rows($transresult) == 0): ?>
     <div class="bg-danger cartemp" style="height:100px;">
          <p class="text-center text-danger"  style="padding:35px; font-size: 18px;">
         You have never ordered a product from Palengk-E
       </p>
     </div>
     <div class="container-fluid">
       <br>
     </div>
   <?php else: ?>
        <legend>Orders</legend>
     <div class="table-responsive">

   <table class="table table-striped">
     <thead class="text-success" >
       <th></th>
       <th >Order ID #</th>
       <th>Name</th>
       <th>Description</th>
       <th>Total</th>
       <th>Placed on</th>
       <th>Status</th>
     </thead>

     <tbody>
       <?php while($order = mysqli_fetch_assoc($transresult)): ?>
         <tr>
             <td><a href="order_details.php?order_details=<?=$order['Transaction_id']?>" class="btn btn-xs btn-success">Details</td>
               <td><?= $order['Transaction_id']?></td>
             <td><?= $order['Transaction_fullname']?></td>
             <td><?= $order['Transaction_description']?></td>
             <td><?='₱',$order['Transaction_grandtotal']?></td>
             <td><?=revised_date($order['Transaction_date']);?></td>
             <td class="
             <?php if($order['Transaction_shipped'] == 0){
             echo 'text-danger" style="background-color: #ffb3b3;" ';
             }
             else if($order['Transaction_shipped'] == 1)
            echo 'text-warning" style="background-color: #fff5cc;" ';
            else{
              echo 'text-success" style="background-color: #d6f5d6;" ';
            }
             ?>">
               <?php if($order['Transaction_shipped'] == 0){
               echo 'Ordered';
               }
               else if($order['Transaction_shipped'] == 1)
              echo 'Shipped';
              else{
                echo 'Delivered';
              }
               ?></td>
         </tr>
       <?php endwhile; ?>
     </tbody>
   </table>
 </div>
    <?php endif; ?>
  </div>
  <div class="card-footer text-right">

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
