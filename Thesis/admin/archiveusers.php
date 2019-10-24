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


if(isset($_GET['archived']))
{
 $p_id = linis($_GET['archived']);
 $reset = "UPDATE users SET Deleted = 0 WHERE User_id = '$p_id'";
 $db->query($reset);
 header('Location: archiveusers.php');
}

///get from DB
$sql = "SELECT * FROM users WHERE deleted = 1";
$user_result = $db->query($sql);
?>


<br>
<div class="container">
        <div class="card">
    <div class="card-header text-success text-center"><i class="glyphicon glyphicon-trash"></i> Archieved Users</div>
          <div class="card-body">
<?php if(mysqli_num_rows($user_result) == 0): ?>
  <div class="bg-danger cartemp" style="height:100px;">
       <p class="text-center text-light"  style="padding:35px; font-size: 18px;">
      There are no Archived Users yet
    </p>
  </div>
<?php else: ?>
<table class="table table-striped">

<thead class="text-success">
 <th></th>
 <th>Name</th>
 <th>Email</th>
<th>Join Date</th>
 <th>Last Login</th>


</thead>

<tbody>
  <?php while($user = mysqli_fetch_assoc($user_result)): ?>
   <tr>
        <td>
          <a href="archiveusers.php?archived=<?=$user['User_id'];?>" class="btn btn-xs btn default"><span class="glyphicon glyphicon-refresh"></span></a> Restore
        </td>
        <td><?=$user['Full_name'];?></td>
        <td><?=$user['User_email'];?></td>
        <td><?=$user['User_joindate'];?></td>
        <td><?= (($user['User_login'] == '0000-00-00 00:00:00')?'Never':revised_date($user['User_login']));?></td>

   </tr>
  <?php endwhile; ?>
</tbody>
</table>
<?php endif; ?>
</div>
<div class="card-footer text-right">
</div>
</div>
</div>
</div>
<br>
<?php
include 'includes/footer.php';
?>
