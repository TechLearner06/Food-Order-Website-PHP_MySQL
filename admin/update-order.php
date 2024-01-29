<?php include('header.php');?>

<?php
    if(isset($_GET['order_id'])){
        $id=$_GET['order_id'];

        $sql="select * from food_order where order_id=$id";
        $res=mysqli_query($conn,$sql);
        if($res){
            $count=mysqli_num_rows($res);
            if($count==1){

               $row=mysqli_fetch_assoc($res);
               $foodname=$row['food'];
               $price=$row['price'];
               $qty=$row['quantity'];
               $status=$row['status'];
               $cusname=$row['cus_name'];
               $cusaddress=$row['address'];
               $cusphno=$row['phno'];
               $cusemail=$row['email'];
            }
            else{
                echo "no orders";
            }
        }
    }
    else{
        header("location:".$siteurl.'admin/manage_orer.php');
    }
?>

<div class="update-order-section">
  <div class="update-order">
    <h2>Update Order</h2>
    <br><br>
    <form action="" method="POST" class="update-order-form">
        <table class="update-order-table">
            <tr>
                <td>Food Name</td>
                <td><?php echo $foodname;?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>$<?php echo $price;?></td>
            </tr>
            <tr>
                <td>Qty</td>
                <td><?php echo $qty;?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status">
                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery"){echo "selected";} ?>  value="On Delivery">On Delivery</option>
                        <option <?php if($status=="Delivered"){echo "selected";} ?>  value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancelled"){echo "selected";} ?>  value="Cancelled">Cancelled</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <td><input type="submit" name="submit" value="Update order" class="update-order-btn">
            </td>
            </tr>

           

        </table>
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $status=$_POST['status'];
        $sql2="update food_order set status='$status' where order_id=$id";
        $res2=mysqli_query($conn,$sql2);
        if($res2){
            $_SESSION['update-order']="Update order status successfully";
            header("location:".$siteurl.'admin/manage_order.php');
        }
        else{
            $_SESSION['update-order']="Failed to update order status";
            header("location:".$siteurl.'admin/manage_order.php');

        }
    }
    ?>

</div>
</div>




<?php include('footer.php'); ?>
