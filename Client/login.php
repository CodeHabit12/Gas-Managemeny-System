<?php

include '../include/config.php';
session_start();

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$_SESSION['email']=$_POST['email'];
	$password=md5($password);

	$query="select email,password from consumer where email='$email' && password='$password'";

	$queryy=mysqli_query($conn,$query);

	$array=mysqli_fetch_array($queryy);

	$count=mysqli_num_rows($queryy);

	if($count==1){
		echo "<script>location.href='index.php'</script>";
		// echo "<h1>Welcome ".$_SESSION['email']."";
	}
	else{
		echo "<script>location.href='login.php'</script>";
	}
}


?>









<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
	<div class="container">
		<h1><strong>Sign In</strong></h1>
		<a href="../index.html" class="btn btn-danger float-end">BACK</a>
		<form method="post">
			<div class="form_inputs">
				<label>Email</label><br>
				<input type="email" name="email">				
			</div>

			<div class="form_inputs">
				<label>Password</label>
				<input type="password" name="password">				
			</div>

			<div class="submit">
				<input type="submit" name="submit" value="Continue">				
			</div>

			<div class="submit">
				<a href="signUpp.php">Create an account</a>			
			</div>

			<!-- <div class="submit">
				<a href=""><button type="submit">For</button></a>				
			</div> -->

		</form>
		
	</div>

</body>
</html>