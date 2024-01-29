<?php include('header.php') ?>
<!-- main content section starts -->
<div class="main-section">
  <div class="main-content">
    <h2>Manage Food</h2>
    <br>
    
    <?php
    if(isset($_SESSION['add-food']))
        {
            echo $_SESSION['add-food'];    
            unset($_SESSION['add-food']); 

        }

        if(isset($_SESSION['food-delete']))
        {
            echo $_SESSION['food-delete'];    
            unset($_SESSION['food-delete']); 
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];    
            unset($_SESSION['upload']); 
        }

        if(isset($_SESSION['img-remove']))
        {
            echo $_SESSION['img-remove'];    
            unset($_SESSION['img-remove']); 
        }

        if(isset($_SESSION['food-update']))
        {
            echo $_SESSION['food-update'];    
            unset($_SESSION['food-update']); 
        }

    ?>

        <br><br>

    <div class="add-admin">
        <a href="<?php echo $siteurl ?>admin/add-food.php" class="add-admin">Add Food</a>
    </div>


    
    <div class="admin-table">
    <table>
        <tr>
            <th>S.N</th>
            <th>Food Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Action</th>
       </tr>

       <?php 
       $sql="select * from fooditems";

       $res=mysqli_query($conn,$sql);

       if($res){
        $count=mysqli_num_rows($res);
        $sn=1;

        if($count>1){
            while($rows=mysqli_fetch_assoc($res))
            {
                $id=$rows['food_id'];
                $fooditem=$rows['name'];
                $price=$rows['price'];
                $description=$rows['description'];
                $imgname=$rows['image_name'];
                $category=$rows['catg_id'];
                $featured=$rows['featured'];
                $active=$rows['active'];
                ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $fooditem; ?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $description;?></td>
                    <td>
                    <?php
                    if($imgname!="")
                    {
                        ?>
                        <img src="<?php echo $siteurl;?>images/fooditems/<?php echo $imgname ?>" width="80px" height="80px">
                        <?php
                    }
                    else{
                        echo "Image not Added";
                    }
                    ?>
                    </td>
                    <td><?php echo $category;?></td>
                    <td><?php echo $featured;?></td>
                    <td><?php echo $active;?></td>

                    <td>
                        <a href="<?php echo $siteurl;?>admin/update-food.php?food_id=<?php echo $id; ?>" class="update-btn">Update Food</a>
                        <a href="<?php echo $siteurl;?>admin/delete-food.php?food_id=<?php echo $id; ?>" class="del-btn">Delete Food</a>
                    </td>
                </tr>

                <?php

            }
        }
       }

       ?>

    </table>

</div>
            
  </div>

</div>
<!-- main content  section ends -->


<?php include('footer.php') ?>
  

</body>

</html>
