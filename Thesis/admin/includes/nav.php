
<nav class="navbar navbar-inverse" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Administration</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- <li><a href="index.php">Dashboard</a></li>
              <li><a href="shipped.php">Completion</a></li> -->
        <!-- <li><a href="categories.php">Categories</a></li> -->
        <!-- <li><a href="products.php">Products</a></li> -->
        <li><a href="archive.php">Archive</a></li>
        <li><a href="report.php">Report</a></li>
              <!-- <li><a href="log.php">History</a></li> -->
        <?php if(permission('admin')): ?>
          <li><a href="users.php">Users</a></li>
        <?php endif; ?>
      </ul>

  <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Hello <?php echo $user_data['first'];?>! <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li><a href="change_password.php">Change Password</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
    </li>
  </ul>
    </div>
  </div>

</nav>
