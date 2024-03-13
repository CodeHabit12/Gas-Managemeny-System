<?php
include '../include/config.php';
session_start();
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage feedbacks</title>
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
			<h2><strong>Feedbacks & Complains</strong></h2>
			<a href="complain-pdf.php"><p>Print</p></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th>S.N</th>
					<th>Consumer Id</th>
					<th>Consumer Email</th>
					<th>Consumer Name</th>
					<th>Date</th>
					<th>Time</th>
					<th>Type</th>
					<th>Subject</th>
					<th>Description</th>
					<th>Action</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from feedback_and_complaint where d_email='$email'");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['cid']; ?></td>
							<td><?php echo $data['consumer_email']; ?></td>
							<td><?php echo $data['consumer_name']; ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['time']; ?></td>
							<td><?php echo $data['type']; ?></td>
							<td><?php echo $data['subject']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td>

											<form method="post" accept="">

												<a href="../include/code.php?delete_feed=<?php echo $data['Serial'] ?>"><button class="btn btn-success" type="button" onclick="return confirm('Are you really sure you want to delete this')"">Delete</button></a>
											</form>								

											
										</td>
							
						</tr>
						<?php
						$sn++;
					}
				}
				else{
					?>
					<tr>
						<td colspan="7">No data was found</td>
					</tr>
					<?php

				}
				?>


			</table>	
			</div>
			
		</div>

		
				
			
	</div>

</body>
</html>