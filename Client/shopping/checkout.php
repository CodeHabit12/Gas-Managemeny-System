<?php

include 'config.php';
session_start();

$user_email=$_SESSION['email'];
$userdetail=mysqli_query($conn,"select * from consumer where email='$user_email'");
   while ($row=mysqli_fetch_array($userdetail)) {
      $con_name=$row['name'];
      $con_email=$row['email'];
      $con_phone=$row['phone'];
      $con_city=$row['city'];
      $con_id=$row['national_id'];
      $con_address=$row['address'];
   }


if(isset($_POST['order_btn']) && isset($_SESSION['email'])){
   $user_email=$_SESSION['email'];
  
   $method = $_POST['method'];
   $station = $_POST['station'];
    

   $userid=mysqli_fetch_row(mysqli_query($conn,"select Id from consumer where email='$user_email'"))[0];

   

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $status="Running";
   
   $detail_query = mysqli_query($conn, "INSERT INTO `table_order`(user_id,name, number, email, method,station, city,total_products, total_price,date,time,status) VALUES('$userid','$con_name','$con_phone','$con_email','$method','$station','$con_city','$total_product','$price_total',CURDATE(),CURTIME(),'$status')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$con_name."</span> </p>
            <p> your number : <span>".$con_phone."</span> </p>
            <p> your email : <span>".$con_email."</span> </p>
            <p> your address : <span>".$city.", ".$con_address."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p> your PickUp station : <span>".$station."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
            <a href='receipts.php' class='btn'>View Receipts</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : <?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your name</span>
            <p><?php echo $con_name ?></p>
         </div>
         <div class="inputBox">
            <span>Registered phone number</span>
            <p><?php echo $con_phone ?></p>
         </div>
         <div class="inputBox">
            <span>Registered National ID</span>
            <p><?php echo $con_id ?></p>
         </div>
         <div class="inputBox">
            <span>Your email</span>
            <p><?php echo $con_email ?></p>
         </div>
         <div class="inputBox">
            <span>Payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address line 1</span>
            <p><?php echo $con_address ?></p>
         </div>
         
         <div class="inputBox">
            <span>City</span>
            <p><?php echo $con_city ?></p>
         </div>

         <div class="inputBox">
            <span>PickUp station</span>
            <select name="station">
               <option value="Station1" selected>Station1</option>
               <option value="Station2">Station2</option>
               <option value="Station3">Station3</option>
            </select>
         </div>
         
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>