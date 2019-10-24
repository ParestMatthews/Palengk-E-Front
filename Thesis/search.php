<?php
require_once 'system/initialize.php';
include 'includes/home.php';
include 'includes/sidebar.php';

$query = linis($_GET['search']);
   $min_length = 0;

   if(strlen($query) == null){
      header('Location: index.php');
   }
   elseif(strlen($query) >= $min_length){
       $raw_results = $db->query("SELECT  i.Product_id as 'Product_id', i.Product_name as 'Product_name', i.Product_image as 'Product_image',
       i.Product_quantity as 'Product_quantity', i.Deleted as 'Deleted', i.Product_tags as 'Tags', i.Product_price as 'Product_price', c.Category_id as 'Category_id'
       , c.Category_name as 'Category_name'
       FROM products i
       LEFT JOIN categories c ON i.Product_category = c.Category_id
       WHERE ((`Product_name` LIKE '%".$query."%') OR (`Category_name` LIKE '%".$query."%') OR (`Product_tags` LIKE '%".$query."%')) AND Deleted = 0");
   }
?>

<?php
include 'includes/popup.php';
 ?>
<br>
<div class="container">

          <?php if(mysqli_num_rows($raw_results) > 0): ?>
            <div class="justify-content-center">
              <h2 class="text-center">Product result<?=((mysqli_num_rows($raw_results) == 1)?' ':'s ')?>(<?=mysqli_num_rows($raw_results)?>)</h2>
              <h3 class="text-center">We've found <?=mysqli_num_rows($raw_results)?> result<?=((mysqli_num_rows($raw_results) == 1)?'':'s') ?> for the search term '<?=linis($_GET['search'])?>'</h3>
            </div>
            <br>
              <div class="row">
                        <?php while($results = mysqli_fetch_assoc($raw_results)): ?>

                          <div class="col-sm-4 col-xs-4">

                            <div class="card">
                              <div class="panel-body" id="img_container">
                              <img class="card-img-top" onclick="detailsmodal(<?php echo $results['Product_id'];?>)" src="<?php echo $results['Product_image'];?>" alt="Card image" style="height:250; width:450px;"/>
                                <?php echo($results['Product_quantity'] == 0)?'<h2 id="text">Out Of Stock</h2>':''; ?>
                              </div>

                            <div class="card-body">
                          
                              <span class="card-title cardname"><?php echo $results['Product_name'];?></span>

                              <div class="row">
                                <div class="col-md-6 col-xs-6 padprice">
                              <p class="card-text">Price: ₱ <?php echo $results['Product_price']?> </p>
                            </div>
                            <div class="col-md-6 col-xs-6 text-right">
                              <form action="productview.php" method="post">
                                <input type="hidden" name="productname" value="<?php echo $results['Product_id'];?>"/>
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
      <?php else:?>
          <h2 class="title text-center">Sorry, we couldn't find any results matching "<?=linis($_GET['search'])?>"</h2>
      <?php endif; ?>
    </div>
  </div>

<br><br>
<?php
include 'includes/footer.php';
?>
