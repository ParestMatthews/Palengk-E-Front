<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in()){
  login_error_redirect();
}
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/popup.php';
$hashed = $user_data['User_password'];
$old_password = ((isset($_POST['old_password']))?linis($_POST['old_password']):'');
$old_password = trim($old_password);
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$password = trim($password);
$confirm = ((isset($_POST['confirm']))?linis($_POST['confirm']):'');
$confirm = trim($confirm);
$new_hashed = password_hash($password, PASSWORD_DEFAULT);
$user_id = $user_data['User_id'];
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
  <legend>Change Password</legend>
  <?php
    if($_POST){
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
        $db ->query("UPDATE users SET User_password='$new_hashed' WHERE User_id = '$user_id' ");
        $_SESSION['success_flash'] = "Your Password has been updated";
        header('Location: change_password.php');
      }

    }
  ?>
  <form action="change_password.php" method="post">

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
      <a href="index.php" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
    </div>

  </form>
</div>
</div>
</div>
</div>
<?php
include 'includes/footer.php'
 ?>
