<?php

    include("../database/database.php");
 
   if(isset($_GET['food_id'])){

    $id=$_GET['food_id'];


    $sql="delete from fooditems where food_id=$id";
    

    $res=mysqli_query($conn,$sql);

    if($res){
        $_SESSION['food-delete']="Food details deleted successfully";
        header("location:".$siteurl.'admin/manage_food.php');
    }
    else{
        $_SESSION['food-delete']="Failed to delete food details";
        header("location:".$siteurl.'admin/manage_food.php');
    }
}




?>