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
  $db->query("UPDATE users SET Deleted = 1 WHERE User_id='$delete_id'");
}

if(isset($_GET['add']) || isset($_GET['edit'])){
$name = ((isset($_POST['name']))?linis($_POST['name']):'');
$email = ((isset($_POST['email']))?linis($_POST['email']):'');
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$confirm = ((isset($_POST['confirm']))?linis($_POST['confirm']):'');
$permissions = "seller";
$errors = array();
//
if(isset($_GET['edit'])){
  $edit_id = (int)$_GET['edit'];
  $userresults = $db->query("SELECT * FROM users WHERE User_id='$edit_id' AND Deleted = 0 ");
  $user= mysqli_fetch_assoc($userresults);

  $name = ((isset($_POST['name']) && !empty($_POST['name']))?linis($_POST['name']):$user['Full_name']);
  $email = ((isset($_POST['email']) && !empty($_POST['email']))?linis($_POST['email']):$user['User_email']);

}
//
if($_POST){

  $emailquery = $db->query("SELECT * FROM users WHERE User_email = '$email' ");
  $emailcount = mysqli_fetch_assoc($emailquery);

if (isset($_GET['edit'])){

}
else{
  if($emailcount != 0){
    $errors[] = 'Email already exists';
  }
}
  $required = array('name', 'email', 'password', 'confirm');
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

  if(!empty($errors)){
    echo display_errors($errors);
  }else{
    if (isset($_GET['edit'])){
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $db->query("UPDATE users SET Full_name = '$name', User_email = '$email', User_password ='$hashed', User_permission ='$permissions' WHERE User_id = '$edit_id'");
      $_SESSION['success_flash'] = 'User has been updated';
      header('Location: users.php');
  }
  else{
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $db->query("INSERT INTO users (Full_name, User_email, User_password, User_permission) VALUES ('$name', '$email', '$hashed', '$permissions')");
    $_SESSION['success_flash'] = 'User has been added';
    header('Location: users.php');
  }

  }
}
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
  <div class="card-header text-center text-success">
<i class="glyphicon glyphicon-user"></i>
    <?= ((isset($_GET['edit']))?'Edit ':'Add new');?> User</div>
<br>
<div class="card-body">
  <form action="users.php?<?php echo ((isset($_GET['edit'])?'edit='.$edit_id :'add=1'));?>" method="post">

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
    </div>
    </div>

    <div class="card-footer text-right">
      <a href="users.php" class="btn btn-danger ">Cancel</a>

      <button type="submit" class="btn btn-success"><?= ((isset($_GET['edit']))?'    <i class="glyphicon glyphicon-ok-sign"></i> Save changes': '<i class="glyphicon glyphicon-plus-sign"></i> Add User') ?></button>
    </div>
  </form>

</div>
</div>
</div>
</div>
<br>
<?php
}else{
// table of users, else until the end php tag
$userquery = $db->query("SELECT * FROM users WHERE Deleted = 0 ORDER BY Full_name  ");
 ?>

<br>
 <div class="container">
         <div class="card">
                   <div class="card-header text-center text-success">
<i class="glyphicon glyphicon-user"></i>
                     Users</div>
    <div class="card-body">
      <br>
 <br/>
 <div class="row justify-content-end">
 <a href="users.php?add=1" class="btn btn-success" id="add-product-btn"><i class="glyphicon glyphicon-plus-sign"></i> Add New User </a>
</div>
<hr>
 <div class="table-responsive">
<table class="table table-striped ">
  <thead class="text-success">
    <th></th>
    <th>Name</th>
    <th class="th-xs">Email</th>
    <th>Last Login</th>
    <th>Permissions</th>
  </thead>

  <tbody>
    <?php while($user = mysqli_fetch_assoc($userquery)): ?>
    <tr>
    <td>
      <?php if($user['User_id'] != $user_data['User_id']):?>
        <a href="users.php?edit=<?php echo $user['User_id']?>" class="btn btn-dark btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
        <a href="users.php?delete=<?php echo $user['User_id']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove-sign"></i></a>
      <?php endif;?>
    </td>
    <td><?= $user['Full_name'];?></td>
    <td><?= $user['User_email'];?></td>
    <td><?= (($user['User_login'] == '0000-00-00 00:00:00')?'Never':revised_date($user['User_login']));?></td>
    <td><?= $user['User_permission'];?></td>
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
