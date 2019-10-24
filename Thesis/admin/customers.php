<?php
require_once '../system/initialize.php';

if(!is_logged_in()){
  login_error_redirect();
}

if(!permission('admin')){
  permission_error_redirect('index.php');
}

include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/popup.php';
if(isset($_GET['delete'])){
  $delete_id = linis($_GET['delete']);
  $db->query("UPDATE customers SET Deleted = 1 WHERE Customer_id = '$delete_id'");
}

if(isset($_GET['add']) || isset($_GET['edit'])){
$name = ((isset($_POST['name']))?linis($_POST['name']):'');
$email = ((isset($_POST['email']))?linis($_POST['email']):'');
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$confirm = ((isset($_POST['confirm']))?linis($_POST['confirm']):'');
$permissions = ((isset($_POST['permissions']))?linis($_POST['permissions']):'');
$phone = ((isset($_POST['phone']))?linis($_POST['phone']):'');
$barangay = ((isset($_POST['barangay']))?linis($_POST['barangay']):'');
$detail = ((isset($_POST['detail']))?linis($_POST['detail']):'');
$errors = array();

if(isset($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $userresults = $db->query("SELECT * FROM customers WHERE Customer_id='$edit_id'");
$user= mysqli_fetch_assoc($userresults);

$name = ((isset($_POST['name']) && !empty($_POST['name']))?linis($_POST['name']):$user['Full_name']);
$email = ((isset($_POST['email']) && !empty($_POST['email']))?linis($_POST['email']):$user['Customer_email']);
$phone = ((isset($_POST['phone']) && !empty($_POST['phone']))?linis($_POST['phone']):$user['Customer_phone']);
$barangay = ((isset($_POST['barangay']) && !empty($_POST['barangay']))?linis($_POST['barangay']):$user['Customer_barangay']);
$detail = ((isset($_POST['detail']) && !empty($_POST['detail']))?linis($_POST['detail']):$user['Customer_address']);


}
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
  <div class="card-header text-center text-success">
<i class="glyphicon glyphicon-user"></i>
    <?= ((isset($_GET['edit']))?'Edit ':'Add new');?> Customer</div>
<br>
<div class="card-body">
  <?php
  if (isset($_POST['sub'])){
    $emailquery = $db->query("SELECT * FROM customers WHERE Customer_email = '$email'");
    $emailcount = mysqli_fetch_assoc($emailquery);


  if (isset($_GET['edit'])){

  }
  else{
    if($emailcount != 0){
      $errors[] = 'Email already exists';
    }
  }
    $required = array('name', 'email', 'password', 'confirm', 'detail', 'phone', 'barangay');
    foreach ($required as $f) {
      if(empty($_POST[$f])){
      $errors[] = 'You must fill out all fields';
      break;
      }
    }

    if(strlen($password) < 6){
      $errors[] = 'Your Password must be at least 6 characters';
    }

    if($password != $confirm){
      $errors[] = 'Your Passwords do not match';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors[] = 'You must enter a valid email';
    }
    if(strlen($phone) > 11){
      $errors[] = 'Enter a valid number';
    }
    if(strlen($phone) < 11){
      $errors[] = 'Enter a valid number';
    }

    if(!empty($errors)){
      echo display_errors($errors);
    }else{

      if (isset($_GET['edit'])){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $str = substr($phone, 1);
        $str = '63'.$str;
        $db->query("UPDATE customers SET Full_name = '$name', Customer_email = '$email', Customer_password ='$hashed', Customer_phone = '$str', Customer_barangay = '$barangay', Customer_address = '$detail' WHERE Customer_id = '$edit_id'");
        $_SESSION['success_flash'] = 'Customer has been updated';
        header('Location: customers.php');
    }
    else{
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $str = substr($phone, 1);
      $str = '63'.$str;
      $db->query("INSERT INTO customers (Full_name, Customer_email, Customer_password, Customer_phone, Customer_barangay, Customer_address) VALUES ('$name', '$email', '$hashed', '$str', '$barangay', '$detail')");
      $_SESSION['success_flash'] = 'Customer has been added';
      header('Location: customers.php');
    }

    }
  }
   ?>
  <form action="customers.php?<?php echo ((isset($_GET['edit'])?'edit='.$edit_id :'add=1'));?>" method="post">

        <div class="row">
      <div class="form-group col-md-6">
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name" class="form-control" value="<?=$name?>">
      </div>
      <script>
      $('#name').keypress(function (e) {
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
      </script>
      <div class="form-group col-md-6">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="form-control" value="<?=$email?>">
      </div>

      <div class="form-group col-md-6">
        <label for="password"><?php echo ((isset($_GET['edit']))?'New ':'')?>Password: </label>
        <input type="password" name="password" id="password" class="form-control" value="<?=$password?>">
      </div>


      <div class="form-group col-md-6">
        <label for="confirm">Confim Password: </label>
        <input type="password" name="confirm" id="confirm" class="form-control" value="<?=$confirm?>">
      </div>

      <div class="form-group col-md-6">
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone" class="form-control" value="<?=$phone?>" placeholder="Enter an 11 digit number" oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
      </div>

      <div class="form-group col-md-6">
        <label for="barangay">Barangay: </label>
        <select class="form-control" id="barangay" name="barangay" type="text" required>
       <option selected hidden><?php echo $barangay?></option>
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

      <div class="form-group col-md-6">
        <label for="detail">Detailed Address: </label>
        <input type="text" name="detail" id="detail" class="form-control" value="<?=$detail?>">
      </div>


    </div>
    </div>

    <div class="card-footer text-right">
      <a href="customers.php" class="btn btn-danger ">Cancel</a>
      <button type="submit" name="sub" class="btn btn-success"><?= ((isset($_GET['edit']))?'<i class="glyphicon glyphicon-ok-sign"></i> Save Changes': '<i class="glyphicon glyphicon-plus-sign"></i> Add User') ?></button>
    </div>
  </form>

</div>
</div>
</div>
</div>
<br>
<?php
}else{
// table of customers, else until the end php tag
$userquery = $db->query("SELECT * FROM customers WHERE Deleted = 0 ORDER BY Full_name");
 ?>

<br>
 <div class="container">
         <div class="card">
                   <div class="card-header text-center text-success">
<i class="glyphicon glyphicon-user"></i>
                     Customers</div>
    <div class="card-body">
      <br>
 <br/>
 <div class="row  justify-content-end">
 <a href="customers.php?add=1" class="btn btn-success" id="add-product-btn"><i class="glyphicon glyphicon-plus-sign"></i> Add New User </a>
</div>
<hr>
 <div class="table-responsive">
<table class="table table-striped">
  <thead class="text-success">
    <th></th>
    <th>Name</th>
    <th class="th-xs">Email</th>
    <th>Join Date</th>
    <th>Last Login</th>
  </thead>

  <tbody>
    <?php while($user = mysqli_fetch_assoc($userquery)): ?>
    <tr>
    <td>
        <a href="customers.php?edit=<?php echo $user['Customer_id']?>" class="btn btn-dark btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
        <a href="customers.php?delete=<?php echo $user['Customer_id']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove-sign"></i></a>
    </td>
    <td><?= $user['Full_name'];?></td>
    <td><?= $user['Customer_email'];?></td>
    <td><?= revised_date($user['Customer_joindate']);?></td>
    <td><?= (($user['Customer_login'] == '0000-00-00 00:00:00')?'Never':revised_date($user['Customer_login']));?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
</div>
<div class="card-footer text-right">
</div>
</div>
</div>
<br>
<?php }
include 'includes/footer.php'
 ?>
