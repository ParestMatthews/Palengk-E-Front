<nav class="navbar navbar-inverse ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Larypa</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<!--Connecting DB Caterories-->
        <?php
          $sql = "SELECT * FROM categories";
          $query = $db->query($sql);
         ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php while($category = mysqli_fetch_assoc($query)): ?>
                <li><a href="category.php?cat=<?php echo $category['Category_id'];?>"><?php echo $category['Category_name'] ?></a></li>
                <?php endwhile; ?>
              </ul>
          </li>
        <!-- <li><a href="#">Contact</a></li>
        <li><a href="#">Help</a></li> -->
      </ul>
      <form class="navbar-form navbar-left" action="search.php" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Product" name="search" >
          <div class="input-group-btn">
            <button class="btn btn-default form-control" type="submit" value="search">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(is_logged_in_customer()): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $customer_data['first'];?>! <span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-left" role="menu">
            <li><a href="orders.php">My Orders</a></li>
            <li><a href="change_password.php">Account Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>
      <?php else: ?>
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
            <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
