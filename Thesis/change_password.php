<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in_customer()){
  login_error_redirect();
}
include 'includes/home.php';
include 'includes/sidebar.php';
include 'includes/popup.php';
$hashed = $customer_data['Customer_password'];
$old_password = ((isset($_POST['old_password']))?linis($_POST['old_password']):'');
$old_password = trim($old_password);
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?linis($_POST['confirm']):'');
$confirm = trim($confirm);

$phone = ((isset($_POST['phone']))?linis($_POST['phone']):'');
$phone = trim($phone);

$barangay = ((isset($_POST['barangay']))?linis($_POST['barangay']):'');
$barangay = trim($barangay);

$detail = ((isset($_POST['detail']))?linis($_POST['detail']):'');
$detail = trim($detail);

$new_hashed = password_hash($password, PASSWORD_DEFAULT);
$customer_id = $customer_data['Customer_id'];
$errors = array();
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
<div id="login-form">
  <div>

  </div>

<legend>Change User Details</legend>
<?php
  if(isset($_POST['submit1'])){
    //validte pag pindot
    if(empty($_POST['phone']) || empty($_POST['barangay']) || empty($_POST['detail'])){
      $errors[] = 'You must fill all fields';
    }
    if(strlen($phone) > 11){
      $errors[] = 'Enter a valid number';
    }
    if(strlen($phone) < 11){
      $errors[] = 'Enter a valid number';
    }
      //display error
    if(!empty($errors)){
      echo display_errors($errors);
    }else{
      $str = substr($phone, 1);
      $str = '63'.$str;
      $db ->query("UPDATE customers SET Customer_phone='$str',Customer_barangay='$barangay',Customer_address='$detail' WHERE Customer_id = '$customer_id' ");
      $_SESSION['success_flash'] = "Your Information has been updated";
      header('Location: change_password.php');
    }

  }
?>
<form action="change_password.php" method="post">

  <div class="form-group">
    <label for="phone">Phone Number: </label>
    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone;?>" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
  </div>

  <div class="form-group">
    <label for="barangay">Barangay: </label>
    <select class="form-control" id="barangay" name="barangay" type="text" value="<?php echo $barangay;?>">
    <option></option>
   <option>Asinan</option>
   <option>Banicain</option>
   <option>Barretto</option>
   <option>East Bajac-bajac</option>
     <option>East Tapinac</option>
         <option>Gordon Heights</option>
             <option>Kalaklan</option>
                 <option>Mabayuan</option>
                     <option>New Cabalan</option>
                         <option>New Ilalim</option>
                             <option>New Kababae</option>
                                 <option>New Kalalake</option>
                                     <option>Old Cabalan</option>
                                       <option>Pag-asa</option>
                                         <option>Santa Rita</option>
                                           <option>West Bajac-bajac</option>
                                             <option>West Tapinac</option>
   </select>
  </div>

  <div class="form-group">
    <label for="detail">Detailed Address: </label>
    <input type="text" name="detail" id="detail" class="form-control" value="<?php echo $detail?>">
  </div>

  <div class="form-group text-right">
    <button type="submit" name="submit1" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
  </div>

</form>


  <legend>Change Password</legend>
  <?php
    if(isset($_POST['submit2'])){
      //validte pag pindot
      if(empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['confirm'])){
        $errors[] = 'You must fill all fields';
      }

      //if new and old r da Same
      if($password != $confirm){
        $errors[] = 'New Password & Confirm New Password doesn\'t match';
      }

      // pass 6 chars
      if(strlen($password) < 6){
        $errors[] = 'New Password must be atleast 6 characters';
      }


      if(!password_verify($old_password, $hashed)){
          $errors[] = 'Old Password doesn\'t exist';
        }

      //display error
      if(!empty($errors)){
        echo display_errors($errors);
      }else{
        //change pass
        $db ->query("UPDATE customers SET Customer_password='$new_hashed' WHERE Customer_id = '$customer_id' ");
        $_SESSION['success_flash'] = "Your Password has been updated";
        header('Location: change_password.php');
      }

    }
  ?>
  <form action="change_password.php" method="post" name="postpass">

    <div class="form-group">
      <label for="old_password">Old Password: </label>
      <input type="password" name="old_password" id="old_password" class="form-control" value="<?php echo $old_password;?>">
    </div>

    <div class="form-group">
      <label for="password">New Password: </label>
      <input type="password" name="password" id="password" class="form-control" value="<?php echo $password;?>">
    </div>

    <div class="form-group">
      <label for="confirm">Confirm New Password: </label>
      <input type="password" name="confirm" id="confirm" class="form-control" value="<?php echo $confirm;?>">
    </div>

    <div class="form-group text-right">
      <button type="submit" name="submit2" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
    </div>
  </form>



<legend>Change Personal Photo</legend>
<?php
  $saved_image = '';
if(isset($_GET['delete_image'])){
  $image_url = $_SERVER['DOCUMENT_ROOT'].$customer_data['Customer_photo'];
  echo $image_url;
  unlink($image_url);
  $cid = $customer_data["Customer_id"];
  $db->query("UPDATE customers SET Customer_photo = '' WHERE Customer_id = '$cid' ");
  header('Location: change_password.php');
}
$saved_image = (($customer_data['Customer_photo'] != '')?$customer_data['Customer_photo']:'');
$dbpath = $saved_image;

  if(isset($_POST['submit3'])){
if($_FILES['photo']['name'] == ''){
        $errors[] = 'Please Upload a photo';
}
if($_FILES['photo']['name'] != ''){

  // etong code na to nilalabas ung photo upload process (not needed)
  $photo = $_FILES['photo'];
  $name = $photo['name'];
  $nameArray = explode('.',$name);
  $fileName = $nameArray[0];
  $fileExt = $nameArray[1];
  $mime = explode('/', $photo['type']);
  $mimeType = $mime[0];
  $mimeExt = $mime[1];
  $tmpLoc = $photo['tmp_name'];
  $fileSize = $photo['size'];
  $allowed = array('png', 'jpg', 'jpeg', 'gif');
  $uploadName = md5(microtime()).'.'.$fileExt;
  $uploadPath = BASEURL.'images/'.$uploadName;
  $dbpath = '/Thesis/images/'.$uploadName;

  if ($mimeType != 'image'){
    $errors[] = 'The file must be an image.';
  }

  if (!in_array($fileExt, $allowed)){
    $errors[] = 'The photo must be a png, jpg, jpeg, or gif';
  }

  if($fileSize > 25000000){
    $errors[] = 'The files size must be under 25mb';
  }

}
//display error
if(!empty($errors)){
  echo display_errors($errors);
}else{
  //log in  $hashed = password_hash($password, PASSWORD_DEFAULT);
  if(!empty($_FILES)){
  move_uploaded_file($tmpLoc, $uploadPath);
  }
  $cidx = $customer_data["Customer_id"];
  $db->query("UPDATE customers SET Customer_photo='$dbpath' WHERE Customer_id = '$cidx' ");
}
}
?>
  <form action="change_password.php" method="post" enctype="multipart/form-data">
    <?php if($saved_image != ''): ?>
      <div class="saved-image"><img src="<?php echo $saved_image?>" alt="saved image">
        <br/>
        <br/>
        <a href="change_password.php?delete_image=<?=$customer_data['Customer_id'];?>" class="btn btn-danger">Delete Image</a>
        <br/>
        <br/>
      </div>
    <?php else: ?>
    <label for="photo">Product Image: </label>
    <input type="file" name="photo" id="photo" class="form-inline">
    <?php endif; ?>
    <div class="form-group text-right">
      <button type="submit" name="submit3" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
    </div>
  </form>
  <div class="form-group text-right">
  <a href="index.php" class="btn btn-danger">Cancel</a>
</div>

</div>
</div>
</div>
</div>
<?php
include 'includes/footer.php'
 ?>
