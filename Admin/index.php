<?php
include '../include/config.php';
session_start();
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	$name=mysqli_fetch_row(mysqli_query($conn,"select fullname from distributor where email='$email'"))[0];
	$dis_total=mysqli_fetch_row(mysqli_query($conn,"select count(email) from distributor"))[0];
	$cons_total=mysqli_fetch_row(mysqli_query($conn,"select count(email) from consumer"))[0];
	$feed_total=mysqli_fetch_row(mysqli_query($conn,"select count(Serial) from feedback_and_complaint"))[0];
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
</head>
<body>
	<div class="header">
		<p>Admin</p>
		<a href="../admin/shopping/products.php">Manage Stock</a>
		<a href="manage.php">Manage Distributors</a>
		<a href="feedbackComplain.php">View Feedback & Complains</a>
		<a href="#"><?php echo $email; ?></a>
		<a href="logout.php">Log out</a>
	</div>

	<div class="main">
		<div class="title">
			<h2><strong>Admin dashboard</strong></h2>
		</div>

		<div class="sq">
			<div class="sqr">
				<img src="../images/person.png">
				<p>Total Distributors</p>
				<h2><?php echo $dis_total;  ?></h2>
			</div>

			<div class="sqr">
				<img src="../images/person.png">
				<p>Total Consumers</p>
				<h2><?php echo $cons_total;  ?></h2>
			</div>

			<div class="sqr">
				<img src="../images/person.png">
				<p>Total feedbacks & <br>Complain</p>
				<h2><?php echo $feed_total;  ?></h2>
			</div>


		</div>
	</div>

</body>
</html>