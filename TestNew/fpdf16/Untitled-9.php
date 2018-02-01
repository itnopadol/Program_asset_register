<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>

<?php
require('fpdf.php');

class PDF extends FPDF
{

    function header(){
		
		$this->Image('h4GyY2823.jpg',7,7,40);
		$this->Setfont('THSarabunNew','',16);
		$this->Cell(0,3,iconv('UTF-8','TIS-620','Page '.$this->PageNo()),2,1,"R");
		$this->Cell(0,8,iconv( 'UTF-8','TIS-620','Date : '.date("d-m-Y")),0,1,"R");
		$this->Setfont('THSarabunNew','',20);
        $this->Cell(0,0,iconv('UTF-8','cp874','รายงานสรุปยอดคงเหลือของวัสดุ / อุปกรณ์' ),0,0,"C");
        $this->Ln();	
    }  
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	$w=array(20,60,30,27,27,27,27,27,27);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],9,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
	    $this->Cell(20,6,$eachResult["id"],1);
		$this->Cell(60,6,$eachResult["name"],1);
		$this->Cell(30,6,$eachResult["brand"],1);
		$this->Cell(27,6,$eachResult["price"],1);
		$this->Cell(27,6,$eachResult["category"],1);
		$this->Cell(27,6,$eachResult["stock"],1);
		$this->Cell(27,6,$eachResult["acquire"],1);
		$this->Cell(27,6,$eachResult["pay"],1);
		$this->Cell(27,6,$eachResult["balance"],1);
		$this->Ln();
	}
}


//Colored table
function FancyTable($header,$data)
{
	//Colors, line width and bold font
	$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
    $pdf->SetFont('THSarabunNew','',16);
    $this->SetFillColor(220 ,220 ,220);
	$this->SetTextColor(255);
	$this->SetLineWidth(.9);
	{
	    $this->Cell(20,6,$eachResult["id"],1);
		$this->Cell(60,6,$eachResult["name"],1);
		$this->Cell(30,6,$eachResult["brand"],1);
		$this->Cell(20,6,$eachResult["price"],1);
		$this->Cell(30,6,$eachResult["category"],1);
		$this->Cell(30,6,$eachResult["stock"],1);
		$this->Cell(30,6,$eachResult["acquire"],1);
		$this->Cell(30,6,$eachResult["pay"],1);
		$this->Cell(30,6,$eachResult["balance"],1);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew','',16);
$header=array('รหัส','name','brand','price','category','stock','acquire','pay','balance');

//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost","root","","nopadol") or die("Error Connect to Database");
$objDB = mysql_select_db("nopadol");
$strSQL = "SELECT * FROM spare_part";
$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew','',16);
$pdf->AddPage('L','A4',0);
$pdf->Image('h4GyY2823.jpg',7,7,40);
$pdf->Ln(40);
$pdf->BasicTable($header,$resultData);
$pdf->Output("tmp/tay.pdf","F");?>

PDF Created Click <a href="tmp/tay.pdf">here</a> to Download
</body>
</html>