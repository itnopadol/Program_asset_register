<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลสินทรัพย์</title>
<link href="CSS.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1 align="center">ฟอร์มเพิ่มข้อมูลสินทรัพย์</h1>
<form method="POST" action="" enctype="multipart/form-data">
<center>
 <table >
    <tr>
        <td style="font-size:21px; font-weight:bold; ">รหัสสินทรัพย์</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold; ">ชื่อสินทรัพย์</td>
        <td>
        <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold;">รุ่น/ยี่ห้อ</td>
        <td>
       <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">ซื้อจาก</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
        <tr>
            <td style="font-size:21px; font-weight:bold;">ราคาซื้อ</td><td>
                <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">ประเภทสินทรัพย์</td>
        <td>
            <input type="text" name="employee_name" class="form-control" style="font-size:20px; width:150px; float:left;" id="employee_name_show">
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">พนักงานผู้รับผิดชอบ</td>
        <td>
            <input type="text" name="employee_sername" class="form-control" style="font-size:20px; width:150px; float:left;" id="employee_sername_show">
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold; ">วันที่ซื้อ </td>
        <td>
            <input type="date" name="employee_sername" class="form-control" style="font-size:15px; width:150px; float:left;" id="employee_sername_show">
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">จำนวน</td>
        <td>
            <input type="text" name="employee_phone" class="form-control" style="font-size:20px; width:150px; float:left;" id="employee_phone_show">
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