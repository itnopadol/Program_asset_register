<?php
	//include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลสินทรัพย์</title>
<!--<link href="CSS.css" rel="stylesheet" type="text/css">-->
</head>
<style type="text/css">
.bodyaddset{
	font-family:"TH Sarabun New", "Tw Cen MT";
	font-size:18px;
	color:#000;
}
</style>
<?php
$Asset_id = $_GET['id']
$sql = "SELECT * FROM asset WHERE Asset_id = '$Asset_id'";
	$result=mysqli_query($con,$sql) or die("SQL Error=>".mysqli_error($con));


	list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
	,$brand,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
	,$Category_id ,$Asset_photo ,$Asset_time,$detail)=mysqli_fetch_row($result);
?>

<body class="bodyaddset">
<h2 align="center">ฟอร์มแก้ไขข้อมูลสินทรัพย์</h2>
<form action="index.php?module=2&action=13" method="post">
<center>
 <table >
  <tr>
        <td style="font-size:21px; font-weight:bold; ">รหัสสินทรัพย์</td><td>
            <input type="text" name="Asset_id" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold; ">หมายเลขทะเบียน</td><td>
            <input type="text" name="Asset_code" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold; ">Serial Number</td><td>
            <input type="text" name="Asset_serial" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold; ">ชื่อสินทรัพย์</td>
        <td>
        <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold;">จำนวน</td>
        <td>
       <input type="text" name="Asset_receivr_amout" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">หน่วยนับ</td><td>
            <input type="text" name="Asset_unit" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
        <tr>
        <td style="font-size:21px; font-weight:bold; ">วัน/เดือน/ปี</td>
        <td>
            <input type="date" name="Asset_date" class="form-control" style="font-size:15px; width:150px; float:left;" id="employee_sername_show">
        </td>
    </tr>
        <tr>
            <td style="font-size:21px; font-weight:bold;">บริษัทที่สั่งซื้อ</td><td>
                <input type="text" name="Asset_company" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">ราคา</td>
        <td>
            <input type="text" name="Asset_price" class="form-control" style="font-size:20px; width:150px; float:left;" id="employee_name_show">
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">ประเภท</td>
        <td>
            <select name="Category_id" class="form-control" style="font-size:20px; width:160px; float:left;" id="employee_sername_show">
            <option value="เครื่องคอมพิวเตอร์">เครื่องคอมพิวเตอร์ </option><option value="Handheld">Handheld</option><option value="All in One">All in One</option><option value="จอภาพ">จอภาพ</option><option value="Note Book">Note Book</option></select>
        </td>
    </tr>
    <tr>
        <td style="font-size:20px; font-weight:bold;">รูปภาพ</td>
        <td>
            <input type="file" name="student_photo" id="button3" value="" ></p>
        </td></tr>
</table>
<table style="margin-top:-5px;">
    <tr><td>
            <p align="center"><input type="submit" name="button" id="button" value="เพิ่มข้อมูล" class="bottomsize">
<input type="submit" name="button2" id="button2" value="ยกเลิก" class="bottomsize"></p>
        </td>
    </tr>
</table>
</form>
</center>

        </div>
      </div>
    </div>
  </div>
</div></td>
</tr>
</table>
</center>
</div>

</body>
</html>
