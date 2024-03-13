<?php
include '../include/config.php';
session_start();

if(isset($_POST['submit'])){
	
	$id_no=$_POST['consumerId'];
	$fname=$_POST['fname'];
	$midname=$_POST['midname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$_SESSION['email']=$_POST['email'];


	if($password==$cpassword){
		$password=md5($password);
		if ($city=='Kisumu') {
			$quer="select Id from distributor where email='kamau@gmail.com'";
			$resul=mysqli_query($conn, $quer);
			$ro=mysqli_fetch_row($resul);
			$disid=' '.$ro[0];

			$query="select email from distributor where email='kamau@gmail.com'";
			$result=mysqli_query($conn, $query);
			$row=mysqli_fetch_row($result);
			$disemail=' '.$row[0];
		}
		else if ($city=='Busia') {
			$quer="select Id from distributor where email='Brian@gmail.com'";
			$resul=mysqli_query($conn, $quer);
			$ro=mysqli_fetch_row($resul);
			$disid=' '.$ro[0];

			$query="select email from distributor where email='Brian@gmail.com'";
			$result=mysqli_query($conn, $query);
			$row=mysqli_fetch_row($result);
			$disemail=' '.$row[0];
		}
		else if ($city=='Kakamega') {
			$quer="select Id from distributor where email='Rhodah@gmail.com'";
			$resul=mysqli_query($conn, $quer);
			$ro=mysqli_fetch_row($resul);
			$disid=' '.$ro[0];

			$query="select email from distributor where email='Rhodah@gmail.com'";
			$result=mysqli_query($conn, $query);
			$row=mysqli_fetch_row($result);
			$disemail=' '.$row[0];
		}
		else if ($city=='Migori') {
			$quer="select Id from distributor where email='Kelvin@gmail.com'";
			$resul=mysqli_query($conn, $quer);
			$ro=mysqli_fetch_row($resul);
			$disid=' '.$ro[0];

			$query="select email from distributor where email='Kelvin@gmail.com'";
			$result=mysqli_query($conn, $query);
			$row=mysqli_fetch_row($result);
			$disemail=' '.$row[0];
		}
		$name=$_POST['fname']." ".$_POST['midname']." ".$_POST['lname'];

		$query="insert into consumer (did,national_id,name,email,dis_email,phone,city,address,reg_date,reg_time,password) values('$disid','$id_no','$name','$email','$disemail','$phone','$city','$address',CURDATE(),CURTIME(),'$password')";

		$queryy=mysqli_query($conn,$query);
		if($queryy){
			echo '<script>alert("Registration successful.")</script>';
			echo "<script>location.href='login.php'</script>";
		}
		else{
			echo '<script>alert("Sorry, registration was not successful. Please try again or contact the administrator if the problem persists.")</script>';
		}
	}

	// $query="select CONCAT(fname,' ',mid,' ',lname) from distributor";
	// $name=mysqli_query($conn, $query);
	// $roww=mysqli_fetch_row($name);
	// $disname=' '.$roww[0];

	
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="table">
		<div id="title">
			<p>Customer Registration</p>
			
		</div>
		<form method="post">
		<div id="form_inputs">
			<label>Consumer ID</label>
			<input type="text" name="consumerId" placeholder="Consumer ID">
		</div>
		<div id="form_input">
			<label>Consumer Name</label>
			<input type="text" name="fname" placeholder="First Name">
			<input type="text" name="midname" placeholder="Middle Name">
			<input type="text" name="lname" placeholder="Last Name">
		</div>

		<div id="form_inputs_addr">
			<label >Address</label>
			<textarea name="address" placeholder="Address"></textarea>
		</div>

		<div id="form_inputs">
			<label>Mobile Number:</label>
			<input type="number" name="phone" placeholder="Mobile Number">
		</div>

		<div id="form_inputs">
			<label>Email:</label>
			<input type="email" name="email" placeholder="Email">
		</div>

		<div id="form_inputs">
			<label>City</label>
			<select name="city">
				<option>All</option>
				<option>Kisumu</option>
				<option>Busia</option>
				<option>Kakamega</option>
				<option>Migori</option>
			</select>
		</div>

		<div id="form_inputs">
			<label>Password:</label>
			<input type="password" name="password" placeholder="Password">
		</div>

		<div id="form_inputs">
			<label>Confirm password:</label>
			<input type="password" name="cpassword" placeholder="Confirm Password">
		</div>

		<div id="submit">
			<input type="submit" name="submit" value="Submit">
		</div>

		<div id="submit">
			<a href="login.php"><input type="button" name="login" value="Login"></a>
		</div>

		
		</form>
		
	</div>

</body>
</html>