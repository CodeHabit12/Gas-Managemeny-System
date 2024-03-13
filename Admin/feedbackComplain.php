<?php
include '../include/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Complains & Feedback</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
</head>
<body>
	<div class="header">
		<a href="index.php"><p>Admin</p></a>
		<a href="../admin/shopping/products.php">Manage Stock</a>
		<a href="manage.php">Manage Distributors</a>
		<a href="feedbackComplain.php">View Feedback & Complains</a>
		<!-- <a href="#"><?php echo $email; ?></a> -->
		<a href="logout.php">Log out</a>
	</div>

	<div class="main">
		<div class="title">
			<h2><strong>Complains & Feedback</strong></h2>
			<a href="feedback-pdf.php"><p>Print Feedbacks</p></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th width="50px">#</th>
						<th>Consumer Name</th>
						<th>Consumer Email</th>
						<th>Date</th>
						<th>Time</th>
						<th>Type</th>
						<th>Subject</th>
						<th>Description</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from feedback_and_complaint");

					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['consumer_name']; ?></td>
							<td><?php echo $data['consumer_email']; ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['time']; ?></td>
							<td><?php echo $data['type']; ?></td>
							<td><?php echo $data['subject']; ?></td>
							<td><?php echo $data['description']; ?></td>
							
							
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