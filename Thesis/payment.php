<?php
$rad = $_POST['rad'];

switch($rad){

case '1':
include "cod.php";
break;

case '2':
include "credit.php";
break;

default:
// show form again or something
}

?>
