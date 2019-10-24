<?php
require_once 'system/initialize.php';
// if(!is_logged_in_customer()){
//   login_error_redirect();
// }
include 'includes/home.php';
include 'includes/sidebar.php';
if(isset($_GET['cat'])){
  $cat_id = linis($_GET['cat']);
}else{
  $cat_id = '';
}

$sqlz = "SELECT * FROM products WHERE Product_category = '$cat_id' && Deleted = 0";
$productqueryx = $db->query($sqlz);

$sqlx = "SELECT * FROM categories WHERE Category_id = '$cat_id'";
$productq = $db->query($sqlx);

$results_per_page = 6;
$number_of_results = mysqli_num_rows($productqueryx); //number of rows db
$number_of_pages = ceil($number_of_results/$results_per_page); //number of pages

if (!isset($_GET['page'])){
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;


$sql = "SELECT * FROM products WHERE Product_category = '$cat_id' && Deleted = 0 LIMIT ". $this_page_first_result . ',' .$results_per_page;
$productquery = $db->query($sql);
?>
<?php
include 'includes/popup.php';
 ?>

<div class="container">

  <br>
    <?php while($productx = mysqli_fetch_assoc($productq)): ?>

<h2 class="title text-center"> <?php echo $productx['Category_name'];?></h2>
  <br/>
    <?php endwhile; ?>




  <?php if(mysqli_num_rows($productquery)==0): ?>
<br>
  <h2 class="title text-center">
    Page Doesn't Exist
  </h2>

  <?php else: ?>
    <div class="row">
    <?php while($product = mysqli_fetch_assoc($productquery)): ?>

      <div class="col-sm-4 col-xs-4">

        <div class="card">
          <div class="panel-body" id="img_container">
          <img class="card-img-top" onclick="detailsmodal(<?php echo $product['Product_id'];?>)" src="<?php echo $product['Product_image'];?>" alt="Card image" style="height:250; width:450px;"/>
            <?php echo($product['Product_quantity'] == 0)?'<h2 id="text">Out Of Stock</h2>':''; ?>
          </div>
        <div class="card-body">
            <span class="card-title cardname"><?php echo $product['Product_name'];?></span>

          <div class="row">
            <div class="col-md-6 col-xs-6 padprice">
          <p class="card-text">Price: ₱ <?php echo $product['Product_price']?> </p>
        </div>
        <div class="col-md-6 col-xs-6 text-right">
          <form action="productview.php" method="post">
            <input type="hidden" name="productname" value="<?php echo $product['Product_id'];?>"/>
            <div class="text-right">
            <button type="submit" class="btn btn-success" id="button2">View Product</button>
          </div>
        </form>
      </div>
      </div>

        </div>



      </div>
        <br>
      </div>
    <?php endwhile; ?>

  </div>


<br>
<div class="text-center">
    <ul class="pagination justify-content-center">
      <?php
      $pageback = $page - 1;
        $pageforward = $page + 1;
  $currentpage = $page;
        if ($page == 1){
          //nothing
        }else{
      echo '
        <li class="page-item"><a class="page-link" href="category.php?cat='.$cat_id.'&page='.$pageback.'">'.'Previous'.'</a></li>
      ';
    }
      ?>
<?php
for ($page=1; $page <= $number_of_pages; $page++){
  echo '
    <li class="page-item"><a class="page-link" href="category.php?cat='.$cat_id.'&page='.$page.'">'.$page.'</a></li>
  ';
}
?>
<?php
if ($currentpage < $number_of_pages){
  echo'
    <li class="page-item"><a class="page-link" href="category.php?cat='.$cat_id.'&page='.$pageforward.'">'.'Next'.'</a></li>
  ';
}else{

}
?>
    </ul>
  </div>
    <?php endif; ?>
</div>


<?php
include 'includes/footer.php';
?>
