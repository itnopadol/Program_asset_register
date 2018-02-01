<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
require('fpdf.php');
 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Text( 10 , 10 , 'Hello ธารทิพย์ เศรษฐกิจ ');
$pdf->Output( 'tmp/test2.pdf','F' );
?>
<body>
</body>
</html>
