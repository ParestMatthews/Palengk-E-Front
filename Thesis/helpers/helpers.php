<?php
ob_start();
function display_errors($errors){
  $display = '<ul>';
  foreach ($errors as $error) {
    $display .= '<li class="text-danger">'.$error.'</li>';
  }
  $display .='</ul>';
  return $display;
}
function linis($wrong){
  return htmlentities($wrong, ENT_QUOTES, "UTF-8");
}
function prices($number){
  return '₱'.number_format($number,2);
}
function login($user_id){
  $_SESSION['SBUser'] = $user_id;
  global $db;
  $date = date("Y-m-d H:i:s");
  $db->query("UPDATE users SET User_login = '$date' WHERE User_id = '$user_id' ");
  header('Location: index.php');
}
function login_customer($customer_id){
  $_SESSION['SBCustomer'] = $customer_id;
  global $db;
  $date = date("Y-m-d H:i:s");
  $db->query("UPDATE customers SET Customer_login = '$date' WHERE Customer_id = '$customer_id' ");
  header('Location: index.php');
}
function is_logged_in(){
  if(isset($_SESSION['SBUser']) && $_SESSION['SBUser'] > 0){
    return true;
  }
  return false;
}
function is_logged_in_customer(){
  if(isset($_SESSION['SBCustomer']) && $_SESSION['SBCustomer'] > 0){
    return true;
  }
  return false;
}
function login_error_redirect($url = 'login.php'){
  header('Location: '.$url);
}
function permission_error_redirect($url = 'login.php'){
  header('Location: '.$url);
}
function permission($permission = 'admin'){
  global $user_data;
    $permissionx = explode(',', $user_data['User_permission']);
    if(in_array($permission,$permissionx, true)){
      return true;
    }
    return false;
}
function revised_date($date){
  return date("M d,Y h:i A", strtotime($date));
}
