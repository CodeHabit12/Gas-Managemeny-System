<?php
include 'config.php';
// session_start();
// $user_email=$_SESSION['email'];
// session_destroy();
?>
<header class="header">

   <div class="flex">

      <a href="#" class="logo">Gas Cylinders & Related Items</a>

      <nav class="navbar">
         <a href="../index.php">Home</a>
         <a href="edit-product.php">View products</a>
         <a href="products.php">Book</a>

      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart` ") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">Cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>
      <!-- <p class="cart"><?php echo $email; ?></p> -->
      <a href="../logout.php" class="cart">Logout</a>
   </div>

</header>
