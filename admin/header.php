<?php include('../database/database.php')?>

<?php
  //authorization access control
  //check whether the user is logged in or not
  if(!isset($_SESSION['user']))   //if user session is not set we will redirect it into loginpage
  {
        $_SESSION['no-login-msg']="please login to access Admin Panel";
        header("location:".$siteurl.'admin/Loginpage.php');
  }
  ?>
   
<html>
  <head>
   <title>Food Order Website-Home Page</title>
   <link rel="stylesheet" href="../css/admin.css" type="text/css">
  </head>

  <body>

<!-- menu section starts -->
<div class="admin-header">
    <div class="admin-heading">
      <h4>Admin-Home Page</h4>
    </div>
    <div class="admin-menu">
       <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="manage_admin.php">Admin</a></li>
          <li><a href="manage_category.php">Category</a></li>
          <li><a href="manage_food.php">Food</a></li>
          <li><a href="manage_order.php">Order</a></li>
          <li><a href="Loginpage.php">LogOut</a></li>
        </ul>
    </div>
</div>