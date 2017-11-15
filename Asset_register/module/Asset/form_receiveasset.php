<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รับวัสดุ</title>
<!--<link href="CSS.css" rel="stylesheet" type="text/css">-->
</head>
<style type="text/css">
.receivbody{
	font-family:"TH Sarabun New", "Tw Cen MT";
	color:#60F;
}
</style>
<body class="receivbody">
<h2 align="center" >ฟอร์มเพิ่มข้อมูลการรับวัสดุ</h2>
<form method="POST" action="" enctype="multipart/form-data">
<center>
 <table >
    <tr>
        <td style="font-size:21px; font-weight:bold; ">ชื่อวัสดุ</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold; ">รุ่น  / ยี่ห้อ</td>
        <td>
        <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold;">ประเภทสินทรัพย์</td>
        <td>
       <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">ราคา</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
        <tr>
            <td style="font-size:21px; font-weight:bold;">ผู้ขอเบิก</td><td>
                <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">วันที่เบิก</td>
        <td>
             <input type="date"  name="employee_name" class="form-control" style="font-size:15px; width:150px; float:left;" id="employee_name_show">
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">จำนวน</td>
        <td>
            <input type="text" name="employee_sername" class="form-control" style="font-size:20px; width:150px; float:left;" id="employee_sername_show">
        </td>
    </tr>
</table>
<table style="margin-top:-5px;">
    <tr><td>
            <p align="center"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" class="bottomsize">
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