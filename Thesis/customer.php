<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(is_logged_in_customer()){
  header('Location: index.php');
}
require_once "vendor/autoload.php";
include 'includes/home.php';
include 'includes/sidebar.php';
$email = ((isset($_POST['email']))?linis($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?linis($_POST['confirm']):'');
$confirm = trim($confirm);
$first = ((isset($_POST['firstname']))?linis($_POST['firstname']):'');
$first = trim($first);
$last = ((isset($_POST['lastname']))?linis($_POST['lastname']):'');
$last = trim($last);
$phone = ((isset($_POST['phone']))?linis($_POST['phone']):'');
$phone = trim($phone);
$address = ((isset($_POST['detail']))?linis($_POST['detail']):'');
$address = trim($address);
$barangay = ((isset($_POST['barangay']))?linis($_POST['barangay']):'');
$barangay = trim($barangay);



?>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
<div id="login-form">
<h2 class="text-center" style="color:black;   text-shadow: 0px 0 black, 0 0px black, 0px 0 black, 0 0px black;">Create new Account</h2><hr>
<div>
  <?php
    $errors = array();
    $emailquery = $db->query("SELECT * FROM customers WHERE Customer_email = '$email'");
    $emailcount = mysqli_fetch_assoc($emailquery);
    if($_POST){
      //validte pag pindot
      $required = array('firstname','lastname', 'email', 'password', 'confirm' , 'phone', 'barangay' , 'detail');
      foreach ($required as $f) {
        if(empty($_POST[$f])){
        $errors[] = 'You must fill out all fields';
        break;
        }
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'You must enter a valid email';
      }
      // pass 6 chars
      if(strlen($password) < 6){
        $errors[] = 'Password must be atleast 6 characters';
      }
      if($password != $confirm){
        $errors[] = 'Your Passwords do not match';
      }
      if($emailcount != 0){
        $errors[] = 'Email already exists';
      }
      if(strlen($phone) > 11){
        $errors[] = 'Enter a valid number';
      }
      if(strlen($phone) < 11){
        $errors[] = 'Enter a valid number';
      }
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

        $fullname = $first. ' '.$last;
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $str = substr($phone, 1);
        $str = '63'.$str;
        $db->query("INSERT INTO customers (Full_name, Customer_email, Customer_password, Customer_phone, Customer_barangay, Customer_address, Customer_photo) VALUES ('$fullname', '$email', '$hashed', '$str', '$barangay', '$address' ,'$dbpath')");
        $getdb = $db->query("SELECT * FROM customers WHERE Customer_email = '$email'");
        $logindb = mysqli_fetch_assoc($getdb);
        $customer_id = $logindb['Customer_id'];
          $db->query("INSERT INTO cart (Cart_id, Cart_items, Customer_id) VALUES ('$customer_id', '{}', '$customer_id')");
        login_customer($customer_id);
      }
    }
  ?>
</div>
<form action="customer.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="firstname">First Name: </label>
    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $first;?>">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name: </label>
    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $last;?>">
  </div>
  <div class="form-group">
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email;?>">
  </div>
  <div class="form-group">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password;?>" placeholder="Must contain 6 or more characters">
  </div>
  <div class="form-group">
    <label for="confirm">Confirm Password: </label>
    <input type="password" name="confirm" id="confirm" class="form-control" value="<?php echo $confirm;?>">
  </div>
  <div class="form-group">
    <label for="phone">Phone Number: </label>
    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone;?>" placeholder='Enter an 11 digit number' oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
  </div>
  <div class ="form-group">
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

  <div class ="form-group">
    <label for="detail">Detailed Address:</label>
    <input class="form-control" id="detail" name="detail" type="text" value="<?php echo $address;?>">
  </div>

  <div class ="form-group">
  <label for="photo">Your Personal Picture:</label>
  <input type="file" name="photo" id="photo" class="form-inline">
</div>

<div class ="form-group">
<input type="checkbox" id="checkme"> I have read, understood, and agreed with the <a href="tos.php" target="_blank">Terms of Service</a>
</div>


  <div class="row">
    <div class="col-md-6 col-xs-6">
  <div class="form-group float-left">
      <a href="login.php">Already have an account?</a><br>
    </div>
  </div>

    <div class="col-md-6 col-xs-6">
          <div class="form-group text-right">
    <input type="submit" value="Create" id="submitbtn" class="btn btn-success">
  </div>
    </div>

</div>
</form>

</div>
</div>
</div>
</div>

<script>
$('#firstname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });

$('#lastname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        return false;
        }
    });
  var checker = document.getElementById('checkme');
 var sendbtn = document.getElementById('submitbtn');
 checker.onchange = function(){
if(this.checked){
    sendbtn.disabled = false;
} else {
    sendbtn.disabled = true;
}

}
</script>
  <?php
  include 'includes/footer.php'
   ?>
