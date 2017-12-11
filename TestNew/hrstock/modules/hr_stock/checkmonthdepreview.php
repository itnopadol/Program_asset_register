<?php
//header("Content-Type: application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename="รายงาน.xls"');
$cndb=@mysql_connect("localhost","root","pilotknit");
$rsdb=@mysql_select_db("itsolution");
?>
<html>
</head>
	<title>ตรวจสอบยอดตัดสต๊อกประจำเดือน</title>
	<meta http-equiv="Content-Type" Content="text/html;charset=utf-8"/>
	<style rel="stylesheet" type="text/css">
		*{
			margin:0;
			margin-top:3px;
			padding:2;
			text-align:center;
		}
		table{
			width:100%;
			border:1px solid #000000;
			font-size:8px;
		}
		p{
			font-size:12px;
		}
	</style>
</head>
<?php
function createDateRangeArray($start, $end) {
	// Modified by JJ Geewax
	$range = array();
	if (is_string($start) === true) $start = strtotime($start);
	if (is_string($end) === true ) $end = strtotime($end);
	if ($start > $end) return createDateRangeArray($end, $start);
	do {
		$range[] = date('Y-m-d', $start);
		$start = strtotime("+ 1 day", $start);
	}while($start <= $end);
	return $range;
} 
$d1=isset($_POST['txtdate1'])?$_POST['txtdate1']:'';
$d2=isset($_POST['txtdate2'])?$_POST['txtdate2']:'';
$arr1=explode("-",$d1);
$arr2=explode("-",$d2);
$date1=$arr1[2]."-".$arr1[0]."-".$arr1[1];
$date2=$arr2[2]."-".$arr2[0]."-".$arr2[1];

$sdate=createDateRangeArray($date1,$date2);

function thaidate($vardate="") { 
	$_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",  
    "04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",  
    "07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",  
    "10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม");

	$yy =substr($vardate,0,4);
	$mm =substr($vardate,5,2);
	$dd =substr($vardate,8,2);


	$yy += 543;
	if ($yy==543){
		$dateT = "-";
	}else{
		$dateT=$dd ." ".$_month_name[$mm]."  ".$yy;
	 }
  return $dateT;
} 

function rsQuery($strsql=""){
	if($strsql==""){
		echo'<p style="color:red">ERROR</p>';
		exit();
	}else{
		mysql_query("SET NAMES utf8");
		$rs=mysql_query($strsql);
		if($rs){
			return $rs;
		}else{
			echo'<p style="color:red">'.mysql_error().'</p>';
			exit();
		}
	}
}
$sql="Select count(depid) as c From tb_department";
$rs=rsQuery($sql);
$arrdep=mysql_fetch_array($rs);
$sql="Select * From tb_department Order by depid";
$rs2=rsQuery($sql);
$q=0;
while($row=mysql_fetch_array($rs2)){
	$adep[]=$row['depid']."-".$row['depname'];
	$depp[$q]=$row['depid'];
	$q++;
}
?>

<p>ยอดตัดสต๊อกประจำวันที่ :&nbsp;<?=thaidate($date1);?>&nbsp; ถึงวันที่ :&nbsp;<?=thaidate($date2);?></p>
<table cellpadding="0" cellspacing="0" border="1s">
	<tr>
		<td rowspan="2" align="center">ลำดับ</td>
		<td rowspan="2" align="center"><b>รายการ</b></td>
		<td rowspan="2" align="center">ยกยอดมา</td>
		<td rowspan="2" align="center">หน่วย</td>
		<td rowspan="2" align="center">รับเข้า</td>
		<td rowspan="2" align="center">รวมสต๊อก</td>
		<td bgcolor="#F9F9F9" colspan="<?=$arrdep['c'];?>">รายงานยอดเบิกของแผนกต่าง ๆ </td>
		<td rowspan="2" align="center">ยอดเบิก</td>
		<td rowspan="2" align="center">คงเหลือ</td>
		<td rowspan="2" align="center">สั่งซื้อ</td>
		<td rowspan="2" align="center">หน่วย</td>
	</tr>
	<tr>
		<?php
			for($i=0;$i<count($adep);$i++){
				$arr=explode("-",$adep[$i]);
				echo "<td valign=\"top\">$arr[1]</td>";
			}
		?>
	</tr>
	<?php
	
		$sql="Select stock_tb_kind_type.*,stock_tb_unit.* From stock_tb_kind_type INNER JOIN stock_tb_unit ON stock_tb_kind_type.unitid=stock_tb_unit.unitid Order by kindid,kindtypeid";
		$rs=rsQuery($sql);
		$no=0;
		while($row=mysql_fetch_array($rs)){
			$no++;
			echo"<tr>";
			echo"<td>$no</td>";
			echo"<td>".$row['kindtypename']."</td>";
			
			// ยกยอดมา
			$sql="Select sum(stock_tb_receive_master_sub.total) as oldrec From stock_tb_receive_master_sub INNER JOIN stock_tb_receive_master ON stock_tb_receive_master_sub.rid=stock_tb_receive_master.rid Where kindtypeid='".$row['kindtypeid']."' And datereceive < '$date1'";
			$rsorec=rsQuery($sql);
			$arorec=mysql_fetch_array($rsorec);
			$a1=$arorec['oldrec'];
			if($a1==""){
				$a1=0;
			}else{
				$a1=$a1;
			}
			
			
			$sql=" SELECT sum( stock_tb_beg_master_sub.beg ) AS oldbeg FROM stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg = stock_tb_beg_master.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser = tb_user.iduser INNER JOIN tb_department ON tb_user.depid = tb_department.depid WHERE kindtypeid = '".$row['kindtypeid']."' AND datebegtotal < '$date1' AND stock_tb_beg_master.statusbeg = '1' AND stock_tb_beg_master_sub.receive = 'on' GROUP BY kindtypeid";
			

			$rsobeg=rsQuery($sql);
			$arobeg=mysql_fetch_array($rsobeg);
			$a2=$arobeg['oldbeg'];

			if($a2==""){
				$a2=0;
			}else{
				$a2=$a2;
			}

			$saveold=$a1-$a2;

			echo"<td>$saveold</td>";

			

			echo"<td>".$row['unitname']."</td>";

			$sql="Select sum(stock_tb_receive_master_sub.total) as nowrec,stock_tb_receive_master.* From stock_tb_receive_master_sub INNER JOIN stock_tb_receive_master ON stock_tb_receive_master_sub.rid=stock_tb_receive_master.rid Where stock_tb_receive_master_sub.kindtypeid='".$row['kindtypeid']."' And stock_tb_receive_master.datereceive Between '$date1' And '$date2' group by kindtypeid";

			$rsrecnow=rsQuery($sql);
			$arrrecnow=mysql_fetch_array($rsrecnow);
			$totalnow=$arrrecnow['nowrec'];
			if($totalnow==""){
				$totalnow=0;
			}else{
				$totalnow=$totalnow;
			}
			// รับเข้า
			
			echo"<td>$totalnow</td>";
			
			// รวมสต๊อก
			$totalstock=$saveold+$totalnow;
			if($totalstock<0){
				$BG="background:red;";
			}else{
				$BG="background:#FFFFFF;";
			}
			echo"<td style=\"$BG\">$totalstock</td>";
			
			$savebeg=0;
			// ยอดเบิกแต่ละวัน
			for($i=0;$i<count($adep);$i++){

				 $sql=" SELECT sum( stock_tb_beg_master_sub.beg ) AS begs FROM stock_tb_beg_master_sub INNER JOIN stock_tb_beg_master ON stock_tb_beg_master_sub.nobeg = stock_tb_beg_master.nobeg INNER JOIN tb_user ON stock_tb_beg_master.iduser = tb_user.iduser INNER JOIN tb_department ON tb_user.depid = tb_department.depid WHERE kindtypeid = '".$row['kindtypeid']."' AND stock_tb_beg_master.datebegtotal Between '$date1' And '$date2' AND stock_tb_beg_master.statusbeg = '1' AND stock_tb_beg_master_sub.receive = 'on' And tb_user.depid='".$depp[$i]."' GROUP BY kindtypeid";



				
				$rsa=rsQuery($sql);
				$arree=mysql_fetch_array($rsa);
				$begday=$arree['begs'];

				if($begday==""){
					echo"<td>&nbsp;</td>";
				}elseif($begday=="0"){
					$savebeg=$savebeg+$begday;
					echo"<td>&nbsp;</td>";
				}else{
					echo"<td>$begday</td>";
					$savebeg=$savebeg+$begday;
				}
			}
			echo"<td>$savebeg</td>";
			$sum=$totalstock-$savebeg;
			echo"<td>$sum</td>";
			echo"<td>&nbsp;</td>";
			echo"<td>".$row['unitname']."</td>";
			echo"</tr>";
		}
	?>
</table>
