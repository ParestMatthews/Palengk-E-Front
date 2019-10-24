<?php
date_default_timezone_set("Asia/Manila");
$db = mysqli_connect('localhost','root','','thesisdatabase');
if(mysqli_connect_errno())
{
  echo 'Database connection failed with following errors:  '. mysqli_connect_error();
die();
}
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/config.php';
require_once BASEURL.'/helpers/helpers.php';
if(isset($_SESSION['SBUser'])){
  $user_id = $_SESSION['SBUser'];
  $query = $db->query("SELECT * FROM users WHERE User_id ='$user_id'");
  $user_data = mysqli_fetch_assoc($query);
  $fullname = explode(' ', $user_data['Full_name']);
  $user_data['first'] = $fullname[0];
  $user_data['last'] = $fullname[1];
}
if(isset($_SESSION['SBCustomer'])){
  $customer_id = $_SESSION['SBCustomer'];
  $queryx = $db->query("SELECT * FROM customers WHERE Customer_id ='$customer_id'");
  $customer_data = mysqli_fetch_assoc($queryx);
  $fullname = explode(' ', $customer_data['Full_name']);
  $customer_data['first'] = $fullname[0];
  $customer_data['last'] = $fullname[1];

  $queryz = $db->query("SELECT * FROM cart WHERE Cart_id ='$customer_id'");
  $cart_data = mysqli_fetch_assoc($queryz);
  $cart_id = $cart_data['Cart_id'];
}
