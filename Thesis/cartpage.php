<?php
require_once 'system/initialize.php';
if(!is_logged_in_customer()){
  header('Location: login.php');
}

include 'includes/home.php';
include 'includes/nav.php';
?>


<?php
include 'includes/footer.php';
?>
