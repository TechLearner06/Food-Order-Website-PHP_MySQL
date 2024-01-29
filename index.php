
<?php include('partials-front/header.php'); ?>

   <!--food search section starts-->
   <section class="food_search">
    <div class="container container-fluid">
        <form action="<?php echo $siteurl;?>foodsearch.php" method="GET" class="search-bar" >
            <input type="text" name="search" placeholder="Discover delicious delights..." required="">
            <button type="submit" class="icon img-fluid">Search</button>
        </form>
    </div>
  </section>




   <!--food search section ends-->

   <!--category section starts-->
   <section class="home-categories">
    <div class="home-container">
        <h2 class="heading-style">A Feast for Every Craving: Category Extravaganza</h2>

        <?php 
            $sql="select * from category where featured='Yes' and active='yes' limit 3";
            $res=mysqli_query($conn,$sql);
            
            if($res)
            {
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {

                    
                
                       //get values like id,image,title
                        $id=$rows['catg_id'];
                        $imgname=$rows['imagename'];
                        $title=$rows['title'];
                        ?>
                
                          
                        <a href="<?php echo $siteurl; ?>category-foods.php?catg_id=<?php echo $id;?>" >
                                <div class="card">
                                    <?php
                                        if($imgname=="")
                                        {
                                            echo "Image not available";
                                        }
                                        else{
                                        
                                        ?>

                                        <img src="<?php echo $siteurl; ?>images/category/<?php echo $imgname; ?>" alt="healthy" class="img-fluid">
                                        <?php
                                        }
                                    ?>
                                    <div class="intro">
                                        <h4><?php echo $title; ?></h4>   
                                    </div>
                        
                                </div>
                            </a>
                            
                            <?php
                    }  
                }
                else
                {
                     //categories not available
                    echo "category not added";
                }
            }
        
            
        ?>
        

                
    </div>
</section>

<div class="clearfix"></div>

   <!--category section ends-->



   <!--food menu section starts-->
 <section class="food_menu">
    <div class="container container-fluid">

        <div class="row">
           <div class="col-sm-6">
           
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    

                        <?php
                        $sql2="select * from fooditems where active='Yes' and featured='Yes' limit 3";

                        $res2=mysqli_query($conn,$sql2);

                        if($res2){
                            $count=mysqli_num_rows($res2);
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res2))
                                {
                                    $food_id=$rows['food_id'];
                                    $foodtitle=$rows['name'];
                                    $description=$rows['description'];
                                    $imagename=$rows['image_name'];
                                    ?>   
                                        <a href="foods.php">
                                          <div class="carousel-item active">
                                            <img src="<?php echo $siteurl; ?>images/fooditems/<?php echo $imagename; ?>" alt="Los Angeles" class="d-block img-fluid">
                                            <div class="carousel-caption">
                                                <h3><?php echo $foodtitle; ?></h3></a>
                                                <p><?php echo $description; ?></p>
                                            </div>
                                         </div>
                                        </a>
                                    
                                    <?php




                                }

                            }
                            else{
                                echo "no foods are added";
                            }
                        
                        
                        }
                        
                        ?>
                        </div>
                    
                
                
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
           </div>
            
           <div class="food-trending col-sm-6">
                <h4>Indulge your senses in a journey of taste and trends!</h4>
           </div>
      </div>
    </div>
</section>
   <!--food menu section ends-->

<?php include('partials-front/footer.php'); ?>

   