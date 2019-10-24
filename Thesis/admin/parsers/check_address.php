<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
  $name = linis($_POST['full_name']);
  $phone = linis($_POST['phone']);
  $city = linis($_POST['city']);
  $barangay = linis($_POST['barangay']);
  $detail = linis($_POST['detail']);
  $zipcode = linis($_POST['zipcode']);


  $errors = array();
  $required = array(
    'full_name' => 'Full Name',
    'phone' => 'Phone',
    'city' => 'City',
    'barangay'=> 'Barangay',
    'detail' => 'Detail',
    'zipcode' => 'Zip Code'
   );

//validation

foreach ($required as $field => $display) {
  if(empty($_POST[$field]) || $_POST[$field]==''){
    $errors[] = $display.' is required.';
  }
}



  if(!empty($errors)){
    echo display_errors($errors);
  }else if(empty($errors)){
    echo true;
  }
