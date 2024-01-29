<?php include('partials-front/header.php'); ?>

   <!--food search section starts-->
   <section class="food_search">
    <div class="container container-fluid">
        <form action="<?php echo $siteurl;?>foodsearch.php" method="GET" class="search-bar"  >
            <input type="text" name="search" placeholder="Discover delicious delights...">
            <button type="submit" class="icon img-fluid">Search</button>
        </form>
    </div>
  </section>


<section class="healthy-section">
    <div class="container">
        <h2>Explore Foods</h2>

        <?php 
        $sql="select * from fooditems where active='Yes'";

        $res=mysqli_query($conn,$sql);
        if($res){
         $count=mysqli_num_rows($res);
         if($count>0){
            while($rows=mysqli_fetch_assoc($res)){
               $food_id=$rows['food_id'];
               $title=$rows['name'];
               $price=$rows['price'];
               $description=$rows['description'];
               $imgname=$rows['image_name'];
               ?>
               <div class="box">
                  <div class="food-menu-img">
                  
                     <?php 
                     if($imgname==""){
                        echo "image is not available";
                     }
                     else{
                        ?>
                        
                     <img src="<?php echo $siteurl; ?>images/fooditems/<?php echo $imgname; ?>" class="img">
                     <?php
                     }
                     ?>
                  </div>
                  <div class="food-menu-details">
                     <h4><?php echo $title ?></h4>
                     <p class="food-price">$<?php echo $price ?></p>
                     <p class="food-about"><?php echo $description ?></p>
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
            echo "no foods";
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