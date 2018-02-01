<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>
<?php
	require('fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('THSarabunNew.php','B',16);
	$pdf->Cell(0,10,'รายงานการรับเข้าวัสดุ / อุปกรณ์',0,1);
	$pdf->Cell(0,20,'Version 2009',0,1,"C");
    $pdf->Output( 'tmp/test2.pdf','F' );
?>
	PDF Created Click <a href="tmp/test2.pdf">here</a> to Download
</body>
</html>