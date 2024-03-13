<?php
include '../include/config.php';
session_start();

$id=$_GET["view-Id"];
$dist_name='';
$dist_address='';
$dist_email='';
$dist_phone='';
$dist_city='';
$dist_image='';

$res=mysqli_query($conn,"select * from distributor where Id='$id'");
while ($row=mysqli_fetch_array($res)) {
    $dist_name=$row['fullname'];
    $national_id=$row['Id_num'];
    $dist_address=$row['address'];
    $dist_email=$row['email'];
    $dist_phone=$row['phone'];
    $city_name=$row['city'];
    $dist_image=$row['image'];

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
        <p>Admin</p>
        <a href="../admin/shopping/products.php">Manage Stock</a>
        <a href="manage.php">Manage Distributors</a>
        <a href="feedbackComplain.php">View Feedback & Complains</a>
        <!-- <a href="#"><?php echo $email; ?></a> -->
        <a href="logout.php">Log out</a>
    </div>
    <div class="main">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="view-list">
                <div class="view-title">
                <h2>View Distributor</h2>
            </div>

            <div id="view-product">
                <label>Distributor Name:</label>
                <p><?php echo $dist_name; ?></p>
            </div>

            <div id="view-product">
                <label>Distributor Email Adress</label>
                <p><?php echo $dist_email; ?></p>
            </div>

            <div id="view-product">
                <label>Location Address</label>
                <p><?php echo $dist_address; ?></p>
            </div>

            <div id="view-product">
                <label>Company Phone Number</label>
                <p>+254-<?php echo $dist_phone; ?></p>
            </div>

            <div id="view-product">
                <label>City Name</label>
                <p><?php echo $city_name; ?></p>
            </div>
            
            <!-- <div class="form-input">
                <?php    

                    echo "<div id='img_div'>";
                    echo "<img src='../uploaded_img/".$product_image."'>";
                    echo "</div>";
                    ?>                    
            </div> 
 -->
            </div>              
        </form>
        </div>
          

</body>
</html>

<?php

if (isset($_POST['update-user'])) {
    $name_update=$_POST['edit-name'];
    $id_update=$_POST['edit-id_num'];
    $email_update=$_POST['edit-user_email'];
    $role_update=$_POST['edit-roles'];
    $img_update=$_POST['edit-p_image'];

    $update=mysqli_query($conn,"update table users set national='$id_update',name='$name_update,
        email='$email_update',role='$role_update',image='$img_update' where Id='$id'");

    if ($update) {
        echo "<script>alert('Update successful')</script>";
        echo "<script>location.href='manage-user.php'</script>";
    }
    else{
        echo "<script>alert('Update is not successful')</script>";
    }
}

?>