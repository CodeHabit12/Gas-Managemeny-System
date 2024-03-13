<?php
include '../include/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Distributors</title>
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
			<h2><strong>Manage Distributors</strong></h2>
			<a href="adddist.php"><p>Add Distributor</p></a>
			<a href="dist-pdf.php"><h2>Print Report</h2></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th width="50px">#</th>
						<th>Distributor Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Mobile Number</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from distributor");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['fullname']; ?></td>
							<td><?php echo $data['address']; ?></td>
							<td><?php echo $data['city']; ?></td>
							<td><?php echo $data['phone']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td>

											<form method="post" accept="">

												<a href="view-dist.php?view-Id=<?php echo $data['Id'] ?>"><button type="button" name="view-user" class="btn btn-success">View</button></a>

												<a href="edit-dist.php?edit-Id=<?php echo $data['Id'] ?>"><button type="button" name="view-user" class="btn btn-success">Edit</button></a>

												<a href="../include/code.php?delete_Id=<?php echo $data['Id'] ?>"><button class="btn btn-success" type="button" onclick="return confirm('Are you really sure you want to delete this')"">Delete</button></a>
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