<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'system/initialize.php';
include 'includes/home.php';
include 'includes/sidebar.php';
$contactname = ((isset($_POST['name']))?linis($_POST['name']):'');
$contactemail = ((isset($_POST['email']))?linis($_POST['email']):'');
$contacttext = ((isset($_POST['desc']))?linis($_POST['desc']):'');
$emailvar = '';
if(!is_logged_in_customer()){
    $emailvar = 'No Account Used';
}
  else{
  $emailvar = $customer_data['Customer_email'];
  }
?>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
  <div class="card-header text-center text-success">
<i class="glyphicon glyphicon-envelope"></i>
    Contact us</div>
<br>
<div class="card-body">
  <?php
  $errors= array();
  if(isset($_POST['enter'])){

    $required = array('name', 'email', 'desc');
    foreach ($required as $f) {
      if(empty($_POST[$f])){
      $errors[] = 'You must fill out all fields';
      break;
      }
    }
      if(!empty($errors)){
        echo display_errors($errors);
      }else{
        require 'vendor/autoload.php';

          $mail = new PHPMailer(true);
try{
                $mail->isSMTP();
          $mail->Host = "gator4221.hostgator.com";
          $mail->SMTPAuth = true;
          $mail->Username = "nonameemail@larypa.com";
          $mail->Password = "password12345";
          $mail->SMTPSecure = "ssl";
          $mail->Port = 465;
          $mail->isHTML(true);
          $mail->Subject = "Contact Us Palengk-E";
          $mail->Body = $contacttext.'<br> Real Email used: '.$emailvar;
          $mail->setFrom("nonameemail@larypa.com", $contactemail.' '.$contactname);
          $mail->AddAddress("Nonamewebsite69@gmail.com");
          $mail->send();
          echo '<div class="row justify-content-center text-success">Message has been sent</div><br>';
} catch (Exception $e) {
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

      }

  }
   ?>
  <form action="contact.php" method='post'>
        <div class="row">

      <div class="form-group col-md-6">
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name" class="form-control" value="<?=$contactname?>">
      </div>

      <div class="form-group col-md-6">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="form-control" value="<?=$contactemail?>">
      </div>

            <div class="form-group col-md-12">
                <label for="desc">Message: </label>
                <textarea id="desc" name="desc" class="form-control" rows="6"> <?php echo $contacttext;?></textarea>
            </div>

    </div>
    </div>

    <div class="card-footer text-right">
      <a href="index.php" class="btn btn-danger ">Cancel</a>
      <input type="submit" name="enter" value="Submit" class="btn btn-success"/>
    </div>
  </form>

</div>
</div>
</div>
</div>


<br>

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
<?php
include 'includes/footer.php';
?>
