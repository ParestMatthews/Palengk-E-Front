<div class="d-flex" id="wrapper">

<div class="bg-dark text-white border-right" id="sidebar-wrapper">
  <div class="sidebar-heading"><a href="index.php"><img src="../images/marketlogos.png" class="thumbnail rounded-circle" style="height: 100px;width:auto;"/></a></div>

    <div class="list-group list-group-flush">
      <a href="#" data-toggle="collapse" data-target="#account" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">

        Hello <?php echo $user_data['first'];?>!
      </a>
        <ul class="collapse list-unstyled" id="account">
          <a href="change_password.php" class="list-group-item list-group-item-action bg-light"><i class="glyphicon glyphicon-cog"></i> My Account</a>
          <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
        </ul>

      <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
            <?php if(!permission('admin')): ?>
      <a href="shipped.php"  class="list-group-item list-group-item-action bg-dark text-white">
        <i class="glyphicon glyphicon-book"></i>
        Complete Order
      </a>

      <a href="#"data-toggle="collapse" data-target="#history" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">
        <i class="glyphicon glyphicon-time"></i> History
      </a>
      <ul class="collapse list-unstyled" id="history">
          <li><a href="log.php" class="list-group-item list-group-item-action bg-light">Orders</a></li>
          <li><a href="prolog.php" class="list-group-item list-group-item-action bg-light">Products</a></li>
      </ul>
          <?php endif;?>
                <?php if(permission('admin')): ?>
      <a href="categories.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-tag"></i> Categories</a>

          <a href="products.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-apple"></i> Products</a>
      <a href="#"data-toggle="collapse" data-target="#archive" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">
        <i class="glyphicon glyphicon-time"></i> Archive
      </a>
      <ul class="collapse list-unstyled" id="archive">
          <li><a href="archiveusers.php" class="list-group-item list-group-item-action bg-light">Staff</a></li>
                    <li><a href="archivecustomers.php" class="list-group-item list-group-item-action bg-light">Customers</a></li>
        <li><a href="archive.php" class="list-group-item list-group-item-action bg-light">Products</a></li>

      </ul>


            <?php endif;?>
                      <?php if(!permission('admin')): ?>
                  <a href="report.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="glyphicon glyphicon-file"></i> Reports</a>
                <?php endif;?>
        <?php if(permission('admin')): ?>
          <a href="#" data-toggle="collapse" data-target="#user" class="collapsed list-group-item list-group-item-action bg-dark text-white dropdown-toggle">
            <i class="glyphicon glyphicon-user"></i> User Management
          </a>
            <ul class="collapse list-unstyled" id="user">
                        <a href="users.php" class="list-group-item list-group-item-action bg-light"> Staff</a>
                        <a href="customers.php" class="list-group-item list-group-item-action bg-light"> Customers</a>
            </ul>
        <?php endif; ?>


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
      </div>
  </nav>
