<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_num_items = $_POST['p_num'];
   $p_weight = $_POST['p_weight'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = '../../uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, num_items, weight, price, image) VALUES('$p_name', '$p_num_items', '$p_weight', '$p_price', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      echo "<script>alert('Product added succesfully')</script>";
   }else{
      echo "<script>alert('could not add the product')</script>";
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

   <section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <a href="../home.php">Back</a>
   <input type="text" name="p_name" placeholder="Enter the Product name/Brand Name" class="box" required>
   <input type="number" name="p_num" min="1" placeholder="Enter number of items" class="box" required>
   <input type="float" name="p_weight" min="1" placeholder="Enter weight of each gas cylinder in Kgs" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="Add the product" name="add_product" class="btn">
</form>

</section>

</div>
<script src="js/script.js"></script>

</body>
</html>