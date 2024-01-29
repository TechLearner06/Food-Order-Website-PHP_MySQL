
<?php include("header.php") ?>


<div class="main-section">
    <div class="main-content">
        

        <h1>Change Password</h1>


        <?php
       
          if(isset($_GET['id'])){
            $id=$_GET['id'];
          }
        
        ?>

        

        <br><br>
       
        <form action="" method="POST" class="add-admin-form">
            <table class="add-table">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="oldpswd" placeholder="Enter current password">
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="newpswd" placeholder="Enter new password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirmpswd" placeholder="Confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Change Password" class="add-admin-btn">
                    </td>
                    
                </tr>

</table>




</form>


</div>
</div>

<?php
  if(isset($_POST['submit'])){
    
    $id=$_POST['id'];
    $currentpassword=md5($_POST['oldpswd']);
    $newpassword=md5($_POST['newpswd']);
    $confirmpassword=md5($_POST['confirmpswd']);

    $sql="select * from admin where id=$id and password='$currentpassword'"; 
    $res=mysqli_query($conn,$sql);
    if($res){
        $count=mysqli_num_rows($res);
        if($count==1)
        {
           if( $newpassword==$confirmpassword)
           {
            $sql2="update admin set password='$newpassword' where id=$id";
            $res2=mysqli_query($conn,$sql2);
            if($res2){
                $_SESSION['change']="Password Updated";
                header("location:".$siteurl.'admin/manage_admin.php');
                }
            }
            else{
               
                $_SESSION['pswd-not-match'] = "password did not match";
                header("location:".$siteurl.'admin/manage_admin.php');
            }

       }
        else{
            $_SESSION['user-not-found']="User not Found";
            header("location:".$siteurl.'admin/manage_admin.php');
        }
  }
  }
  
 ?>








<?php include("footer.php") ?>