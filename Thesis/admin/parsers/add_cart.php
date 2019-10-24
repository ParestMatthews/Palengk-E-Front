<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
  $product_id = linis($_POST['product_id']);
  $stock = linis($_POST['stock']);
  $quantity = linis($_POST['quantity']);
$old = linis($_POST['old']);
$new = linis($_POST['new']);


  $items = array();
  $item[] =array(
    'id' => $product_id,
    'quantity' => $quantity,
    'old price' => $old,
    'new price' => $new,
  );

  $domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false);
  $query = $db -> query("SELECT * FROM products WHERE Product_id = '{$product_id}' ");
  $product = mysqli_fetch_assoc($query);
  $_SESSION['success_flash'] = $product['Product_name']. ' is added to your cart.';

  //check db cart exist

  if($cart_id != ''){
    $cartq = $db->query("SELECT * FROM cart WHERE Cart_id = '{$cart_id}' ");
    $cart = mysqli_fetch_assoc($cartq);
    $previous_items = json_decode($cart['Cart_items'],true);
    $item_match = 0;
    $new_items = array();

    foreach($previous_items as $pitem){
      if ($item[0]['id'] == $pitem['id']){
        $pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];
        if($pitem['quantity'] > $stock){
          $pitem['quantity'] = $stock;
        }
        $item_match = 1;
      }
      $new_items[] = $pitem;
    }

    if($item_match != 1){
    $new_items = array_merge($item,$previous_items);
    }
    $items_json = json_encode($new_items);
    $db->query("UPDATE cart SET Cart_items = '{$items_json}' WHERE Cart_id = '{$cart_id}' ");
}
