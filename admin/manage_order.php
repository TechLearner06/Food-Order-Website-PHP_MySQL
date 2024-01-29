<?php include('header.php') ?>

<!-- main content section starts -->
<div class="main-section">
  <div class="main-content">
    <h2>Manage Order</h2>
    <br><br>
    <?php
    if(isset($_SESSION['update-order']))
        {
            echo $_SESSION['update-order'];    
            unset($_SESSION['update-order']); 
        }
    ?>
    
    <div class="admin-table">
    <table>
        <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Contact</th>
            <th>Customer E-mail</th>
            <th>Action</th>
       </tr>

       <?php
       $sql="select * from food_order order by order_id desc ";

       $res=mysqli_query($conn,$sql);
       
       if($res){
        $count=mysqli_num_rows($res);
        $sn=1;
        if($count>=1){
            while($rows=mysqli_fetch_assoc($res)){
                $id=$rows['order_id'];
                $food=$rows['food'];
                $price=$rows['price'];
                $quantity=$rows['quantity'];
                $total=$rows['total'];
                $order_date=$rows['order_date'];
                $status=$rows['status'];
                $name=$rows['cus_name'];
                $phno=$rows['phno'];
                $email=$rows['email'];
                $address=$rows['address'];
                ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $food; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td>
                        <?php
                        if($status=="Ordered"){
                            echo "<label>$status</label>";
                        }
                        elseif($status=="On Delivery"){
                            echo "<label style='color:orange;'>$status</label>";
                        }
                        elseif($status=="Delivered"){
                            echo "<label style='color:green;'>$status</label>";
                        }
                        elseif($status=="Cancelled"){
                            echo "<label style='color:red;'>$status</label>";
                        }
                        ?>
                    </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $phno; ?></td>
                    <td><?php echo $email ?></td>
                    <td>
                        <a href="<?php echo $siteurl;?>admin/update-order.php?order_id=<?php echo $id;?>" class="update-btn">Update Order</a>
                    </td>
                </tr>
                <?php


            }
        }
        else{
            echo "no orders yet";
        }
       }

       ?>

       

    </table>

</div>
            
  </div>

</div>
<!-- main content  section ends -->


<?php include('footer.php') ?>
  

</body>

</html>
