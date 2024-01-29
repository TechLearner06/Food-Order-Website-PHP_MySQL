<?php include('header.php') ?>


<?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];    //displaying session message
            unset($_SESSION['add']);  //removing session meassage
        }
    ?>

    <br>

<div class="admin-add-section">
    <div class="admin-add-content">
        <h1>Add Admin</h1>
        <div class="add-admin-form">
        <form action="" method="POST">
            <table class="add-table">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="user_name" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add Admin" class="add-admin-btn"></td>
                </tr>


            </table>

         </form>

      </div>
    </div>
</div>




<?php
    if(isset($_POST['submit']))
    {
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);
      

      //sql query to save the data in the database
      $sql = "INSERT INTO admin (fullname, username, password) VALUES ('$full_name', '$user_name', '$password')";

      
     

      if(mysqli_query($conn,$sql)){
       
        //create a session varaiable to display message
        $_SESSION['add']="Admin added Successfully";

        //redirect
        header("location:".$siteurl.'admin/manage_admin.php');
      }

      else{
        $_SESSION['add']="Failed to add Admin";

        //redirect
        header("location:".$siteurl.'admin/manage_admin.php');
      
      }

    
    }

    mysqli_close($conn);
  
  
?>

<?php include('footer.php') ?>
  

</body>

</html>
