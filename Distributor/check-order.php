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
	<title>Check Orders</title>
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
			<h2><strong>Running Orders</strong></h2>
			<a href="order-pdf.php"><p>Print</p></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th>S.N</th>
						<th>Order Id</th>
						<th>Items</th>
						<!-- <th>Consumer Id</th> -->
						<th>Consumer Name</th>
						<th>Consumer Email</th>
						<th>Order Date</th>
						<th>Order time</th>
						<th>Amount</th>
						<th>Order status</th>
						<th>Action</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from table_order where status='Running'");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['id']; ?></td>
							<td><?php echo $data['total_products'];  ?></td>
							<!-- <td><?php echo $data['national_id']; ?></td> -->
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['time']; ?></td>
							<td>sh.<?php echo $data['total_price']; ?></td>							
							<td><?php echo $data['status']; ?></td>
							<td>

											<form method="post" accept="">

												<a href="view-order.php?view-order=<?php echo $data['id'] ?>"><button type="button" name="view-user" class="btn btn-success">View</button></a>

												<a href="edit-order.php?edit-order=<?php echo $data['id'] ?>"><button type="button" name="view-user" class="btn btn-success">Edit</button></a>

												<a href="../include/code.php?delete_order_running=<?php echo $data['id'] ?>"><button class="btn btn-success" type="button" onclick="return confirm('Are you really sure you want to delete this')"">Delete</button></a>
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

	

	<div class="main">
		<div class="title">
			<h2><strong>Delivered Orders</strong></h2>
			<a href="order-delivered-pdf.php"><p>Print</p></a>
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th>S.N</th>
						<th>Order Id</th>
						<th>Items</th>
						<th>Consumer Name</th>
						<th>Consumer Email</th>
						<th>Order Date</th>
						<th>Order time</th>
						<th>Amount</th>
						<th>Order status</th>
						<th>Action</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from table_order where status='Delivered'");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $data['id']; ?></td>
							<td><?php echo $data['total_products'];  ?></td>
							<!-- <td><?php echo $data['national_id']; ?></td> -->
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['time']; ?></td>
							<td>sh.<?php echo $data['total_price']; ?></td>							
							<td><?php echo $data['status']; ?></td>
							<td>

											<form method="post" accept="">

												<a href="view-dist.php?view-Id=<?php echo $data['id'] ?>"><button type="button" name="view-user" class="btn btn-success">View</button></a>

												<!-- <a href="edit-dist.php?edit-Id=<?php echo $data['Id'] ?>"><button type="button" name="view-user" class="btn btn-success">Edit</button></a> -->

												<a href="../include/code.php?delete_order_delivered=<?php echo $data['id'] ?>"><button class="btn btn-success" type="button" onclick="return confirm('Are you really sure you want to delete this')"">Delete</button></a>
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