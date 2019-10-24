<?php
require_once 'system/initialize.php';
if(!is_logged_in_customer()){
  login_error_redirect();
}
include 'includes/home.php';
include 'includes/nav.php';

$totalinfo = $db->query("SELECT * FROM customers WHERE Customer_id = {$customer_id}");
$userq = mysqli_fetch_assoc($totalinfo);
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading"><i class="glyphicon glyphicon-pencil"></i> Payment Method: Credit Card</div>
        <div class="panel-body">
            <form action="thanks.php" method="post" id="payment-form" name="form">
               <legend>Shipping Address</legend>
             <input type="hidden" name="grand_total" value="<?=$_POST['grand']?>">
             <input type="hidden" name="cart_id" value="<?=$_POST['cartid']?>">
             <input type="hidden" name="description" value="<?=$_POST['itemcount'] ?>">
             <input type="hidden" name="ship_fee" value="<?=$_POST['ship']?>">
             <input type="hidden" name="sub_total" value="<?=$_POST['sub']?>">
                 <input type="hidden" name="sub_original" value="<?=$_POST['subog']?>">
             <input type="hidden" name="country" value="Philippines" data-stripe="address_country">
             <input type="hidden" name="prov" value="Zambales" data-stripe="address_state">
               <div class ="form-group col-md-6">
                 <label for="full_name">Full Name:</label>
                 <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Set Full Name" value="<?php echo $userq['Full_name']?>" required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="phone">Phone Number:</label>
                 <input class="form-control" id="phone" name="phone" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  placeholder="Set Phone Number" value="<?php echo $userq['Customer_phone']?>"required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="city">City:</label>
                 <input class="form-control" id="city" name="city" type="text" data-stripe="address_city" value="Olongapo City" readonly required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="barangay">Barangay:</label>
                 <select class="form-control" id="barangay" name="barangay" type="text" data-stripe="address_line2" required>
                   <option selected disabled hidden><?php echo $userq['Customer_barangay']?></option>
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
                 <input class="form-control" id="detail" name="detail" type="text" data-stripe="address_line1" value="<?php echo $userq['Customer_address']?>" required>
               </div>
               <div class ="form-group col-md-6">
                 <label for="zipcode">Zip Code:</label>
                 <input class="form-control" id="zipcode" name="zipcode" type="text" data-stripe="address_zip" value="2200" readonly oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
               </div>
                <legend>Credit Card Information</legend>
               <div class="form-group col-md-3">
               <label for ="name">Name of Card: </label>
               <input type="text" id="name" class="form-control" data-stripe="name">
              </div>
               <div class="form-group col-md-3" id="card-element" >
               <label for ="number">Card Number: </label>
               <input type="text" id="number" class="form-control" data-stripe="number" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="16">
             </div>
             <div class="form-group col-md-2">
             <label for ="cvc">CVC: </label>
             <input type="text" id="number" class="form-control" data-stripe="cvc" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="3">
           </div>
               <div class="form-group col-md-2">
               <label for ="name">Expire Month:</label>
               <select id="exp-month" class="form-control" data-stripe="exp_month">
                 <option value=""></option>
                 <?php for($i=1;$i < 13 ; $i++): ?>
                   <option value="<?php echo $i;?>"><?php echo $i;?></option>
                 <?php endfor; ?>
               </select>
             </div>
               <div class="form-group col-md-2">
               <label for ="exp-year">Expire Year: </label>
               <select id="exp-year" class="form-control" data-stripe="exp_year">
                 <option value=""></option>
                 <?php
                 $yr = date("Y");
                 ?>
                 <?php for($i=0;$i < 11; $i++): ?>
                   <option value="<?=$yr + $i?>"><?=$yr + $i?></option>
                 <?php endfor; ?>
               </select>
             </div>
   <span class="text-danger" id="payment-errors"></span>
           </div>
             <div class="panel-footer text-right">
               <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="start"><i class="glyphicon glyphicon-file"></i> Summary</button>
              <button type="button" class="btn btn-danger" onclick="goBack()">Back</button>
              <button type="submit" class="btn btn-success" name="credit"><i class="glyphicon glyphicon-ok"></i> Check out</button>
             </div>
           </form>
        </div>
 </div>
      </div>
    </div>

    <?php
      $items = json_decode($cart_data['Cart_items'], true);
     ?>
        <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Summary</h4>
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
                          <tr class="text-warning">
                            <td class="bg-warning">Shipping Fee</td>
                              <td class="bg-warning">₱ <?php echo $_POST['ship']?></td>
                          </tr>
                          <tr class="text-success">
                            <td class="bg-success">Grand Total</td>
                              <td class="bg-success">₱ <?php echo $_POST['grand']?></td>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

$('#name').keypress(function (e) {
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
Stripe.setPublishableKey('<?=STRIPE_PUBLIC;?>');

function stripeResponseHandler(status, response){
    var $form = $('#payment-form');
    if(response.error){
      $form.find('#payment-errors').text(response.error.message);
      $form.find('button').prop('disabled', false);
    } else{
      // respones contains id and card, which contains additional card details
      var token = response.id;
      // insert the token into the form so it gets submitted to the server
      $form.append($('<input type="hidden" name="stripeToken">').val(token));
      // add submit
      $form.get(0).submit();
    }
}

$(function($){
    $('#payment-form').submit(
      function(event){
        var $form = $(this);
        // disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken($form, stripeResponseHandler);
        // prevent form from submitting with the default action
        return false;
    });
});


</script>

<?php
 include 'includes/footer.php';
  ?>
