<?php include('header.php') ?>

<?php
 if(isset($_SESSION['login']))
 {
     echo $_SESSION['login'];    //displaying session message
     unset($_SESSION['login']);  //removing session meassage

 }
 ?>


<!-- main content section starts -->
<div class="main-section">
  <div class="main-content">
    <h1>DASHBOARD</h1>
      <div class="col-4 text-center">
        <?php 
           $sql="select * from category";
           $res=mysqli_query($conn,$sql);
           if($res){
            $count=mysqli_num_rows($res);
           }
        ?>
          <h1><?php echo $count; ?></h1>
          Categories
      </div>
      <div class="col-4 text-center">

      <?php 
           $sql2="select * from fooditems";
           $res2=mysqli_query($conn,$sql2);
           if($res2){
            $count2=mysqli_num_rows($res);
           }
        ?>
          <h1><?php echo $count2; ?></h1>
          Foods
      </div>

      <div class="col-4 text-center">
      <?php 
           $sql3="select * from food_order";
           $res3=mysqli_query($conn,$sql3);
           if($res3){
            $count3=mysqli_num_rows($res3);
           }
        ?>
          <h1><?php echo $count3; ?></h1>
          Total Orders
      </div>

      <div class="col-4 text-center">

        <?php
        //create sql query to get otal revenue generated
        //aggragate function in sql
        $sql4="select sum(total) as Total from food_order where status='Delivered'";
        $res4=mysqli_query($conn,$sql4);
        $row=mysqli_fetch_assoc($res4);

        $total=$row['Total'];
           
        ?>
          <h1>$<?php echo $total;?></h1>
          Revenue 
      </div>

      <div class="clearfix"></div>






  </div>

</div>
<!-- main content  section ends -->


<?php include('footer.php') ?>
  

</body>

</html>



        

    