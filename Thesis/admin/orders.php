<?php
  require_once '../system/initialize.php';
  require_once "../vendor/autoload.php";
  if(!is_logged_in()){
    header('Location login.php');
  }
  if(permission('admin')){
    permission_error_redirect('index.php');
  }
  include 'includes/header.php';
  include 'includes/sidebar.php';



  $trans_id = linis((int)$_GET['trans_id']);
  $transq = $db->query("SELECT * FROM transactions WHERE Transaction_id = '{$trans_id}'");
  $trans = mysqli_fetch_assoc($transq);
  //not suppose to be in cart, add json string in transaction *remember*
    $phonenumber  = $trans['Transaction_phone'];
  $items = json_decode($trans['Transaction_items'],true);
  $idArray = array();
  $quantity = array();
  $old = array();
  $new = array();

  foreach($items as $item){
    $idArray[] = $item['id'];
    $quantity[] = $item['quantity'];
    $old[] = $item['old price'];
    $new[] = $item['new price'];
  }


  $ids = implode(',' , $idArray);
  $productq = $db->query(
    "SELECT i.Product_id as 'Product_id', i.Product_name as 'Product_name', c.Category_id as 'Category_id', c.Category_name as 'Category_name'
    FROM products i
    LEFT JOIN categories c ON i.Product_category = c.Category_id
    WHERE i.Product_id IN ({$ids})
    ");

    while($p = mysqli_fetch_assoc($productq)){

      foreach($items as $item){
        if($item['id'] == $p['Product_id']){
          $x = $item;
          continue;
        }
      }
      $products[] = array_merge($x,$p);
    }

    //complete button
    if (isset($_GET['complete']) && $_GET['complete'] == 1){
      var_dump($phonenumber);
      $basic  = new \Nexmo\Client\Credentials\Basic('5377a7f0', 'VuHFBNG7TQyzcANF');
      $client = new \Nexmo\Client($basic);

      $message = $client->message()->send([
        'to' => $phonenumber,
        'from' => 'Palengk-E',
        'text' => 'Your order has been shipped, please wait until your order is delivered. -Palengk-E'
      ]);
      $db -> query("UPDATE transactions SET Transaction_shipped = 1 WHERE Transaction_id = '{$trans_id}'");
      header('Location: index.php');
    }

 ?>
 <br>
<div class="container">
  <div class="row">
<div class="col-md-12">
        <div class="card">
          <div class="card-header text-success text-center">Items Ordered</div>
  <div class="card-body">

<legend>User Picture</legend>
<img class="imgsize" src="<?php $picture = $trans['Cart_id']; $profile = $db->query("SELECT * FROM customers WHERE Customer_id = '{$picture}'");
$picturequery = mysqli_fetch_assoc($profile);
echo $picturequery['Customer_photo'];
?>" alt="image"/>
<br>
<br>
<legend>Items</legend>
<div class="table-responsive">
<table class="table table-striped">
  <thead class="text-success">
    <th>Quantity</th>
    <th>Product</th>
    <th>Category</th>
        <th>Regular Price</th>
    <th>New Price</th>

    <th>Total Price</th>
  </thead>
  <tbody>
    <?php foreach($products as $product): ?>
      <tr>
      <td><?=$product['quantity']?></td>
      <td><?=$product['Product_name']?></td>
      <td><?=$product['Category_name']?></td>
      <td>₱ <?=$product['old price']?></td>
        <td>₱ <?=$product['new price']?></td>
      <?php
      $totality = $product['new price'] * $product['quantity'];
      ?>
        <td>₱ <?=$totality?></td>
  </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<br>
<div class="row">
  <div class="col-md-6">
<legend>Order Details</legend>
    <table class="table table-striped">
      <thead class="text-success">
        <th>Summary</th>
        <th></th>
      </thead>
      <tbody>
        <tr>
          <td>Sub Total</td>
          <td>₱ <?php echo $trans['Transaction_subtotal']?></td>
        </tr>
        <tr>
          <td>Shipping Fee</td>
          <?php
          $difference = $trans['Transaction_grandtotal'] - $trans['Transaction_subtotal'];
          ?>
          <td>₱ <?php echo $difference?></td>
        </tr>
        <tr>
          <td>Grand Total</td>
          <td>₱ <?=$trans['Transaction_grandtotal']?></td>
        </tr>
        <tr>
          <td>Order Date</td>
          <td><?=revised_date($trans['Transaction_date'])?></td>
        </tr>
      </tbody>
    </table>
  </div>

<div class="col-md-6">
<legend>Shipping Address</legend>
  <address>
    <strong><?=$trans['Transaction_fullname']?></strong><br>
    <?=$trans['Transaction_address'].", ".$trans['Transaction_barangay'].", ".$trans['Transaction_city'];?><br>
    <?=$trans['Transaction_province']." ".$trans['Transaction_zipcode'].", "?><br>
    <?=$trans['Transaction_country'];?>
  </address>
</div>
</div>



</div>
<div class="card-footer">
<div class="text-right">
  <a href="index.php" class="btn btn-large btn-danger">Cancel</a>
  <a href="orders.php?complete=1&trans_id=<?=$trans_id?>" class="btn btn-success btn-large">Ship Order</a>
</div>
</div>
</div>
</div>
</div>

</div>
<br>
<?php
  include 'includes/footer.php';
 ?>
