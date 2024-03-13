<?php
include 'config.php';
$dist_id=$_GET['delete_Id'];

if ($dist_id) {
	$delete=mysqli_query($conn,"delete from distributor where Id='$dist_id'");

	if ($delete) {
		echo "<script>alert('Data deleted successfully')</script>";
		echo "<script>location.href='../Admin/manage.php'</script>";
	}
}

$feedback=$_GET['delete_feed'];

if ($feedback) {
	$delete=mysqli_query($conn,"delete from feedback_and_complaint where Serial='$feedback'");

	if ($delete) {
		echo "<script>alert('Data deleted successfully')</script>";
		echo "<script>location.href='../Distributor/feedback-manage.php'</script>";
	}
}

$delete_consumer=$_GET['delete_con'];

if ($delete_consumer) {
	$delete=mysqli_query($conn,"delete from consumer where Id='$delete_consumer'");

	if ($delete) {
		echo "<script>alert('Data deleted successfully')</script>";
		echo "<script>location.href='../Distributor/manage-con.php'</script>";
	}
}

$delete_order_running=$_GET['delete_order_running'];

if ($delete_order_running) {
	$delete=mysqli_query($conn,"delete from table_order where Id='$delete_consumer'");

	if ($delete) {
		echo "<script>alert('Data deleted successfully')</script>";
		echo "<script>location.href='../Distributor/check-order.php'</script>";
	}
}

?>