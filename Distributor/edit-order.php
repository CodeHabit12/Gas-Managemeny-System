<?php
include '../include/config.php';
session_start();
$view_order=$_GET["edit-order"];
$dist_name='';
$dist_address='';
$dist_email='';
$dist_phone='';
$dist_city='';
$dist_image='';
if (isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    $res=mysqli_query($conn,"select * from table_order where id='$view_order'");
        while ($row=mysqli_fetch_array($res)) {
            $con_name=$row['name'];
            $phone=$row['number'];
            $con_email=$row['email'];
            $total_products=$row['total_products'];
            $total_price=$row['total_price'];
            $date=$row['date'];
            $time=$row['time'];
            $status=$row['status'];

    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-css.css">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
</head>
<body>
    <div class="header">
        <p><a href="index.php">Distributor</a> </p>
        <a href="add-con.php">Add connection</a>
        <a href="manage-con.php">Manage consumers</a>
        <a href="check-order.php">Check orders</a>
        <a href="feedback-manage.php">View feedback & Complains</a>
        <a href="#"><?php echo $_SESSION['email'] ?></a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="view-list">
                <div class="view-title">
                <h2>Distributor Profile</h2>
            </div>

            <div id="view-product">
                <label>Consumer Name:</label>
                <input type="text" name="edit-name" value="<?php echo $con_name; ?>">
            </div>

            <div id="view-product">
                <label>Consumer Email Address:</label>
                <input type="email" name="edit-email" value="<?php echo $con_email; ?>">
            </div>

            <div id="view-product">
                <label>Phone Number</label>
                <input type="number" name="edit-phone" value="<?php echo $phone; ?>">
            </div>

            <div id="view-product">
                <label>Products</label>
                <input type="text" name="edit-product" value="<?php echo $total_products; ?>">
            </div>

            <div id="view-product">
                <label>Total Price</label>
                <input type="number" name="edit-price" value="<?php echo $total_price; ?>">
            </div>

            <!-- <div id="view-product">
                <label>Date</label>
                <p><?php echo $date; ?></p>
            </div>

            <div id="view-product">
                <label>Time</label>
                <p><?php echo $time; ?></p>
            </div> -->

            <div id="view-product">
                <label>Status</label>
                <select name="status">
                    <option selected>Select Option</option>
                    <option>Delivered</option>
                    <option>Running</option>
                </select>
            </div>
            
            <div class="form-input">
                <?php    

                    echo "<div id='img_div'>";
                    echo "<img src='../Distributor/images/".$dist_image."'>";
                    echo "</div>";
                    ?>                    
            </div> 
            <div class="form-input">
                <input type="file"  id="update-img" name="edit-p_image" value="<?php echo $dist_image ?>" id="image" >
            </div>

             <div id="view-product">
                    <input type="submit" name="update-user" placeholder="Update" id="submit">
                </div>
            </div>         
        </form>
        </div>
          

</body>
</html>

<?php

if (isset($_POST['update-user'])) {
    $name_update=$_POST['edit-name'];
    // $id_update=$_POST['edit-id_num'];
    $email_update=$_POST['edit-email'];
    $product_update=$_POST['edit-product'];
    $phone_update=$_POST['edit-phone'];
    $price_update=$_POST['edit-price'];
    $status=$_POST['status'];
    // $img_update=$_POST['edit-p_image'];
    $img_update = $_FILES['edit-p_image']['name'];
    $p_image_tmp_name = $_FILES['edit-p_image']['tmp_name'];
    $p_image_folder = '../Distributor/images/'.$img_update;

    $update=mysqli_query($conn,"update table_order set name='$name_update',
        email='$email_update',total_products='$product_update',number='$phone_update',total_price='$price_update',date=CURDATE(),time=CURTIME(),status='$status' where id='$id'");

    if ($update) {
        echo "<script>alert('Update successful')</script>";
        echo "<script>location.href='manage.php'</script>";
    }
    else{
        echo "<script>alert('Update is not successful')</script>";
    }
}

?>