<?php
     include('../database/database.php');
     session_destroy();
     
     header("location:".$siteurl.'admin/Loginpage.php');
?>