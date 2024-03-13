<?php
include '../include/config.php';
session_start();

if (isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    $res=mysqli_query($conn,"select * from consumer where email='$email'");
        while ($row=mysqli_fetch_array($res)) {
            $con_name=$row['name'];
		    $national_id=$row['national_id'];
		    $con_address=$row['address'];
		    $con_email=$row['email'];
		    $con_phone=$row['phone'];
		    $city_name=$row['city'];
		    $distr_email=$row['dis_email'];
		    $con_image=$row['image'];
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
        <p><a href="index.php">Consumer</a> </p>
		<a href="book.php">Book Order</a>
		<a href="track-order.php">Track your refill</a>
		<a href="feedback-complain.php">Feedback & Complaints</a>
		<!-- <a href="#"><?php echo $conname ?></a> -->
		<a href="logout.php">Logout</a>
    </div>
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="view-list">
                <div class="view-title">
                <h2>Consumer Profile</h2>
            </div>

            <div id="view-product">
                <label>Consumer Name:</label>
                <input type="text" name="edit-name" value="<?php echo $con_name; ?>">
            </div>

            <div id="view-product">
                <label>Nationa ID:</label>
                <input type="text" name="edit-id_num" value="<?php echo $national_id; ?>">
            </div>

            <div id="view-product">
                <label>Email Adress</label>
                <input type="email" name="edit-email" value="<?php echo $con_email; ?>">
            </div>

            <div id="view-product">
                <label>Location Address</label>
                <input type="text" name="edit-address" value="<?php echo $con_address; ?>">
            </div>

            <div id="view-product">
                <label>Phone Number</label>
                <input type="number" name="edit-phone" value="<?php echo $con_phone; ?>">
            </div>

            <div id="view-product">
                <label>City Name</label>
                <input type="text" name="edit-city" value="<?php echo $city_name; ?>">
            </div>
            
            <div class="form-input">
                <?php    

                    echo "<div id='img_div'>";
                    echo "<img src='images/".$con_image."'>";
                    echo "</div>";
                    ?>                    
            </div> 
            <!-- <div class="form-input">
                <input type="file"  id="update-img" name="edit-p_image" value="<?php echo $dist_image ?>" id="image" >
            </div> -->

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
    $id_update=$_POST['edit-id_num'];
    $email_update=$_POST['edit-email'];
    $address_update=$_POST['edit-address'];
    $phone_update=$_POST['edit-phone'];
    $city_update=$_POST['edit-city'];
    // $img_update=$_POST['edit-p_image'];
    $img_update = $_FILES['edit-p_image']['name'];
    $p_image_tmp_name = $_FILES['edit-p_image']['tmp_name'];
    $p_image_folder = '../Distributor/images/'.$img_update;

    $update=mysqli_query($conn,"update distributor set Id_num='$id_update',fullname='$name_update',
        email='$email_update',address='$address_update',phone='$phone_update',city='$city_update',date=CURDATE(),time=CURTIME(),image='$img_update' where Id='$id'");

    if ($update) {
        echo "<script>alert('Update successful')</script>";
        echo "<script>location.href='manage.php'</script>";
    }
    else{
        echo "<script>alert('Update is not successful')</script>";
    }
}

?>