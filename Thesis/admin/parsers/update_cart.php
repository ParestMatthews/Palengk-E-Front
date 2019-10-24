<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
  $mode = linis($_POST['mode']);
  $edit_id = linis($_POST['edit_id']);
  $cartq = $db->query("SELECT * FROM cart WHERE Cart_id='$cart_id'");
  $result = mysqli_fetch_assoc($cartq);
  $items = json_decode($result['Cart_items'] ,true);
  $updated_items = array();
  $domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$SERVER['HTTP_HOST']:false);

  if ($mode == 'remove'){
    foreach ($items as $item){
      if($item['id'] == $edit_id){
        $item['quantity'] = $item['quantity'] - 1;
      }
      if($item['quantity'] > 0){
        $updated_items[] = $item;
      }
    }
  }

  if ($mode == 'add'){
    foreach ($items as $item){
      if($item['id'] == $edit_id){
        $item['quantity'] = $item['quantity'] + 1;
      }
        $updated_items[] = $item;
    }
  }

  if(!empty($updated_items)){
    $json_updated = json_encode($updated_items);
    $db->query("UPDATE cart SET Cart_items = '{$json_updated}' WHERE Cart_id = '{$cart_id}' ");
  }

  if(empty($updated_items)){
    $db -> query("UPDATE cart SET Cart_items = '{}' WHERE Cart_id = '{$cart_id}'");
  }
?>
