<?php include('partials-front/header.php'); ?>

<?php 

$imgname = $title = $price = "";

if(isset($_GET['food_id']))
{
    $food_id=$_GET['food_id'];

    $sql="select * from fooditems where food_id=$food_id";

    $res=mysqli_query($conn,$sql);
    
    if($res){
        $count=mysqli_num_rows($res);
        

        if($count>0)
        {
            $rows=mysqli_fetch_assoc($res);
            $food_id=$rows['food_id'];
            $title=$rows['name'];
            $price=$rows['price'];
            $imgname=$rows['image_name'];
        }
        else
        {
            header("location:".$siteurl);
        }
    }
}

?>



<section class="order-page">
    <div class="order-container">
    

        <fieldset>
         <h4 class="form-heading">Fill this form to confirm your order</h4>
         <form method="POST" class="order-form">
            <div class="product-img">

                <?php
                    if($imgname==""){
                        echo "image not available";
                    }
                    else{
                        ?>
                        <img src="<?php echo $siteurl;?>/images/fooditems/<?php echo $imgname;?>" class="img">
                        <?php
                    }
                ?>
            </div>
                    

            <div class="food-menu-desc">
               
                <h5><?php echo $title; ?></h5>
                <input type="hidden" name="title" value="<?php echo $title; ?>">
                <h5><?php echo $price; ?></h5>
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <h6>Quantity</h6>
                <input type="number" value="1" name="qty">
            </div>
                
        </fieldset>

        <fieldset>


            <!-- User Details Form -->
            
            <div class="form">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" id="name" name="cus_name" required=""></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" id="address" name="address" required=""></td>
                    </tr>
                    <tr>
                        <td>Phone No</td>
                        <td><input type="text" id="phno" name="phno" required=""></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td><input type="text" id="email" name="email" required=""></td>
                    </tr>
    
                <!-- Payment Method Options -->
                    <tr>

                        <td><h3 class="payment-heading">Choose Payment Method:</h3></td>
                        <td></td>
                   </tr>
                    <tr>
                        <td><input type="radio" id="cashOnDelivery" name="paymentMethod" required="">Cash on delivery</td>
                        <td><input type="radio" id="onlinePayment" name="paymentMethod" required="">Online Payment</td>
                        <!-- Include more payment options as needed -->
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <div class="sub-btn">
                        <input type="submit" name="submit" value="Confirm Order" class="submitOrder">
                    </div>
                </td>
               
                </table>
            </form>
          </div>
        </fieldset>
          

          <!--check whether the submit is clicked or not.storing data from the formto the datbase-->
           
          <?php
          if(isset($_POST['submit'])){
            
            $food=$_POST['title'];
            $price=$_POST['price'];
            $quantity=$_POST['qty'];
            $total=$price* $quantity;
            $order_date=date("y-m-d h:i:sa");  //orderdate  it will get the current date and time

            $status="Ordered";    //ordered,ondelivery,Delivared,cancelled

            $cus_name=$_POST['cus_name'];
            $address=$_POST['address'];
            $phno=$_POST['phno'];
            $email=$_POST['email'];
            

            $sql2="insert into food_order(food,price,quantity,order_date,status,total,cus_name,address,phno,email) values( '$food',$price,$quantity,'$order_date','$status',$total,'$cus_name','$address',$phno,'$email')";

            $res2=mysqli_query($conn,$sql2);
            if($res2){
                
               echo "Food Ordered Succesfully";
            }
            else{
                
               echo "failed to order";
            }




          }
          ?>





          
        
        
    </div>
   </section>

   <?php include('partials-front/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>