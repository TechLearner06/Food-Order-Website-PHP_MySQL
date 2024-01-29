<?php include("../database/database.php")?>



<html>
    <head>
        <title>Login-Food order System</title>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">

    </head>
    <body>
        <div class="login-page-container">
            <div class="login-page">
              <div class="login-heading">Admin-Login Page</div><br><br>

              <?php
                  if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                  }

                  if(isset($_SESSION['no-login-msg'])){
                    echo $_SESSION['no-login-msg'];
                    unset($_SESSION['no-login-msg']);
                }
               ?>



              <div class="login-form">
                <form action="" method="POST">
                    <label>User Name:</label><br>
                    <input type="text" name="user_name" placeholder="enter username"required=""><br><br>

                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="enter password"><br><br>
                    <input type="submit" name="submit" value="Login" class="login-button" required="">
                </form>
                
               </div>
            
              
              <div class="login-footer">
                 
                 <h4>Copyright reserved by @abc</h4>
               </div>

          </div>
</div>

  

</body>

</html>

<?php 

if(isset($_POST['submit']))
{
    $user_name=$_POST['user_name'];
    $password=md5($_POST['password']);

    $sql="select * from admin where username='$user_name' and password='$password'";
    $res=mysqli_query($conn,$sql);

    if($res){
        $count=mysqli_num_rows($res);

        if($count==1){
            $_SESSION['login']="login successfully";
            $_SESSION['user']=$username;

            header("location:".$siteurl.'admin/index.php');
        }
        else{
            $_SESSION['login']="Incorrect username or password";
            header("location:".$siteurl.'admin/Loginpage.php');
        }

            

        }
}

?>
