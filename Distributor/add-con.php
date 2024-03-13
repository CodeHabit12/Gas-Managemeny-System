<?php
include '../include/config.php';
session_start();
if (isset($_SESSION['email']) && isset($_POST['submit'])) {
	$email=$_SESSION['email'];

	$id = mysqli_real_escape_string($conn, $_POST['consumerId']);
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$m_name=mysqli_real_escape_string($conn,$_POST['m_name']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);
	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
	$emailcon=mysqli_real_escape_string($conn, $_POST['emailCon']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

	if ($password==$cpassword) {
		$name=$_POST['fname']." ".$_POST['m_name']." ".$_POST['lname'];
		$password=md5($password);

		$query=mysqli_fetch_row(mysqli_query($conn,"select Id from distributor where email='$email'"))[0];
		$quer=mysqli_fetch_row(mysqli_query($conn,"select city from distributor where email='$email'"))[0];
		

		$quer="INSERT INTO consumer (did,national_id,name,email,dis_email,phone,city,address,reg_date,reg_time,password) values('$query','$id','$name','$emailcon','$email','$phone','$quer','$address',CURDATE(),CURTIME(),'$password')";

		$query_insert=mysqli_query($conn,$quer);
		if ($query_insert) {
			echo '<script>alert("User added successfully")</script>';
			echo "<script>location.href='manage-con.php'</script>";
		}
		else{
			echo '<script>alert("Registration unsuccessful!")</script>';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add consumer</title>
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
		<<div class="title">
			<h2><strong>Add consumer</strong></h2>
		</div>
		<form method="post">
			<div id="form_inputs">
				<label>Consumer ID</label>
				<input type="text" name="consumerId" placeholder="Consumer National ID">
			</div>

			<div id="form_input-con">
			<label>Consumer Name</label>
			<input type="text" name="fname" placeholder="First Name">
			<input type="text" name="m_name" placeholder="Middle Name">
			<input type="text" name="lname" placeholder="Last Name">
		</div>

		<div id="form_inputs_addr">
			<label>Address</label>
			<textarea placeholder="Address" name="address"></textarea>
		</div>

		<div id="form_inputs">
			<label>Mobile Number:</label>
			<input type="number" name="phone" placeholder="Mobile Number">
		</div>

		<div id="form_inputs">
			<label>Email:</label>
			<input type="email" name="emailCon" id="emailCon" placeholder="Email">
		</div>

		<div id="form_inputs">
			<label>Password:</label>
			<input type="password" name="password" placeholder="Password">
		</div>

		<div id="form_inputs">
			<label>Confirm Password:</label>
			<input type="password" name="cpassword" placeholder="Confirm Password">
		</div>

		<div id="submit">
			<input type="submit" name="submit" value="Submit">
		</div>
		</form>
	</div>

</body>
</html>