<?php
include '../include/config.php';

session_start();

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$id_num=$_POST['id-num'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$p_image = $_FILES['p_image']['name'];
	$p_image_tmp_name = $_FILES['p_image']['tmp_name'];
	$p_image_folder = '../Distributor/images/'.$p_image;

	if ($password==$cpassword) {
		$password=md5($password);
	 	
	}

	$query_insert=mysqli_query($conn,"insert into distributor(Id_num,fullname,email,phone,city,address,date,time,password,image) values('$id_num','$name','$email','$phone','$city','$address',NOW(),NOW(),'$password','$p_image')");
	if($query_insert){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      	echo '<script>alert("Distributor added successfully")</script>';
		echo "<script>location.href='manage.php'</script>";
   }else{
     	 echo '<script>alert("Sorry, Distributor has not being added")</script>';
   }
	

	}
	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Distributor</title>
	<link rel="stylesheet" type="text/css" href="../css/admin-css.css">
</head>
<body>
	<div class="container">
		<h1><strong>Add Distributor</strong></h1>
		<form action="" method="post">
			<div class="form_inputs">
				<label>Full Name</label><br>
				<input type="text" name="name">				
			</div>

			<div class="form_inputs">
				<label>Nationa ID</label><br>
				<input type="number" name="id-num">				
			</div>

			<div class="form_inputs">
				<label>Email</label><br>
				<input type="email" name="email">				
			</div>

			<div class="form_inputs">
				<label>Phone Number</label><br>
				<input type="number" name="phone">				
			</div>

			<div class="form_inputs">
				<label>City</label><br>
				<select name="city">
					<option>Select</option>
					<option>Kisumu</option>
					<option>Kakamega</option>
					<option>Busia</option>
					<option>Vihiga</option>
				</select>			
			</div>

			<div class="form_inputs">
				<label>Address</label><br>
				<input type="text" name="address">				
			</div>

			<div class="form_inputs">
				<label>Password</label><br>
				<input type="password" name="password">				
			</div>

			<div class="form_inputs">
				<label>Confirm Password</label><br>
				<input type="password" name="cpassword">				
			</div>

			<div class="form_inputs">
				<label>Profile Image</label><br>
				<input type="file" name="p_image">				
			</div>

			<div class="submit">
				<input type="submit" name="submit" value="Submit">
				
			</div>

			
		</form>
		
	</div>

</body>
</html>