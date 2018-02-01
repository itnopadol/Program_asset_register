<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	.bodyfont{
		font-family:"TH Sarabun New", "Tw Cen MT";
		font-size:22px;
	}
	#sizezi{
		font-size:25px;
		
	}
	#sizezi2{
		font-size:22px;
	}
	#centertable{
		text-align:center;	
	}
	#midter{
		padding-top:50px;
	}
	
	navbar{
	padding-botton:20px;
	}
</style>

</head>

<title>รายการวัสดุ / อุปกรณ์</title>
</head>
<link rel="stylesheet" href="css/css/bootstrap.min.css">
<body class="bodyfont">
<div class="container">

	<!-- Static navbar -->
    	<div id="sizezi2" style="padding-top:20px; width:98%; padding-left:5.3%" > 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand"  id="sizezi">รายการวัสดุ / อุปกรณ์ทั้งหมด</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  				</button>
                
		<form class="form-inline my-2 my-lg-0" method ="get">
	   ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </form>
       <button class="btn btn-outline-success my-2 my-sm-0" style="font-size:22px" ><a href="add_spare.php"><img src='../img/678092-sign-add-128.png'  width='30'  height='30'>เพิ่มรายการ</a></button>&nbsp;&nbsp;&nbsp;
                </form>
                
			</div>
		</nav>
        
<?php
	include("../function/db_function.php");// include ไฟล์ที่เขียนฟังก์ชันไว้เข้ามาใช้งาน
	$con=connect_db();//เรียกใช้ฟงัก์ชั่นในการติดต่อฐานข้อมูล
	
	if(empty($_GET['keyword'])){ 
		$keyword="";
	}
	else{
		$keyword=$_GET['keyword'];
	}
	$result1 = mysqli_query($con,"SELECT id FROM spare_part WHERE  name  LIKE '%$keyword%' OR name LIKE '%$keyword%'OR brand LIKE '%$keyword%'OR category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%'  ORDER BY id DESC LIMIT 1)")or die(mysqli_error($con));
	
	$row=mysqli_num_rows($result1); //จำนวนแถวที่คิวรี่ออกมาได้
	$rowspage=10;//กำหนดจำนวนแถวที่จะแสดงในแต่ละหน้า
	$page=ceil($row/$rowspage); //จำนวนหน้าทั้งหมด = ปัดเศษขึ้น (จำนวนแถวทั้งหมด /จำนวนแถวใน 1 หน้า)

    if(empty($_GET['page_id'])){//ตรวจสอบว่าตัวแปร $_GET['page_id'] ว่างหรือไม่
		$page_id=1; //กำหนดให้แสดงหน้า 1
	}
	else{
			$page_id=$_GET['page_id'];//รับค่าหมายเลขหน้ามาจากลิ้งค์ด้วยวิธี GET /
	}
	
	 $start_rows=($page_id*$rowspage)-$rowspage; //แถวแรกที่จะแสดงในแต่ละหน้า(หมายเลขหน้า * จำนวนแถวใน 1 หน้า) จำนวนแถวใน 1 หน้า
	
	
	$result2 = mysqli_query($con,"SELECT * FROM spare_part WHERE  id LIKE '%$keyword%' OR category LIKE '%$keyword%'OR brand  LIKE '%$keyword%' OR category =(SELECT Category_id FROM category_spare WHERE Category_name  LIKE '%$keyword%' LIMIT 1) ORDER BY id DESC LIMIT $start_rows,$rowspage")or die("SQL Error2".mysqli_error($con));
	
	$result3 = mysqli_query($con,"SELECT * FROM category_spare")
	or die("SQL Error2".mysqli_error($con));
	
	 if($row==0){ // ถ้านับจำนวนแถวที่คิวรี่ออกมาได้เท่ากับ 0 แสดงว่าไม่มีข้อมูลที่ตรงกับคำค้นหา
		echo"<p>ไม่พบข้อมูลที่ตรงกับคำค้น \"<b>$keyword</b>\"</p><hr>";
	}
	else{
		echo"<p align='center'>จำนวนวัสดุ / อุปกรณ์ที่มีตรงกับคำค้น \"<b>$keyword</b>\"
มีทั้งหมด $row รายการ </p>";
	$num=1;//กำหนดตัวแปรเพื่อนับแถว

?>

	<table border='0' align='center' width='90%' >
	<tr><td>
	<table border='0' align='center' class='table' >
	<thead>
    <tr>
	<th>รหัสวัสดุ</th>
	<th>รูปภาพ</th>
	<th>รายการ</th>
	<th>รุ่น / ยี่ห้อ</th>
	<th>ราคาซื้อ</th>
	<th>ประเภท</th>
	<th>จำนวนสินค้าทั้งหมด</th>
    <th>จำนวนจ่าย</th>
	<th>คงเหลือ</th>
	<th>จำนวนรับล่าสุด</th>
	<th>เพิ่มจำนวน</th>
	<th>แก้ไข</th>
	<th>ลบ</th>
	</tr>
	</thead>
	
	<?php
	while(list($id,$photo,$name,$brand,$price,$category,$stock,$acquire,$Pay,$balance,$time) = mysqli_fetch_row($result2)){ 
	
	$sql=mysqli_query($con,"SELECT Category_name FROM category_spare  
	WHERE Category_id='$category' ")or die("SQL error2  ".mysqli_error($con));
    list($category)=mysqli_fetch_row($sql);

	echo "<tr>";
	echo "<td align='center' style='padding-top:3%' >$id</td>";
	echo"<td align='center'><img src='../img/$photo'  width='60'  height='60' ></td>";
	echo "<td align='center'  style='padding-top:3%' >$name</td>";
	echo "<td align='center'  style='padding-top:3%' >$brand</td>";
	echo "<td align='center'  style='padding-top:3%' >$price</td>";
	echo "<td align='center'  style='padding-top:3%' >$category</td>";
	echo "<td align='center'  style='padding-top:3%' >$stock</td>";
	echo "<td align='center'  style='padding-top:3%' >$Pay</td>";
	echo "<td align='center'  style='padding-top:3%' >$balance</td>";
	echo "<td align='center'  style='padding-top:3%' >$acquire</td>";
	
	echo"<td align='center'  style='padding-top:2%;cursor:pointer;'><img src='../img/11.png'  width='35'  height='35' onClick=\"Omd('$id', '$name', '$brand', '$price', '$category', '$stock', '$Pay', '$balance', '$acquire')\"></TD>";
	
	echo "<td align='center'  style='padding-top:2%' ><a href='edit_spare.php?id=$id'><img src='../img/if_pencil_10550.png'  width='35'  height='35'></TD>";
	
	echo "<td align='center'  style='padding-top:2%' ><a href='delete_spare.php?id=$id' onclick='return confirm(\"กดปุ่ม ตกลงเพื่อยืนยันการลบข้อมูล\")'><img src='../img/cancel.png'  width='35'  height='35'></TD>";
	echo "</tr>"; 
	$num++;//เพิ่มค่าตัวแปรนับแถว
	
	}
	echo"</table>";
	echo"</form>";
	
//วนลูปแสดงลิงค์หมายเลขหน้า ตามจำนวนหน้า
	echo"หน้า $page_id : จาก $page ";

	$go=$page_id+1;
	$back=$page_id-1;
 	if($page_id>1){//ถ้า$page มากกว่า 1 ให้แสดงหน้าก่อนหน้า
		echo "<span><a href='list_spare.php?page_id=$back&keyword=$keyword'>ก่อนหน้า...</a></span>";
		}
		 for($id=1;$id<=$page;$id++){

 	 if($id==$page_id){  //ถ้าเป็นหน้าปัจจุบัน ให้แสดงเลขหน้าเป็นตัวหนาสีแดงและไม่มีลิ้งค์
     echo"<span style='font-weight:bold;color:red;'>[ $id ]</span>";
  }
  else{//ถ้าไม่ใช่หน้าปัจจุบันให้แสดงลิ้งค์ปกติ
  echo"<span style='color:back;'><a href='list_spare.php?page_id=$id&keyword=$keyword'>[ $id ]</a></span> ";
      }
}

		if($page!=$page_id){//ถ้า$page ไม่เท่ากับ $page_id ให้แสดงหน้าถัดไป
			    echo "<span><a href='list_spare.php?page_id=$go&keyword=$keyword'>...หน้าถัดไป</a></span>";
			  }
	}
	
	mysqli_free_result($result1);//คืนหน่วยความจำให้กับระบบ
 	mysqli_free_result($result2);//คืนหน่วยความจำให้กับระบบ
	mysqli_close($con); //ปิดฐานข้อมูล


?>
<div class="modal fade" id="id" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 170px;">
      <div class="modal-header">
       <h1 class="modal-title" align="center">ฟอร์มเพิ่มจำนวนวัสดุ-อุปกรณ์</h1>
      </div>
      <div class="modal-body">
          <div class="form-group">          
             <form action="update_numspare.php" method="post" enctype="multipart/form-data">
           
           <label for="recipient-name" class="control-label">รหัสวัสดุ :</label>
           <input type="text" class="form-control" name="item_id" id="item_id" readonly style="font-size:22px"></label>
            
            <label for="recipient-name" class="control-label">รายการ :</label>
            <input type="text" class="form-control" name="name" id="name" readonly style="font-size:22px"></label>
            
            <label for="recipient-name" class="control-label">รุ่น/ยี่ห้อ :
            <input type="text" class="form-control" name="brand" id="brand" readonly  style="font-size:20px"></label>
            
            <label for="recipient-name" class="control-label">ประเภท :
            <input type="select" class="form-control" name="category" id="category" readonly  style="font-size:20px">
           </label>
       
            <label for="recipient-name" class="control-label">ราคา :
            <input type="text" class="form-control" id="price" name="price" readonly  style="font-size:20px"></label>
            <label for="recipient-name" class="control-label">จำนวนที่มีอยู่ :
            <input type="text" class="form-control" id="stock" name="stock" readonly  style="font-size:20px"></label><p><hr>
            
             <label for="recipient-name" class="control-label">วันที่เพิ่มจำนวน :</label>
            <input type="date" class="form-control" name="time" readonly  value="<?php echo date("Y-m-d") ?>"  style="font-size:20px"> </label>
           
            <input type="hidden" name="pay" id="Pay">
                       
            <label for="recipient-name" class="control-label">จำนวนที่รับเข้า :</label>
            <input type="text" class="form-control" name="acquire" style="font-size:22px"></label>
           
          </div>
      </div>
      <div class="modal-footer">
      <input type="submit" value="เพิ่มจำนวน" class="btn btn-success"  style="font-size:20px">
      <button type="reset" class="btn btn-danger" data-dismiss="modal" style="font-size:20px">ยกเลิก</button>  
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	function Omd(id, name, brand, price, category, stock, balance, acquire,time,Pay){
		 $("#id").modal('show');
		 
		  document.getElementById("item_id").value = id;
		  document.getElementById("name").value = name;
		  document.getElementById("brand").value = brand;
		  document.getElementById("category").value = category;
		  document.getElementById("price").value = price;
		  document.getElementById("stock").value = stock; 
		  document.getElementById("time").value = time;
		  document.getElementById("Pay").value = Pay;
	}
</script>
        
      </div>
    </div>
  </div>
</div>
<p align="center"><a href="menu_rent.php">กลับหน้า Index</a></p>
</body>
</html>
  


