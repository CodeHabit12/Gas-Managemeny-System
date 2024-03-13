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
	<title>Manage Consumer</title>
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
			<h2><strong>Manage Consumer</strong></h2>
			<a href="add-con.php"><p>Add Consumer</p></a>
			<a href="con-pdf.php"><h2>Print Report</h2></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th width="50px">#</th>
						<th>National ID</th>
						<th>Consumer Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Mobile Number</th>
						<th>Email</th>
						<th>Registered Date</th>
						<th>Registered Time</th>
						<th>Action</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from consumer where dis_email='$email'");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['national_id']; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['address']; ?></td>
							<td><?php echo $data['city']; ?></td>
							<td><?php echo $data['phone']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['reg_date']; ?></td>
							<td><?php echo $data['reg_time']; ?></td>
							<td>

											<form method="post" accept="">

												<a href="view-con.php?view-con=<?php echo $data['Id'] ?>"><button type="button" name="view-user" class="btn btn-success">View</button></a>

												<!-- <a href="edit-dist.php?edit-Id=<?php echo $data['Id'] ?>"><button type="button" name="view-user" class="btn btn-success">Edit</button></a> -->

												<a href="../include/code.php?delete_con=<?php echo $data['Id'] ?>"><button class="btn btn-success" type="button" onclick="return confirm('Are you really sure you want to delete this')"">Delete</button></a>
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