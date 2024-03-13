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
	<title>Tarck Order</title>
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
			<h2><strong>Track Order</strong></h2>
			
		</div>

		<div class="table-container">
			<div class="table">
				<table>
					<tr>
						<th>Order Id</th>
						<th>Products</th>
						<th>Date of Order</th>
						<th>Time of Order</th>
						<th>Payable amount</th>
						<th>Order Status</th>
					</tr>
					<?php
					$result=mysqli_query($conn,"select * from table_order where email='$email'");
					if (mysqli_num_rows($result)>0) {
					$sn=1;

					while($data=mysqli_fetch_assoc($result)){

						?>
						<tr>
							<!-- <td><?php echo $sn; ?></td> -->
							<td><?php echo $data['id']; ?></td>
							<td><?php echo $data['total_products'];  ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['time']; ?></td>
							<td>sh.<?php echo $data['total_price']; ?></td>							
							<td><?php echo $data['status']; ?></td>
							
							
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