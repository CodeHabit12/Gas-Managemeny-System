<?php

include '../include/config.php';
session_start();

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$_SESSION['email']=$_POST['email'];

	$query="select email,password from admin where email='$email' && password='$password'";

	$queryy=mysqli_query($conn,$query);

	$array=mysqli_fetch_array($queryy);

	$count=mysqli_num_rows($queryy);

	if($count==1){
		echo "<script>location.href='index.php'</script>";
		// echo "<h1>Welcome ".$_SESSION['email']."";
	}
	else{
		echo "<script>location.href='login.php'</script>";
		echo "<h1>Invalid username or password";
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
</head>
<body>
	<div class="container-login">
		<h1><strong>Sign In</strong></h1>
		<form action="" method="post">
			<div class="form_inputs-login">
				<label>Email</label><br>
				<input type="email" name="email">				
			</div>

			<div class="form_inputs-login">
				<label>Password</label>
				<input type="password" name="password">				
			</div>

			<div class="submit-login">
				<input type="submit" name="submit" value="Continue">				
			</div>
		</form>
		
	</div>

</body>
</html>