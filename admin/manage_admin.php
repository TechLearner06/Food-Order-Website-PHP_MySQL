<?php include('header.php') ?>

<!-- main content section starts -->
<div class="main-section">
  <div class="main-content">
    <h2>Manage Admin</h2>

    <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];    //displaying session message
            unset($_SESSION['add']);  //removing session meassage

        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];    //displaying session message
            unset($_SESSION['delete']);  //removing session meassage

        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];    //displaying session message
            unset($_SESSION['update']);  //removing session meassage

        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];    //displaying session message
            unset($_SESSION['user-not-found']);  //removing session meassage

        }
        if(isset($_SESSION['change']))
        {
            echo $_SESSION['change'];    //displaying session message
            unset($_SESSION['change']);  //removing session meassage

        }
        if(isset($_SESSION['pswd-not-match']))
        {
            echo $_SESSION['pswd-not-match'];    //displaying session message
            unset($_SESSION['pswd-not-match']);  //removing session meassage

        }
        
        

    ?>
    <br><br>


    <a href="add-admin.php" class="add-admin">Add Admin</a>
    
    
    <div class="admin-table">
    <table>
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
       </tr>

       <?php
         
         $sql="select * from admin";
         $res=mysqli_query($conn,$sql);

        if($res)
        {
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)  //to assign the serailno start from zero
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id=$rows['id'];
                    $full_name=$rows['fullname'];
                    $user_name=$rows['username']

                    ?>
                      <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $user_name;?></td>
                            <td>
                                
                                <a href="<?php echo $siteurl;?>admin/update-admin.php?id=<?php echo $id;?>" class="update-btn">Update Admin</a>
                                <a href="<?php echo $siteurl;?>admin/delete-admin.php?id=<?php echo $id;?>" class="del-btn">Delete Admin</a>
                                <a href="<?php echo $siteurl;?>admin/change_password.php?id=<?php echo $id;?>" class="update-btn">Change Password</a>
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
