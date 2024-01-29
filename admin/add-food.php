<?php include("header.php")?>

<div class="add-food-section">
    <div class="add-food">
        <h1>Add Food details</h1>
        <br><br>

        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="POST" class="add-food-form" enctype="multipart/form-data">
            <table class="add-food-table">
                <tr>
                    <td>
                        Food Item:
                    </td>
                    <td>
                        <input type="text" name="fooditem"  placeholder="Enter food item">
                    </td>
                </tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td>
                        <input type="number" name="price"  placeholder="Enter food price">
                    </td>
                </tr>
                <tr>
                    <td>
                        Food Description:
                    </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"   placeholder="Enter food description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                         Select Image:
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
                    
                    
                    <td>
                        <input type="submit" name="submit" value="Add Food Details" class="add-food-btn">
                    </td>
                </tr>



            
            </table>
        </form>


    </div>
</div>


<?php 

if(isset($_POST['submit'])){
    $fooditem=$_POST['fooditem'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $category=$_POST['category'];


    //default value setting for featured and active

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


    
    if(isset($_FILES['image']['name']))
    {

        $imgname=$_FILES['image']['name'];  //img upload

        if($imgname!="")
        {

                   //auto rename images
                  //get the extension of the img(jpg,png etc) Ex:image.jpg
                $imgArray = explode('.', $imgname);
                $ext = end($imgArray);  //split the image name based on the dot so the extension will also get split..

                //rename image
                $imgname="food_items_".rand(000,999).'.'.$ext;   //so the new image name will be like food_category_034.jpg



                $source_path=$_FILES['image']['tmp_name']; //to upload img we need img name sourcepath and destination path
                $destination_path="../images/fooditems/".$imgname;

                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload == false)
                {
                    $_SESSION['upload'] = "failed to add image";
                    header("location:".$siteurl.'admin/add-food.php');
                    die();
                }
        }
    }
    else
    {
        $imgname="";
    }

    $sql2="insert into fooditems(name,price,description,image_name,catg_id,featured,active) values('$fooditem','$price','$description','$imgname','$category','$featured','$active')";

    $res2=mysqli_query($conn,$sql2);

    if($res2){
        $_SESSION['add-food']="Food Details Added Successfully";
        header("location:".$siteurl.'admin/manage_food.php');
    }
    else{
        $_SESSION['add-food']="Failed to add food details";
        header("location:".$siteurl.'admin/manage_food.php');
    }

}
?>





<?php include("footer.php")?>


