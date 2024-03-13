<?php
include '../include/config.php';

session_start();
if (isset($_SESSION['email']) && isset($_POST['submit'])) {
	$email=$_SESSION['email'];

	$feed=$_POST['feed'];
	$select=$_POST['product'];
	$msg=$_POST['message'];

	$consumer=mysqli_query($conn,"select * from consumer where email='$email'");
	while ($row=mysqli_fetch_array($consumer)) {
		$consname=$row['name'];
		$con_id=$row['Id'];
		$dis_email=$row['dis_email'];
		$did=$row['did'];
	}
	$query="insert into feedback_and_complaint(cid,did,consumer_email,d_email,consumer_name,date,time,type,subject,description) values('$con_id','$did','$email','$dis_email', '$consname',CURDATE(),CURTIME(),'$feed','$select','$msg')";
	$execute=mysqli_query($conn,$query);
	if ($execute) {
		echo "<script>alert('Message sent successfully')</script>";
		echo "<script>location.href='index.php'</script>";
	}
	else{
		// alert("Sorry, submission was not successful");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedbacks & Complains</title>
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
			<h2><strong>Feedbacks & Complains</strong></h2>
		</div>
		<form method="post">
			<div class="record">
			<p>Type</p>

			<select id="feed" name="feed">
				<option>Feedback</option>
				<option>Complaint</option>
			</select>
		</div>

		<div class="record">
			<p>Subject</p>
			<select id="product" name="product">
				<option>Product related</option>
				<option>Website related</option>
				<option>Others</option>
			</select>
		</div>

		<div class="msg">
			<p>Message</p>
			<textarea id="message" name="message" placeholder="Your message..."></textarea>
		</div>

		<div class="record">
			<input type="submit" name="submit" value="Submit your response" id="submit">
		</div>
		</form>
	</div>

</body>
</html>