<?php include('partials-front/header.php'); ?>

<?php 
if(isset($_GET['catg_id'])){
$id=$_GET['catg_id'];
//get category title
$sql2="select title from category where catg_id=$id";
$res2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($res2);
$title=$row['title'];
}
else{
   header("location:".$siteurl);
}
?>

   <!--food search section starts-->
   <section class="food_search">
    <div class="container container-fluid">
        <form action="" class="search-bar">
       
            <h4><?php echo $title;?></h4>
        </form>
    </div>
  </section>

  <section class="healthy-section">
    <div class="container">
        
            <?php
            $sql="select * from fooditems where catg_id=$id";

            $res=mysqli_query($conn,$sql);

            if($res){
               $count=mysqli_num_rows($res);
                  if($count>0){
                     while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['catg_id'];
                        $food_id=$rows['food_id'];
                        $fooditem=$rows['name'];
                        $price=$rows['price'];
                        $description=$rows['description'];
                        $imgname=$rows['image_name'];

                        ?>
                        <div class="box">
                           <div class="food-menu-img">
                              <img src="<?php echo $siteurl;?>images/fooditems/<?php echo $imgname;?>"  class="img">
                           </div>
                           <div class="food-menu-details">
                              <h4><?php echo $fooditem;?></h4>
                              <p class="food-price">$<?php echo $price;?></p>
                              <p class="food-about"><?php echo $description; ?></p>
                        </div>
                        <div class="order-cart">
                              <a href="<?php echo $siteurl; ?>order.php?food_id=<?php echo $food_id; ?>" class="order-btn addToCartBtn">Order Now</a>
                              
                           </div>
                        <div class="clearfix"></div>
                        </div>


                        <?php
                        
                     }

                  }
                  else{
                     echo "no foods are available on this category now";
                  }
               }
            
            ?>

        
        <div class="clearfix"></div>

    </div>

  </section>



  




  <!--footer section starts-->
  <?php include('partials-front/footer.php'); ?>

</script>


</body>
</html>