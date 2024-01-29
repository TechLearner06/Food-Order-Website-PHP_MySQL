<?php include('header.php')?>

<?php
if(isset($_GET['food_id'])){
    $food_id=$_GET['food_id'];
}
?>
<div class="update-food-section">
    <div class="update-food">
        <h1>Update Food details</h1>
        <br><br>

        <form action="" method="POST" class="update-food-form" enctype="multipart/form-data">
            <table class="update-food-table">

            <?php 
            $sql="select * from fooditems where food_id=$food_id";
            $res=mysqli_query($conn,$sql);
            
            if($res){
                $count=mysqli_num_rows($res);

                if($count==1){
                    $rows=mysqli_fetch_assoc($res);

                    $fooditem=$rows['name'];
                    $price=$rows['price'];
                    $description=$rows['description'];
                    $currentimage=$rows['image_name'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];
                }
            }
            ?>
                <tr>
                    <td>
                        Food Item:
                    </td>
                    <td>
                        <input type="text" name="fooditem"  value="<?php echo $fooditem;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price"  value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Food Description:
                    </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                         Current Image
                    </td>
                    <td>
                    <?php 
                      if($currentimage!="")
                      {
                        ?>
                        <img src="<?php echo $siteurl;?>images/fooditems/<?php echo $currentimage;?>" width="50px">
                        <?php


                      }
                      else{
                        echo "image not added";
                      }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>
                         Select New Image
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                         Category:
                    </td>
                    <td>
                        <select name="category">
                        
                        <!--create php code to display categories form database-->
                        <!--create sql to get all categories from database-->

                        <?php
                        $sql="select * from category where active='Yes'";
                        $res=mysqli_query($conn,$sql);

                        if($res){
                            $count=mysqli_num_rows($res);
                            
                                if($count>0){
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of category 
                                        $id=$rows['catg_id'];
                                        $title=$rows['title'];
                                    
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    
                                    <?php
                                    
                                    }
                                
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category</option>
                                    <?php
                                }
                            
                        }

                    
                        ?>
                           
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
            
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                    
                <tr>   
                    <td>
                        <input type="hidden" name="currentimage" value="<?php echo $currentimage; ?>">   
                        <input type="hidden" name="food_id" value="<?php echo $food_id; ?>">
                        <input type="submit" name="submit" value="Update Food Details" class="update-food-btn">
                    </td>
                </tr>



            
            </table>
        </form>


    </div>
</div>


<?php
if(isset($_POST['submit']))
{
    $food_id=$_POST['food_id'];
    $fooditem=$_POST['fooditem'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $currentimage=$_POST['currentimage'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

     //new image updating if selected

     if(isset($_FILES['image']['name'])){
        $newimage=$_FILES['image']['name'];

        if($newimage!=""){

            //img renaming
            //extension

            $ext=end(explode('.', $newimage));

            $newimage="food_items_" . rand(000, 999) . '.' . $ext;

            //to upload the update img
            $src=$_FILES['image']['tmp_name'];
            $des="../images/fooditems/".$newimage;


            //upload

            $upload=move_uploaded_file($src,$des);

            if ($upload == false) {
                $_SESSION['upload'] = "Failed to add image";
                header("location:" .$siteurl.'admin/manage_food.php');
                //stop the process
                die();
            }
        

        // remove the current image if available
        if($currentimage!="")
        {
            $remove_path = "../images/fooditems/" .$currentimage;
            $remove = unlink($remove_path);
            echo "Remove Path: " . $remove_path;
            echo "Remove Result: " . $remove;


            // check whether the image is removed or not
            if ($remove == false) 
            {
                $_SESSION['img-remove'] = "Failed to Remove Image";
                header("location:".$siteurl.'admin/manage_food.php');
                die();
            } 
            
        }
    
     }
    else 
    {
        $newimage = $currentimage;
    }

            

        }
     


        $sql2="update fooditems set name='$fooditem',price='$price',description='$description',image_name='$newimage',featured='$featured',active='$active' where food_id=$food_id";

        $res2=mysqli_query($conn,$sql2);

        if($res2){
            $_SESSION['food-update']="Food details updated successfully";
            header("location:".$siteurl.'admin/manage_food.php');
        }
        else{
            $_SESSION['food-update']="Failed to update food details successfully";
            header("location:".$siteurl.'admin/manage_food.php');
        }
    }

    ?>

    





<?php include('footer.php')?>