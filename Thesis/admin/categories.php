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
$sql = "SELECT * FROM categories ORDER BY Category_name";
$results = $db->query($sql);
$errors = array();
//edit
 ?>
<br>
 <div class="container">
   <div class="row">
 <div class="col-md-12">
         <div class="card">
             <div class="card-header text-success text-center"><i class="glyphicon glyphicon-duplicate"></i> Categories</div>
  <div class="card-body">
    <?php
    if(isset($_GET['edit']) && !empty($_GET['edit'])){
      $edit_id = (int)$_GET['edit'];
      $edit_id = linis($edit_id);
      $sql2 = "SELECT * FROM categories WHERE Category_id = '$edit_id' ";
      $edit_result = $db -> query($sql2);
      $edit_category = mysqli_fetch_assoc($edit_result);
    }
    //delete

    if(isset($_GET['delete']) && !empty($_GET['delete'])){
      $delete_id = (int)$_GET['delete'];
      $delete_id = linis($delete_id);
      $sql ="DELETE FROM categories WHERE Category_id = '$delete_id'";
      $db -> query($sql);
      header('Location: categories.php');
    }

    //////////////////
    if(isset($_POST['add_submit'])){
      $category = linis($_POST['category']);

      if($_POST['category'] == ''){
        $errors[] .= 'Enter the Category!';
      }
      // check exist // DB
      $sql = "SELECT * FROM categories WHERE Category_name = '$category'";


      $result = $db -> query($sql);
      $count = mysqli_num_rows($result);

      if($count>0){
        $errors[] .= $category.' already exist, Enter another Category';
      }

      if(!empty($errors))
      {
        echo displaY_errors($errors);
      }

      else {
        $sql = "INSERT INTO categories (Category_name) VALUES ('$category')";

        if(isset($_GET['edit'])){
          $sql = "UPDATE categories SET Category_name = '$category' WHERE Category_id = '$edit_id'";
        }
        $db->query($sql);
        header('Location: categories.php');
        }
      }
     ?>
<div class="row justify-content-center ">
  <form class="form-inline my-lg-0" action="categories.php<?php echo((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
    <div class="form-group mr-lg-0">
        <?php
        $category_val = '';
        if(isset($_GET['edit'])){
          $category_val = $edit_category['Category_name'];
        }
            else{
              if(isset($_POST['category'])){
                $category_val = linis($_POST['category']);
              }
            }
        ?>
      <label for="category" class="mr-sm-2"><?php echo ((isset($_GET['edit']))?'Edit a ':'Add a new '); ?> Category:</label>
      <input type="text" name="category" id="category" class="form-control mr-sm-2" value= "<?php echo $category_val; ?>">
        <?php if(isset($_GET['edit'])): ?>
          <a href="categories.php" class="btn btn-danger mr-sm-2">  Cancel</a>
        <?php endif; ?>
        <button type="submit" name="add_submit" class="btn btn-success my-sm-0"><?php echo ((isset($_GET['edit']))?'<i class="glyphicon glyphicon-ok-sign"></i> Save Category ':'<i class="glyphicon glyphicon-plus-sign"></i> Add Category '); ?></button>
    </div>
  </form>
</div>

<br>

<legend></legend>
<table class="table table-striped">
  <thead class="text-success">
        <th style="width: 250px;"></th>
        <th >Categories</th>
  </thead>
  <tbody>
    <?php while($category = mysqli_fetch_assoc($results)): ?>
    <tr>
        <td>
        <a href="categories.php?edit=<?php echo $category['Category_id'] ?>" class="btn btn-xs btn-dark"><i class="glyphicon glyphicon-pencil"></i></a>
        <a href="categories.php?delete=<?php echo $category['Category_id'] ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-sign"></i></a>
      </td>
          <td><?php echo $category['Category_name']?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<br>
</div>

<script>
$('#category').keypress(function (e) {
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
