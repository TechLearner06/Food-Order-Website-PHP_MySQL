<?php

    include("../database/database.php");
 
    $id=$_GET['id'];

    $sql="delete from admin where id=$id";

    $res=mysqli_query($conn,$sql);

    if($res){
        $_SESSION['delete']="Admin deleted successfully";
        header("location:".$siteurl.'admin/manage_admin.php');
    }
    else{
        $_SESSION['delete']="Failed to delete Admin";
        header("location:".$siteurl.'admin/manage_admin.php');
    }



?>