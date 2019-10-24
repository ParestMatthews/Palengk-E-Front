<?php
require_once 'system/initialize.php';
if(!is_logged_in_customer()){
  login_error_redirect();
}
include 'includes/home.php';
include 'includes/sidebar.php';
$totalinfo = $db->query("SELECT * FROM customers WHERE Customer_id = {$customer_id}");
$userq = mysqli_fetch_assoc($totalinfo);

?>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-success text-center"><i class="glyphicon glyphicon-pencil"></i> Payment Method: Cash on Delivery</div>
        <div class="card-body">
           <form action="thanks.php" method="post" id="payment-form" name="form">
               <legend>Shipping Address</legend>
             <input type="hidden" name="grand_total" value="<?=$_POST['grand']?>">
             <input type="hidden" name="cart_id" value="<?=$_POST['cartid']?>">
             <input type="hidden" name="description" value="<?=$_POST['itemcount']?>">
             <input type="hidden" name="ship_fee" value="<?=$_POST['ship']?>">
             <input type="hidden" name="sub_total" value="<?=$_POST['sub']?>">
                      <input type="hidden" name="sub_original" value="<?=$_POST['subog']?>">
             <input type="hidden" name="country" value="Philippines">
             <input type="hidden" name="prov" value="Zambales">
             <div class="row">
               <div class ="form-group col-md-6">
                 <label for="full_name">Full Name:</label>
                 <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Set Full Name" value="<?php echo $userq['Full_name']?>" required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="phone">Phone Number:</label>
                 <input class="form-control" id="phone" name="phone" type="text" value="<?php echo $userq['Customer_phone']?>" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  placeholder="Set Phone Number" required readonly>
               </div>
               <div class ="form-group col-md-6">
                 <label for="city">City:</label>
                 <input class="form-control" id="city" name="city" type="text"  value="Olongapo City" readonly required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="barangay">Barangay:</label>
                 <select class="form-control" id="barangay" name="barangay" type="text" required>
                <option selected hidden><?php echo $userq['Customer_barangay']?></option>
                 <option></option>
                <option>Asinan</option>
                <option>Banicain</option>
                <option>Barretto</option>
                <option>East Bajac-bajac</option>
                  <option>East Tapinac</option>
                      <option>Gordon Heights</option>
                          <option>Kalaklan</option>
                              <option>Mabayuan</option>
                                  <option>New Cabalan</option>
                                      <option>New Ilalim</option>
                                          <option>New Kababae</option>
                                              <option>New Kalalake</option>
                                                  <option>Old Cabalan</option>
                                                    <option>Pag-asa</option>
                                                      <option>Santa Rita</option>
                                                        <option>West Bajac-bajac</option>
                                                          <option>West Tapinac</option>
                </select>
               </div>
               <div class ="form-group col-md-6">
                 <label for="detail">Detailed Address:</label>
                 <input class="form-control" id="detail" name="detail" type="text" value="<?php echo $userq['Customer_address']?>" required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="zipcode">Zip Code:</label>
                 <input class="form-control" id="zipcode" name="zipcode" type="text" value="2200" readonly oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
               </div>
           </div>

           </div>
           <div class="card-footer">
             <div class="text-right">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="start"><i class="glyphicon glyphicon-file"></i> Summary</button>
             <button type="button" class="btn btn-danger" onclick="goBack()">Back</button>
             <button type="submit" class="btn btn-success" name="cod"><i class="glyphicon glyphicon-ok"></i> Check Out</button>
           </div>
           </div>
           </form>
        </div>
 </div>
      </div>
    </div>
<br>
<?php
  $items = json_decode($cart_data['Cart_items'], true);
 ?>
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title text-center w-100">Summary</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

              <legend>Payment</legend>
              <table class="table table-striped">
                <thead class="text-success">
                  <th>Summary</th>
                  <th></th>
                </thead>

                <tbody>
                  <?php
                    foreach ($items as $item) {
                      $product_id = $item['id'];
                      $productq = $db->query("SELECT * FROM products WHERE Product_id = '{$product_id}'");
                      $product = mysqli_fetch_assoc($productq);

                      ?>
                      <tr>
                        <td><?=$product['Product_name'];?></td>
                        <td>₱ <?=($product['Product_price'] * $item['quantity']);?></td>
                      </tr>
                      <?php
                      } ?>
                      <tr class="text-warning" style="background-color: #fff5cc;">
                        <td>Shipping Fee</td>
                          <td>₱ <?php echo $_POST['ship']?></td>
                      </tr>
                      <tr class="text-success" style="background-color: #d6f5d6;">
                        <td>Grand Total</td>
                          <td>₱ <?php echo $_POST['grand']?></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>

                    <legend>Shipping Address</legend>
                    <address>
                      <strong><label id="msg"></label></strong><br>

                      <p><span id="msg3"></span><br>
                      <span id="msg2"></span>, <span id="msg4"></span>, <span id="msg5"></span> <br>
                        <span>Zambales</span> <span id="msg7"></span>, <span>Philippines</span>
                      </p>
                    </address>
<!-- barangay city rmember -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

$("#start").click(function () {
$('#msg').html($('#full_name').val());
$('#msg2').html($('#detail').val());
$('#msg3').html($('#phone').val());
$('#msg4').html($('#barangay').val());
$('#msg5').html($('#city').val());
$('#msg7').html($('#zipcode').val());

  });

function goBack() {
  window.history.back();
}
$('#full_name').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
</script>
<?php
 include 'includes/footer.php';
  ?>
