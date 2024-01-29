<?php include("header.php"); ?>

<div class="main-section">
  <div class="main-content">
    <h1>Update Admin</h1>
    <br><br>

    <?php 

    $id=$_GET['id'];
    $sql="select * from admin where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
        $count=mysqli_num_rows($res);
    
        
        if($count==1){
            $row=mysqli_fetch_assoc($res);
            $full_name=$row['fullname'];
            $user_name=$row['username'];


        }
        else{
            header("location:".$siteurl.'admin/manage_admin.php');
        }
    
    }
    ?>
    <form action="" class="add-admin-form" method="POST">
    <table class="add-table">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="user_name" value="<?php echo $user_name ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <td><input type="submit" name="submit" value="Update" class="add-admin-btn"></td>
                </tr>


            </table>

         </form>

  
</div>
</div>

<?php

if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $user_name=$_POST['user_name'];

    $sql="update admin set fullname='$full_name',username='$user_name' where id='$id'";

    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['update']="Updated Successfully";
        header("location:".$siteurl.'admin/manage_admin.php');
    }
    else{
        $_SESSION['update']="Can't Update!!!";
        header("location:".$siteurl.'admin/manage_admin.php');
    }

        

}
?>




<?php include("footer.php"); ?>