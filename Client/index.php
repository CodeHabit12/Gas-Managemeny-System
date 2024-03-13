<?php
include '../include/config.php';
session_start();
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	$query=mysqli_query($conn,"select * from consumer where email='$email'");
	while ($row=mysqli_fetch_array($query)) {
		$con_name=$row['name'];
	    $national_id=$row['national_id'];
	    $con_address=$row['address'];
	    $con_email=$row['email'];
	    $con_phone=$row['phone'];
	    $city_name=$row['city'];
	    $distr_email=$row['dis_email'];
	}
	$dist_email_query=mysqli_query($conn,"select * from distributor where email='$distr_email'");
	while ($row=mysqli_fetch_array($dist_email_query)) {
		$dist_email=$row['email'];
		$dist_name=$row['fullname'];
		$dist_no=$row['phone'];
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
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
		<div class="title">
			<h2><strong>Consumer Dashboard</strong></h2>
		</div>
		<div class="align">
				<div class="table-dist">
					<h1><strong>Consumer details</strong></h1>
					<br>
					<div class="try">
						<h3 class="one"><strong>Consumer ID:</strong></h3>
						<h3 class="two"><?php echo $national_id; ?><strong></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Consumer Name:</strong></h3>
						<h3 class="two"><strong><?php echo $con_name; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Address:</strong></h3>
						<h3 class="two"><strong><?php echo $con_address; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Mobile No:</strong></h3>
						<h3 class="two">+254-<strong><?php echo $con_phone; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered Email:</strong></h3>
						<h3 class="two"><strong><?php echo $con_email; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Registered City:</strong></h3>
						<h3 class="two"><strong><?php echo $city_name; ?></strong></h3>						
					</div>

					<h1><strong>Linked Distributor Details</strong></h1>
					<div class="try">
						<h3 class="one"><strong>Distributor Email:</strong></h3>
						<h3 class="two"><?php echo $dist_email; ?><strong></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Distributor Name:</strong></h3>
						<h3 class="two"><strong><?php echo $dist_name; ?></strong></h3>						
					</div>

					<div class="try">
						<h3 class="one"><strong>Distributor Phone No.</strong></h3>
						<h3 class="two">+254-<strong><?php echo $dist_no; ?></strong></h3>						
					</div>

					
				
				</div>

				<div class="content">
					<div class="line1">

						<a href="profile-view.php"><div class="square1">
							<img src="images/product1.png">
							<h3><strong>Profile</strong></h3>						
						</div></a>

						<a href="book.php"><div class="square2">
							<img src="images/product2.png">
							<h3><strong>Book Order</strong></h3>						
						</div></a>
					</div>

					<div class="line1">

						<a href="track-order.php"><div class="square1">
							<img src="images/product3.png">
							<h3><strong>Track Order</strong></h3>						
						</div></a>

						<a href="feedback-complain.php"><div class="square2">
							<img src="images/product4.png">
							<h3><strong>View Feedback & Complainst</strong></h3>						
						</div></a>
					</div>

					
				
				</div>
			</div>
	</div>
</body>
</html>