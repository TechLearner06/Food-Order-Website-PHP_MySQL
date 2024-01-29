<?php include('partials-front/header.php'); ?>


<!--food search section starts-->
<section class="food_search">
    <div class="container container-fluid">
        <?php 
             $search=$_GET['search'];
        ?>
        
        <form action="" class="search-bar" >
           <h5>Foods on Your Search <a href="#"><?php echo $search; ?></a></h5>
        </form>
    </div>
  </section>

   <!--food search section ends-->


   <section class="healthy-section">
    <div class="container">
        <h2>Explore Foods</h2>

        <?php 
        //get the search keyword
        $search=$_GET['search'];

        $sql="select * from fooditems where name like '%$search%' or description like '%$search%'";

        $res=mysqli_query($conn,$sql);

        if($res){

        $count=mysqli_num_rows($res);

        if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $food_id=$rows['food_id'];
                    $fooditem=$rows['name'];
                    $price=$rows['price'];
                    $description=$rows['description'];
                    $imagename=$rows['image_name'];
                    ?>
                    <div class="box">
                        <div class="food-menu-img">
                            <img src="<?php echo $siteurl; ?>images/fooditems/<?php echo $imagename; ?>" class="img">
                            </div>
                            <div class="food-menu-details">
                            <h4><?php echo $fooditem; ?></h4>
                            <p class="food-price"><?php echo $price; ?></p>
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
                echo "no results found";
            }
        }


        ?>
    <div class="clearfix"></div>
    </div>

  </section>

<?php include('partials-front/footer.php'); ?>