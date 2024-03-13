<?php
include '../include/config.php';
require("../fpdf184/fpdf.php");
session_start();
if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
</head>
<body>
	<?php
	
	ob_start();
	
	$pdf=new FPDF('P','mm','A4');
	$pdf->AddPage();
	// $pdf->Image('../image/afrigas.jpg',0,0,210,50);
	$pdf->SetXY(0,0);
	$pdf->SetFont('Arial','BUI',28);
	$pdf->cell(200,15,'Gas Management System',0,1,'C',false);
	$pdf->SetFont('Arial','BUI',24);
	$pdf->cell(170,15,'Orders to be distributed by '.$email,0,1,'C',false);
	$pdf->SetFont('Arial','B',8);
	$pdf->cell(10,10,'SNO',1,0,'C');
	$pdf->cell(40,10,'Consumer Name',1,0,'C');
	// $pdf->cell(30,10,'National ID',1,0,'C');
	$pdf->cell(45,10,'Email',1,0,'C');
	$pdf->cell(30,10,'Phone Number',1,0,'C');
	$pdf->cell(25,10,'Products',1,0,'C');
	$pdf->cell(25,10,'Price',1,0,'C');
	$pdf->cell(20,10,'Reg Date',1,0,'C');
	$pdf->cell(30,10,'Reg Time',1,1,'C');
	
	
	$sql=mysqli_query($conn,"select * from table_order where status='Running'");
	if (mysqli_num_rows($sql)>0) {
		$i=0;
		while ($row=mysqli_fetch_array($sql)) {
			$i++;
			$pdf->cell(10,6,$i,1,0,'C');
			$pdf->cell(40,6,$row['name'],1,0);  
			// $pdf->cell(30,6,$row['Id_num'],1,0);
			$pdf->cell(45,6,$row['email'],1,0);
			$pdf->cell(30,6,$row['number'],1,0);
			$pdf->cell(25,6,$row['total_products'],1,0);
			$pdf->cell(25,6,$row['total_price'],1,0);
			$pdf->cell(20,6,$row['date'],1,0);
			$pdf->cell(30,6,$row['time'],1,1);
			
		}
	}else{
		$pdf->cell(10,6,"No record was found",1,0,'c');
	}
	
	
	$pdf->Output();
	ob_end_flush();

	?>

</body>
</html>