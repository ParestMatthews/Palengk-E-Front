<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(is_logged_in_customer()){
  header('Location: index.php');
}
include 'includes/home.php';
include 'includes/sidebar.php';
$email = ((isset($_POST['email']))?linis($_POST['email']):'');
$email = trim($email);
$password = ((isset($_POST['password']))?linis($_POST['password']):'');
$password = trim($password);
$errors = array();
?>

<div class="container-fluid">
  <div class="row">
<div class="col-md-3">

</div>

  <div class="col-md-6 col-xs-12">
  <div id="login-form">
    <h2 class="text-center" style="color:black; text-shadow: 0px 0 black, 0 0px black, 0px 0 black, 0 0px black;">Login</h2><hr>
    <div>
      <?php
        if($_POST){
          //validte pag pindot
          if(empty($_POST['email']) || empty($_POST['password'])){
            $errors[] = 'You must provide Email and/or Password';
          }

          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'You must enter a valid email';
          }

          // pass 6 chars
          if(strlen($password) < 6){
            $errors[] = 'Password must be atleast 6 characters';
          }

          // check exist account
          $query = $db->query("SELECT * FROM customers WHERE Customer_email = '$email' AND Deleted = '0' ");
          $customer = mysqli_fetch_assoc($query);
          $customerCount = mysqli_num_rows($query);

            if($customerCount < 1){
              $errors[] = 'The email doesn\'t exits';
            }

            if(!password_verify($password, $customer['Customer_password'])){
              $errors[] = 'The password is incorrect, please try again';
            }

          //display error
          if(!empty($errors)){
            echo display_errors($errors);
          }else{
            //log in
            $customer_id = $customer['Customer_id'];
            login_customer($customer_id);
          }

        }
      ?>
    </div>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $email;?>">
      </div>

      <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" class="form-control" value="<?php echo $password;?>">
      </div>

      <div class="row">
        <div class="col-md-6 col-xs-6">
        <a href="customer.php">Create New account</a><br>
      </div>
        <div class="col-md-6 col-xs-6">
      <div class="form-group text-right">
        <input type="submit" value="Login" class="btn btn-success">
      </div>
    </div>
    </div>

    </form>
  </div>
</div>
</div>
  </div>
</div>

<?php
include 'includes/footer.php'
 ?>
