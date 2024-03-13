<?php
include '../../include/config.php';
// C:\wamp64\www\Gas manage\include\config.php
require("../../fpdf184/fpdf.php");
session_start();
if (isset($_SESSION['email'])) {
	$user_email=$_SESSION['email'];
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
	$pdf->cell(170,15,'Customer Receipt',0,1,'C',false);
	$pdf->SetFont('Arial','B',10);
	// $pdf->cell(10,10,'SNO',1,1,'C');
	$pdf->SetFont('Arial','B',12);
	$pdf->cell(40,10,'Name',1,1,'C');
	// $pdf->cell(30,10,'National ID',1,0,'C');
	$pdf->cell(40,10,'Email',1,1,'C');
	$pdf->cell(40,10,'Phone Number',1,1,'C');
	$pdf->cell(40,10,'Method',1,1,'C');
	$pdf->cell(40,10,'Station',1,1,'C');
	$pdf->cell(40,10,'Products',1,1,'C');
	$pdf->cell(40,10,'Total Price',1,1,'C');
	$pdf->cell(40,10,'Date',1,1,'C');
	$pdf->cell(40,10,'Time',1,1,'C');
	
	
	$sql=mysqli_query($conn,"select * from table_order where email='$user_email'");
	if (mysqli_num_rows($sql)>0) {
		$i=0;
		while ($row=mysqli_fetch_array($sql)) {
			$i++;
			// $pdf->cell(10,6,$i,1,0,'C');
			$pdf->SetXY(60,30);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['name'],1,1);  
			// $pdf->cell(30,6,$row['Id_num'],1,0);
			$pdf->SetXY(60,40);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['email'],1,1);

			$pdf->SetXY(60,50);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['number'],1,1);

			$pdf->SetXY(60,60);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['method'],1,1);

			$pdf->SetXY(60,70);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['station'],1,1);

			$pdf->SetXY(60,80);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['total_products'],1,1);

			$pdf->SetXY(60,90);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['total_price'].'/=',1,1);

			$pdf->SetXY(60,100);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['date'],1,1);

			$pdf->SetXY(60,110);
			$pdf->SetFont('Arial','',10);
			$pdf->cell(140,10,$row['time'],1,1);
			
		}
	}else{
		$pdf->cell(10,6,"No record was found",1,0,'c');
	}
	
	
	$pdf->Output();
	ob_end_flush();

	?>

</body>
</html>