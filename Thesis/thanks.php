<?php
require_once 'system/initialize.php';
if(!is_logged_in_customer()){
  login_error_redirect();
}
include 'includes/home.php';
include 'includes/sidebar.php';
?>
<?php
if ($_POST){

  $errors= array();

  $cartq = $db->query("SELECT * FROM cart WHERE Cart_id = '{$cart_id}'");
  $cartquery = mysqli_fetch_assoc($cartq);
  $items = json_decode($cartquery['Cart_items'],true);
  $size = sizeof($items);
  $idArray = array();
  $quantity = array();


  foreach($items as $item){
    $idArray[] = $item['id'];
    $quantity[] = $item['quantity'];
  }

  for($i=0; $i < $size; $i++){
    $counter = $idArray[$i];
    $proq = $db->query("SELECT * FROM products WHERE Product_id = '$counter' ");
    $productq = mysqli_fetch_assoc($proq);
    if($quantity[$i] > $productq['Product_quantity']){
        $errors[] = 'There is '.$productq['Product_quantity'].' Available: '. $productq['Product_name'];
    }
  }
  if(!empty($errors)){
    echo '<br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
                    <div class="card-header text-center text-danger"  style="background-color: #ffb3b3;" ><i class="glyphicon glyphicon-exclamation-sign"></i> Product Quantity Error!</div>
                            <div class="card-body">';
                              echo display_errors($errors);
                              echo '
                              </div>
                              <div class="card-footer text-right">
                                <a href="cart.php" class="btn btn-danger"><i class="glyphicon glyphicon-shopping-cart"></i> Return to Cart</a>
                              </div>
                               </div>
                               </div>
                               </div>
                               </div>';
  }else{



if(isset($_POST['cod'])){
$full_name = linis($_POST['full_name']);
$phone = linis($_POST['phone']);
$city = linis($_POST['city']);
$barangay = linis($_POST['barangay']);
$address = linis($_POST['detail']);
$zipcode = linis($_POST['zipcode']);
$sub_original = linis($_POST['sub_original']);
$grand_total = linis($_POST['grand_total']);
$cart_id = linis($_POST['cart_id']);
$description = linis($_POST['description']);
$country = linis($_POST['country']);
$prov = linis($_POST['prov']);
$sub_total = linis($_POST['sub_total']);
$chargecodid = 'CoD_XsRd'.rand(0,100000000).'hgYtDg'.rand(0,1000000000);
$metadata = array(
  "cart_id" => $cart_id,
);

$itemQ = $db->query("SELECT * FROM cart WHERE Cart_id = '{$cart_id}'");
$iresults = mysqli_fetch_assoc($itemQ);
$raw = $iresults["Cart_items"];
$items = json_decode($iresults['Cart_items'],true);
	$itemcount = 0;
foreach($items as $item){
  $item_id = $item['id'];
    $item_quantity = $item['quantity'];
	$itemcount += $item_quantity;
  $productQ = $db->query("SELECT Product_quantity FROM products WHERE Product_id = '{$item_id}'");
  $product = mysqli_fetch_assoc($productQ);
}
$newquantity = $product['Product_quantity'] - $item_quantity;
$db->query("UPDATE products SET Product_quantity='{$newquantity}' WHERE Product_id = '{$item_id}'");
$db->query("INSERT INTO transactions
(Charge_id,Cart_id,Transaction_fullname,Transaction_phone,Transaction_province,Transaction_city,Transaction_barangay,Transaction_address,Transaction_country,Transaction_zipcode,Transaction_origtotal, Transaction_subtotal, Transaction_grandtotal,Transaction_items,Transaction_description,Transaction_type,Transaction_paid) VALUES
  ('$chargecodid','$cart_id','$full_name',$phone,'$prov','$city','$barangay','$address','$country','$zipcode','$sub_original','$sub_total','$grand_total','$raw','$description','COD','0')");
$db->query("UPDATE cart SET Cart_items= '{}' WHERE cart_id = {$cart_id} ");
  $domain = ($_SERVER['HTTP_HOST'] != 'localhost')? '.'.$_SERVER['HTTP_HOST']:false;

 ?>
 <br>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
                 <div class="card-header text-center text-success">Thank you!</div>
                         <div class="card-body">
   <p> You will be charged with ₱ <?=$grand_total?>.</p>
   <p>
		Total Number of items: <?php echo $itemcount;?>
   </p>
   <p>Your receipt number is: <strong><?=$chargecodid?></strong></p>
   <address>
     <strong><?=$full_name?></strong><br>
     <?=$phone?><br>
     <?=$address.", ".$barangay.", ".$city;?><br>
     <?=$prov." ".$zipcode.", ".$country;?>
   </address>
 </div>
 </div>
 </div>
 </div>
 </div>
 <?php
}
}
}
   ?>
