<?php

    include("../database/database.php");
 
   if(isset($_GET['catg_id'])){

    $id=$_GET['catg_id'];


    $sql="delete from category where catg_id=$id";

    $res=mysqli_query($conn,$sql);

    if($res){
        $_SESSION['catg_delete']="Category deleted successfully";
        header("location:".$siteurl.'admin/manage_category.php');
    }
    else{
        $_SESSION['catg_delete']="Failed to delete category";
        header("location:".$siteurl.'admin/manage_category.php');
    }
}




?>