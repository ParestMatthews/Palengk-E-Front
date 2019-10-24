<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in()){
  login_error_redirect();
}
if(!permission('admin')){
  permission_error_redirect('index.php');
}
include 'includes/header.php';
include 'includes/sidebar.php';
if(isset($_GET['delete'])){
  $id = linis($_GET['delete']);
  $db->query("UPDATE products SET Deleted = 1 WHERE Product_id='$id'");
  header('Location: products.php');
}
$dbpath = '';
  $quantityx = 0;
if (isset($_GET['add']) || isset($_GET['edit'])){
  //pressed add button*
  $catquery = $db->query("SELECT * FROM categories ORDER BY Category_name");
  $namex = ((isset($_POST['name']) && !empty($_POST['name']))?linis($_POST['name']):'');
  $category = ((isset($_POST['category']) && !empty($_POST['category']))?linis($_POST['category']):'');
  $oprice = ((isset($_POST['oprice']) && !empty($_POST['oprice']))?linis($_POST['oprice']):'');
  $price = ((isset($_POST['price']) && !empty($_POST['price']))?linis($_POST['price']):'');
  $description = ((isset($_POST['description']) && !empty($_POST['description']))?linis($_POST['description']):'');
  $quantity = ((isset($_POST['quantity']) && !empty($_POST['quantity']))?linis($_POST['quantity']):'');
  $tags = ((isset($_POST['tags']) && !empty($_POST['tags']))?linis($_POST['tags']):'');
  $saved_image = '';

  if(isset($_GET['edit'])){
    $edit_id = (int)$_GET['edit'];
    $productresults = $db->query("SELECT * FROM products WHERE Product_id='$edit_id'");
    $product = mysqli_fetch_assoc($productresults);

    if(isset($_GET['delete_image'])){
      $image_url = $_SERVER['DOCUMENT_ROOT'].$product['Product_image'];
      echo $image_url;
      unlink($image_url);
      $db->query("UPDATE products SET Product_image = '' WHERE Product_id = '$edit_id' ");
      header('Location: products.php?edit='.$edit_id);
    }

    $namex = ((isset($_POST['name']) && !empty($_POST['name']))?linis($_POST['name']):$product['Product_name']);
    $category = ((isset($_POST['category']) && !empty($_POST['category']))?linis($_POST['category']):$product['Product_category']);
    $oprice = ((isset($_POST['oprice']) && !empty($_POST['oprice']))?linis($_POST['oprice']):$product['Product_origprice']);
    $price = ((isset($_POST['price']) && !empty($_POST['price']))?linis($_POST['price']):$product['Product_price']);
    $description = ((isset($_POST['description']) && !empty($_POST['description']))?linis($_POST['description']):$product['Product_description']);
    $quantity = ((isset($_POST['quantity']) && !empty($_POST['quantity']))?linis($_POST['quantity']):'');
      $tags = ((isset($_POST['tags']) && !empty($_POST['tags']))?linis($_POST['tags']):$product['Product_tags']);
    $saved_image = (($product['Product_image'] != '')?$product['Product_image']:'');
    $dbpath = $saved_image;
  }


?>
<br>
<div class="container">
  <div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
        <div class="card">
          <div class="card-header text-center text-success"><i class="glyphicon glyphicon-briefcase"></i> <?= ((isset($_GET['edit']))?'Edit Product <span class="text-danger"> ('.$product['Product_quantity'].' in stock)</span> ':'Add a new Product');?> </div>
<div class="card-body">
  <?php
  if (isset($_POST['submit'])){
    $category =linis($_POST['category']);
    $price = linis($_POST['price']);
    $oprice = linis($_POST['oprice']);
    $description = linis($_POST['description']);
    $quantity = linis($_POST['quantity']);
    $tags = linis($_POST['tags']);


    $errors = array();
    $required = array('name', 'category', 'oprice', 'price', 'quantity', 'description', 'tags');
    foreach ($required as $field) {
      if($_POST[$field] == ''){
        $errors[] = 'All field(s) with an asterisk are required.';
        break;
      }
    }


  if($_FILES['photo']['name'] != ''){
  //var_dump($_FILES); etong code na to nilalabas ung photo upload process (not needed)
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

  if(!empty($errors)){
  echo display_errors($errors);
  }else{
  //mag uupdate to
  if(!empty($_FILES)){
  move_uploaded_file($tmpLoc, $uploadPath);
  }

  $insertSql = "INSERT INTO products (Product_name, Product_origprice, Product_price, Product_quantity, Product_category, Product_image, Product_description, Product_tags)
   VALUES ('$namex','$oprice', '$price','$quantity','$category','$dbpath', '$description', '$tags')";

  if(isset($_GET['edit'])){

  $query = "SELECT * FROM products WHERE Product_id = '$edit_id' ";
  $subvar = $db->query($query);

  while($queryx =  mysqli_fetch_assoc($subvar)){
    $quantityx = $quantity + $queryx['Product_quantity'];
  }

  $insertSql = "UPDATE products SET Product_name = '$namex', Product_origprice = '$oprice', Product_price = '$price', Product_quantity='$quantityx', Product_category='$category', Product_image='$dbpath', Product_description='$description',  Product_tags='$tags' WHERE Product_id = '$edit_id' ";
  }
  $db->query($insertSql);

  $inserthistory = "INSERT INTO producttrans (Product_name, Product_quantity) VALUES ('$namex', '$quantity')";
  $db->query($inserthistory);
  header('Location: products.php');
  }
  }


   ?>
  <form action="products.php?<?php echo ((isset($_GET['edit'])?'edit='.$edit_id :'add=1'));?>" method="POST" enctype="multipart/form-data">
  <br>

<div class="row">
      <div class="form-group col-md-6">
        <label for="name">Product Name: </label>
        <input type="name" name="name" class="form-control" id="name" value="<?php echo $namex;?>">
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
        <label for="category">Category:</label>
        <select class="form-control" id="category" name=category>
          <option value=""<?php echo (($category == '')?'selected':'')?>></option>
          <?php while($categoryold = mysqli_fetch_assoc($catquery)): ?>
            <option value="<?php echo $categoryold['Category_id'];?>"<?php echo (($category == $categoryold['Category_id'])?'selected':'')?>><?php echo $categoryold['Category_name'];?></option>
          <?php endwhile; ?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="oprice">Original Price: </label>
        <input type="text" name="oprice" class="form-control"  id="oprice" value="<?php echo $oprice?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
      </div>

      <div class="form-group col-md-4">
        <label for="price">Product Price: </label>
        <input type="text" name="price" class="form-control"  id="price" value="<?php echo $price?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
      </div>

      <div class="form-group col-md-4">
        <label for="quantity">Add/Reduce Quantity: </label>
        <input type="text" name="quantity" class="form-control"  id="quantity" value="<?php echo $quantity?>" oninput="this.value = this.value.replace(/[^0-9-]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
      </div>



      <div class="form-group col-md-12">
          <label for="description">Product Description: </label>
          <textarea id="description" name="description" class="form-control" rows="6"><?php echo $description;?></textarea>
      </div>
      <div class="form-group col-md-12">
          <label for="tags">Tags: </label><br>
          <input type="text" name="tags" id="tags" class="form-control" value="<?php echo $tags;?>" data-role="tagsinput" />
      </div>
      <div class="form group col-md-6">
        <?php if($saved_image != ''): ?>
          <div class="saved-image"><img src="<?php echo $saved_image?>" alt="saved image">
            <br/>
            <br/>
            <a href="products.php?delete_image=1&edit=<?=$edit_id;?>" class="btn btn-danger">Delete Image</a>
            <br/>
            <br/>
          </div>
        <?php else: ?>
        <label for="photo">Product Image:</label>
        <input type="file" name="photo" id="photo" class="form-inline">
        <?php endif; ?>
      </div>

    </div>
</div>

<div class="card-footer text-right">
  <a href="products.php" class="btn btn-danger">Cancel</a>
  <button type="submit" name="submit" class="btn btn-success"><?= ((isset($_GET['edit']))?'<i class="glyphicon glyphicon-ok-sign"></i> Save changes': '  <i class="glyphicon glyphicon-plus-sign"></i> Add Product') ?></button>

</div>
  </form>


</div>
</div>
</div>
</div>
<br>
<script>
$('#tags').tagsinput({
  confirmKeys: [32]
});
</script>
<?php }////else to hanggang sa dulo ng program ng ?php
else{

//archiving the data
$sql = "SELECT * FROM products WHERE Deleted = 0 ORDER BY Product_category";
$presults = $db->query($sql);
if (isset($_GET['featured'])){
  $id = (int)$_GET['id'];
  $featured = (int)$_GET['featured'];
  $featuredsql = "UPDATE products SET Product_featured='$featured' WHERE Product_id='$id' ";
  $db -> query($featuredsql);
  header('Location: products.php');
}
 ?>
 <br>
 <div class="container">
   <div class="row">
 <div class="col-md-12">
         <div class="card">
      <div class="card-header text-center text-success"><i class="glyphicon glyphicon-briefcase"></i> Products</div>

<br/>
  <div class="card-body">
    <br>
    <div class="row justify-content-end">
    <a href="products.php?add=1" class="btn btn-success" id="add-product-btn"><i class="glyphicon glyphicon-plus-sign "></i> Add Product</a>
  </div>
  <hr/>
  <div class="table-responsive">
<table class="table table-striped">
  <thead class="text-success">
    <th></th>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Category</th>

  </thead>
  <tbody>
    <?php while($product = mysqli_fetch_assoc($presults)):
      $categoryid = $product['Product_category'];
      $catsql = "SELECT * FROM categories WHERE Category_id ='$categoryid'";
      $result = $db->query($catsql);
      $catfinal = mysqli_fetch_assoc($result);
      ?>

      <tr>
          <td>
            <a href="products.php?edit=<?php echo $product['Product_id']?>" class="btn btn-xs btn-dark"><i class="glyphicon glyphicon-pencil"></i></a>
              <a href="products.php?delete=<?php echo $product['Product_id']?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-sign"></i></a>
          </td>
          <td><?php echo $product['Product_name']?></td>
          <td><?php echo prices($product['Product_price'])?></td>
          <td><?php echo $product['Product_quantity']?></td>
          <td><?php echo $catfinal['Category_name']?></td>

    <?php endwhile; ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<br>


<?php }
include 'includes/footer.php';
