<?php
include '../include/config.php';
include '../fpdf184/fpdf.php';
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
	$pdf->cell(170,15,'Feedbacks & Complains',0,1,'C',false);
	$pdf->SetFont('Arial','B',8);
	$pdf->cell(10,10,'SNO',1,0,'C');
	$pdf->cell(40,10,'Consumer Name',1,0,'C');
	$pdf->cell(40,10,'Consumer Email',1,0,'C');
	$pdf->cell(20,10,'Date',1,0,'C');
	$pdf->cell(25,10,'Time',1,0,'C');
	$pdf->cell(60,10,'Description',1,1,'C');
	
	$sql=mysqli_query($conn,"select * from feedback_and_complaint");
	if (mysqli_num_rows($sql)>0) {
		$i=0;
		while ($row=mysqli_fetch_array($sql)) {
			$i++;
			$pdf->cell(10,6,$i,1,0,'C');
			$pdf->cell(40,6,$row['consumer_name'],1,0);  
			$pdf->cell(40,6,$row['consumer_email'],1,0);
			$pdf->cell(20,6,$row['date'],1,0);
			$pdf->cell(25,6,$row['time'],1,0);
			$pdf->cell(60,6,$row['description'],1,1,'L');
		}
	}else{
		$pdf->cell(10,6,"No record was found",1,0,'c');
	}
	
	
	$pdf->Output();
	ob_end_flush();

	?>

</body>
</html>