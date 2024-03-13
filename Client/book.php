<!DOCTYPE html>
<html>
<head>
	<title>Book Order</title>
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
			<h2><strong>Book Order</strong></h2>
		</div>
		<form>
			<div class="background">
				<div class="content-paragraph">
				<p>a). Different gas cylinders have different prices for both refils and new purchases.</p>
				<p>b). Order cannot be cancelled once you place an order.</p>
				<p>c). Prices may change as per government rules.</p>
				<p>d). You can place an order for more than one gas cylinder.</p>
				<p>e). Orders will be placed to the registered addresses.</p>
				<p>f). Order ststus update will drop via an SMS(Linked mobile number) and an email(Linked email address).</p>
				<p>g). Orders will be placed within seven days after the day of order. You can then write a complain if this doesn't happen.</p>
				
				
			</div>
			<div class="checkbox">
				<label>
					<input id="co_cb" onChange="return chk(this);" type="checkbox" name="agree" value="agree"/> Agree with the terms and conditions
				</label>
			</div>
			<div>
				<a href="#"><button type="submit" id="submit" disabled onclick="nextpage()">Continue </button></a> 
				<!-- <a href="../client/shopping/products.php">Next</a> -->
			</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function chk(co_cb)
					{
						if(co_cb.checked==false)
						{
							document.getElementById("submit").disabled=true;
						}
						else if(co_cb.checked==true)
						{
							document.getElementById("submit").disabled=false;
							nextpage();
						}
						return false;
					}
					function nextpage(){
						location.href='../client/shopping/products.php';
					}
	</script>

</body>
</html>