<?php
include '../include/config.php';
session_start();
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	$query=mysqli_query($conn,"select * from distributor where email='$email'");
	while ($row=mysqli_fetch_array($query)) {
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
	<title>Distributor Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
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
		<div class="title">
			<h2><strong>Distributor dashboard</strong></h2>
		</div>
		<div class="align">
				<div class="table-dist">
					<h1><strong>Distributor details</strong></h1>
					<div class="try">
						<h3 class="one"><strong>Distributor ID:</strong></h3>
						<h3 class="two"><?php echo $national_id; ?><strong></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Distributor Name:</strong></h3>
						<h3 class="two"><strong><?php echo $dist_name; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Address:</strong></h3>
						<h3 class="two"><strong><?php echo $dist_address; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Mobile No:</strong></h3>
						<h3 class="two">+254-<strong><?php echo $dist_phone; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Email:</strong></h3>
						<h3 class="two"><strong><?php echo $dist_email; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered City:</strong></h3>
						<h3 class="two"><strong><?php echo $city_name; ?></strong></h3>						
					</div>

					<div class="try">
						<?php    

	                    echo "<div id='img_div'>";
	                    echo "<img src='../Distributor/images/".$dist_image."'>";
	                    echo "</div>";
	                    ?> 						
					</div>
				
				</div>

				<div class="content">
					<div class="line1">

						<a href="profile-view.php"><div class="square1">
							<img src="images/product1.png">
							<h3><strong>Profile</strong></h3>						
						</div></a>

						<a href="add-con.php"><div class="square2">
							<img src="images/product2.png">
							<h3><strong>Add Connection</strong></h3>						
						</div></a>
					</div>

					<div class="line1">

						<a href="manage-con.php"><div class="square1">
							<img src="images/product3.png">
							<h3><strong>Manage Consumer</strong></h3>						
						</div></a>

						<a href="check-order.php"><div class="square2">
							<img src="images/product4.png">
							<h3><strong>Check Orders</strong></h3>						
						</div></a>
					</div>

					<div class="line1">

						<a href="feedback-manage.php"><div class="square1">
							<img src="images/warehouse1.jpeg">
							<h3><strong>View Feedback & Complains</strong></h3>						
						</div></a>
					</div>
				
				</div>
			</div>
	</div>
</body>
</html>