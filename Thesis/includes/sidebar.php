  <div class="d-flex" id="wrapper">

<div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><a href="index.php"><img src="images/marketlogos.png" class="thumbnail rounded-circle" style="height: 100px;width:auto;"/></a></div>

      <div class="list-group list-group-flush">
                <?php if(is_logged_in_customer()): ?>
                  <a href="#" data-toggle="collapse" data-target="#account" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">

                    <img class="profile rounded-circle border border-light" src="<?php echo (($customer_data['Customer_photo'] == '')?'images/avatar.jpg':$customer_data['Customer_photo'] )  ?>"/>  Hello <?php echo $customer_data['first'];?>!
                  </a>
                    <ul class="collapse list-unstyled" id="account">
                      <li>
                        <a href="orders.php" class="list-group-item list-group-item-action bg-light"><i class="glyphicon glyphicon-duplicate"></i> My Orders
                      </a></li>
                      <li>
                        <a href="change_password.php" class="list-group-item list-group-item-action bg-light"><i class="glyphicon glyphicon-cog"></i> Account Settings
                      </a></li>
                      <li>
                        <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i class="glyphicon glyphicon-log-out"></i> Log Out
                      </a></li>
                    </ul>
                    <a href="cart.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-shopping-cart"></i> My Cart</a>
                <?php else: ?>
                <a href="login.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                <?php endif;?>
        <a href="aboutus.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-user"></i> About us</a>
        <?php
          $sql = "SELECT * FROM categories";
          $query = $db->query($sql);
         ?>
        <a href="#" data-toggle="collapse" data-target="#products" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">
<i class="glyphicon glyphicon-apple"></i>
          Products
        </a>
        <ul class="collapse list-unstyled" id="products">
        <?php while($category = mysqli_fetch_assoc($query)): ?>
          <li>
            <a href="category.php?cat=<?php echo $category['Category_id'];?>" class="list-group-item list-group-item-action bg-light"><?php echo $category['Category_name'] ?>
          </a></li>
        <?php endwhile; ?>
        </ul>
        <a href="contact.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-envelope"></i> Contact</a>

      </div>

</div>

  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
      <div class="container-fluid">
          <a href="" id="menu-toggle">
            <div class="menubar"></div>
            <div class="menubar"></div>
            <div class="menubar"></div>
          </a>
          <form class="form-inline my-lg-0" action="search.php" method="GET">
              <input type="text" class="form-control mr-sm-2" placeholder="Search Product" name="search">
                <button class="btn btn-success form-inline my-sm-0" type="submit" value="search">
                  Search
                </button>
          </form>
        </div>
    </nav>
