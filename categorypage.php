<?php include('partials-front/header.php');?>

<section class="food_search">
    <div class="container container-fluid">
        <form action="" class="search-bar" >
           <h5>Food Categories</a></h5>
        </form>
    </div>
  </section>


<section class="categories">
    <div class="container">
        <?php
        $sql="select * from category where active='yes'";
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

                        <img src="<?php echo $siteurl; ?>images/category/<?php echo $imgname; ?>" alt="healthy" class="img">
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
                    echo "category not found";
                }
            }
        
            
        ?>
    </div>
</section>


<?php include('partials-front/footer.php');?>