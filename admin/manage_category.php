<?php include('header.php') ?>

<!-- main content section starts -->
<div class="main-section">
  <div class="main-content">
    <h2>Manage Category</h2>

    <br>

    <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset( $_SESSION['add']);
        }

        if(isset($_SESSION['catg_delete']))
        {
            echo $_SESSION['catg_delete'];    //displaying session message
            unset($_SESSION['catg_delete']);  //removing session meassage

        }
        if(isset($_SESSION['catg-not-found']))
        {
            echo $_SESSION['catg-not-found'];    //displaying session message
            unset($_SESSION['catg-not-found']);  //removing session meassage

        }

        if(isset($_SESSION['update_catg']))
        {
            echo $_SESSION['update_catg'];    //displaying session message
            unset($_SESSION['update_catg']);  //removing session meassage

        }

        if(isset($_SESSION['upload-catg']))
        {
            echo $_SESSION['upload-catg'];    //displaying session message
            unset($_SESSION['upload-catg']);  //removing session meassage

        }
        
        if(isset($_SESSION['img-remove']))
        {
            echo $_SESSION['img-remove'];    //displaying session message
            unset($_SESSION['img-remove']);  //removing session meassage

        }
        ?>

        <br><br>

    <div class="add-admin">
        <a href="<?php echo $siteurl;?>admin/add-category.php" class="add-admin">Add Category</a>
    </div>

    <br>

    
    <div class="admin-table">
    <table>
        <tr>
            <th>S.N</th>
            <th>Category</th>
            <th>Image Name</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Action</th>
       </tr>

       <?php

       $sql="select * from category";

       $res=mysqli_query($conn,$sql);

       if($res)
       {
        $count=mysqli_num_rows($res);
        $sn=1;
       
       if($count>0)
       {
        while($rows=mysqli_fetch_assoc($res))
        {
            $id=$rows['catg_id'];
            $title=$rows['title'];
            $imgname=$rows['imagename'];
            $featured=$rows['featured'];
            $active=$rows['active'];

            ?>

           <tr>
                <td><?php echo $sn++,"."; ?></td>
                <td><?php echo $title;?></td>
                <td>
                    <?php
                    if($imgname!="")
                    {
                        ?>
                        <img src="<?php echo $siteurl;?>images/category/<?php echo $imgname ?>" width="100px" height="80px">
                        <?php
                    }
                    else{
                        echo "Image not Added";
                    }
                    ?>
                </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td>
                    <a href="<?php echo $siteurl;?>admin/update-category.php?catg_id=<?php echo $id;?>" class="update-btn">Update Category</a>
                    <a href="<?php echo $siteurl;?>admin/delete-category.php?catg_id=<?php echo $id;?>" class="del-btn">Delete Category</a>
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
