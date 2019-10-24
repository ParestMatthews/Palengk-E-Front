<?php
if(isset($_SESSION['success_flash'])){
  echo '
  <br>
  <div class="container">
  <div class="row">
  <div class="col-md-12 border-success" style="height:50px; background-color: #d6f5d6; border-radius: 10px;
  border-style: solid;
  border-width: 3px;
  box-shadow: 7px 7px 15px rgba(0,0,0,0.6);" id="closediv">
  <p class="text-success text-center"  style="padding:10px; font-size: 18px;">
  '.$_SESSION['success_flash'].'
  <span class="float-right">
     <a href="" class="close-div"><span class="glyphicon glyphicon-remove text-success"></span></a>
  </span>
  </p>
  </div>
  </div>
  </div>
  ';
  unset($_SESSION['success_flash']);
}
// if(isset($_SESSION['error_flash'])){
//   echo '
//   <div class="container">
//   <div class="row">
//   <div class="col-md-12 bg-danger cartemp" style="height:20px;" id="closediv">
//   <p class="text-danger text-center">
//   '.$_SESSION['error_flash'].'
//   <span class="pull-right">
//      <a href="" class="close-div"><span class="glyphicon glyphicon-remove text-danger"></span></a>
//   </span>
//   </p>
//   </div>
//   </div>
//   </div>
//   ';
//   unset($_SESSION['error_flash']);
// }
