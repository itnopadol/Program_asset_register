<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มข้อมูลผู้ใช้งาน</title>
<link href="CSS.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1 align="center">ฟอร์มเพิ่มข้อมูลผู้ใช้งาน</h1>
<form method="POST" action="" enctype="multipart/form-data">
<center>
 <table >
    <tr>
        <td style="font-size:21px; font-weight:bold; ">ชื่อผู้ใช้งาน</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold; ">รหัสผ่าน</td>
        <td>
        <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
    </tr><tr>
        <td style="font-size:21px; font-weight:bold;">ชื่อพนักงาน</td>
        <td>
       <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </td>
    </tr>
    <tr>
        <td style="font-size:21px; font-weight:bold;">แผนก</td><td>
            <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
        <tr>
            <td style="font-size:21px; font-weight:bold;">เบอร์โทรติดต่อ </td><td>
                <input type="text" name="user_name" class="form-control" style="font-size:20px; float:left; width:150px;" id="user_name_show" onchange="change();this"><span style="color:red; font-size:18" id="d"></span></td>
        </tr>
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
 

</body>
</html>