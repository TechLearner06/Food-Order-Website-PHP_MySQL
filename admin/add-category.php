<?php include('header.php') ?>




<div class="add-category-section">
    <div class="add-category">
        <h1 class="category-heading">Add Category</h1>

        <br><br>

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset( $_SESSION['add']);
        }
        if(isset($_SESSION['upload-category']))
        {
            echo $_SESSION['upload-category'];
            unset( $_SESSION['upload-category']);
        }
        ?>

        <form action="" method="POST"  enctype="multipart/form-data" class="add-category-form">
          <table class="add-category-table">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Category Title">
                </td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>
            
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add Category" class="add-category-btn">
                </td>
            </tr>
            </div>
          </table>
        </form>

</div>
</div>

<?php 
if(isset($_POST['submit']))
{

    $title=$_POST['title'];


    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured'];
    }
    else
    {
        $featured="No";
    }

    if(isset($_POST['active']))
    {
        $active=$_POST['active'];
    }
    else
    {
        $active="No";
    }

    //check whether the image is selected or not

    //print_r($_FILES['image']);

    //die();//break the code here 



    if(isset($_FILES['image']['name']))
    {
        $imgname="";
        $imgname=$_FILES['image']['name'];  //img upload

        if($imgname!="")
        {

        

        //auto rename images
        //get the extension of the img(jpg,png etc) Ex:image.jpg
                $ext=end(explode('.',$imgname));   //split the image name based on the dot so the extension will also get split..

                //rename image
                $imgname="food_category_".rand(000,999).'.'.$ext;   //so the new image name will be like food_category_034.jpg



                $source_path=$_FILES['image']['tmp_name']; //to upload img we need img name sourcepath and destination path
                $destination_path="../images/category/".$imgname;

                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false)
                {
                    $_SESSION['upload-category']="failed to add image";
                    header("location:".$siteurl.'admin/add-category.php');
                    //stop the process
                    die();
                }
            }
    }
    else
    {
        $imgname="";
    }
  

    $sql="insert into category(title,imagename,featured,active) values('$title','$imgname','$featured','$active')";

    $res=mysqli_query($conn,$sql);

    if($res)
    { 
      $_SESSION['add']="Category Added Succesfully";
      header("location:".$siteurl.'admin/manage_category.php');

    }
    else{
        $_SESSION['add']="Failed to add category";
        header("location:".$siteurl.'admin/add_category.php');


    }

        

    
   


}

?>

<?php include('footer.php') ?>