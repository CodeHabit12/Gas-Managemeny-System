<?php
include '../include/config.php';
session_start();

if (isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    $res=mysqli_query($conn,"select * from distributor where email='$email'");
        while ($row=mysqli_fetch_array($res)) {
            $dist_name=$row['fullname'];
            $national_id=$row['Id_num'];
            $dist_address=$row['address'];
            $dist_email=$row['email'];
            $dist_phone=$row['phone'];
            $city_name=$row['city'];
            $dist_image=$row['image'];

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
                <label>Distributor Name:</label>
                <input type="text" name="edit-name" value="<?php echo $dist_name; ?>">
            </div>

            <div id="view-product">
                <label>Distributor Nationa ID:</label>
                <input type="text" name="edit-id_num" value="<?php echo $national_id; ?>">
            </div>

            <div id="view-product">
                <label>Distributor Email Adress</label>
                <input type="email" name="edit-email" value="<?php echo $dist_email; ?>">
            </div>

            <div id="view-product">
                <label>Location Address</label>
                <input type="text" name="edit-address" value="<?php echo $dist_address; ?>">
            </div>

            <div id="view-product">
                <label>Company Phone Number</label>
                <input type="number" name="edit-phone" value="<?php echo $dist_phone; ?>">
            </div>

            <div id="view-product">
                <label>City Name</label>
                <input type="text" name="edit-city" value="<?php echo $city_name; ?>">
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