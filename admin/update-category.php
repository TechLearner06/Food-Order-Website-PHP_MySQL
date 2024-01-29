<?php include("header.php")?>

<?php
if(isset($_GET['catg_id']))
{

$id=$_GET['catg_id'];

$sql="select * from category where catg_id=$id";

$res=mysqli_query($conn,$sql);
if($res){
    $count=mysqli_num_rows($res);
    if($count==1){
        $rows=mysqli_fetch_assoc($res);
        $title=$rows['title'];
        $currentimage=$rows['imagename'];
        $featured=$rows['featured'];
        $active=$rows['active'];

    }
    else{
        $_SESSION['catg-not-found']="Category notfound";
        header("location:".$siteurl.'admin/manage_category.php');
    }
}
}
else{
    header("location:".$siteurl.'admin/manage_category.php');

}

?>



<div class="add-category-section">
    <div class="add-category">
        <h1>Update category</h1>
    <form action="" method="POST"  enctype="multipart/form-data" class="add-category-form">
          <table class="add-category-table">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php 
                      if($currentimage!=""){
                        ?>
                        <img src="<?php echo $siteurl;?>images/category/<?php echo $currentimage;?>" width="150px" height="80px">
                        <?php


                      }
                      else{
                        echo "image not added";
                      }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image</td>
                <td>
                    <input type="file" name="image">
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
            
            <div class="add-category-btn-section">
            <tr>
                <td></td>
                
                <input type="hidden" name="currentimage" value="<?php echo $currentimage ?>">   
                <input type="hidden" name="catg_id" value="<?php echo $id ?>">

                <td><input type="submit" name="submit" value="Add Category" class="add-category-btn">
                </td>
            </tr>
            </div>
          </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $id = $_POST['catg_id'];
            $title = $_POST['title'];
            $currentimage = $_POST['currentimage'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //new image updating if selected
            if (isset($_FILES['image']['name']))
             {
                $imgname = $_FILES['image']['name'];

                if ($imgname != "") {
                    $ext = end(explode('.', $imgname));
                   

                    //rename image
                    $imgname = "food_category_" . rand(000, 999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $imgname;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "Failed to add image";
                        header("location:" . $siteurl . 'admin/manage_category.php');
                        //stop the process
                        die();
                    }
                

                // remove the current image if available
                if($currentimage!=""){
                    $remove_path = "../images/category/" .$currentimage;
                    $remove = unlink($remove_path);

                    // check whether the image is removed or not
                    if ($remove == false) 
                    {
                        $_SESSION['img-remove'] = "Failed to Remove Image";
                        header("location:" . $siteurl . 'admin/manage_category.php');
                        die();
                    } 
                    
                }
            
             }
            else 
            {
                $imgname = $currentimage;
            }

            // updating the database
            $sql2 = "update category set title='$title', imagename='$imgname', featured='$featured', active='$active' where catg_id=$id";
            $res2 = mysqli_query($conn, $sql2);

            if ($res2) 
            {
                $_SESSION['update_catg'] = "Category updated successfully";
                header("location:" . $siteurl . 'admin/manage_category');
            } 
            else
            {
                $_SESSION['update_catg'] = "Failed to update category";
                header("location:" . $siteurl . 'admin/manage_category');
            }
        }
    }
    
        ?>



    </div>
</div>






<?php include("footer.php")?>