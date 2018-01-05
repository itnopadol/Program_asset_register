<?php
function list_book(){
	connect_db();
	echo "<div style='text-align:center;padding:20px'>";
	echo "<form method='get'>";
	echo "<img src='images/search.JPG' width=150>";
	echo "<br align='center'><input type='text' name='search' size='50' ></br>";
	echo "<p align='center'><input type='radio' name='fieldname' value='book_title'  >&nbsp;ชื่อหนังสือ";
	echo "&nbsp;&nbsp;<input type='radio' name='fieldname' value='book_writer'  >&nbsp;ชื่อผู้แต่ง";
	echo "&nbsp;&nbsp;<input type='radio' name='fieldname' value='book_pub' >&nbsp;ชื่อสำนักพิมพ์";
	echo "&nbsp;&nbsp;<input type='radio' name='fieldname' value='book_cate' >&nbsp;หมวดหมู่</p>";
	echo "<input type='hidden' name='module' value='books'>";
	echo "<input type='hidden' name='action' value='list_book'>";
	echo "<p align='center'><input type='submit' value='ค้นหา'></p>";
	echo "</form></div>";	
	

	if(empty($_GET['search'])){
		$keyword="";
	}else{
		$keyword=$_GET['search'];
	}
		if(empty($_GET['fieldname'])){
		$fieldname=0;
	}else{
		$fieldname=$_GET['fieldname'];
	}
	
	
	

	$rs=mysql_query("SELECT book_id FROM books WHERE $fieldname LIKE '%$keyword%'")or die (mysql_error());
	$rows=mysql_num_rows($rs);
	$rows1page=15;
	$pages=ceil($rows/$rows1page);

		if(empty($_GET['search'])){
		echo "";
	}else{
		echo "<p align='center'><b>พบคำที่ตรงกับคำว่า '$keyword' จำนวน $rows รายการ </b></p>";
	}
	if(empty($_GET['page'])){
		$page_id=1;	
		$start_row=0;
	}else{
		$page_id=$_GET['page'];
		$start_row=($rows1page*$page_id)-$rows1page;
	}
	
	

if($fieldname == "book_pub"){
	
	$rs=mysql_query("SELECT * FROM publishing WHERE pub_name LIKE '%$keyword%'")or die(mysql_error());
	
  	list($pub_id,$pub_name)=mysql_fetch_row($rs);
	$keyword = $pub_id;

}

if($fieldname == "book_cate"){
$rs=mysql_query("SELECT * FROM categories WHERE cate_name LIKE '%$keyword%'")or die(mysql_error());
	
  	list($cate_id,$cate_name)=mysql_fetch_row($rs);
	$keyword = $cate_id;
	
}
///////////////////////////////////////////////////////////////////////////////

	
	$title="SELECT book_id,book_title,book_sprice FROM books WHERE   $fieldname LIKE '%$keyword%'  LIMIT $start_row,$rows1page ";
	
	$result=mysql_query($title) or die(mysql_error());

	

	
	// เรียงค่าจาก มากไปน้อย ORDER BY book_id DESC
	// ส่งค่ากลับออกมาเป็น index array $data=mysql_fetch_row($result);
	// ส่งค่ากลับออกมาเป็น Associative array $data=mysql_fetch_assoc($result);
	// ส่งค่ากลับออกมา 2 ค่า $data=mysql_fetch_array($result);
	//$data=mysql_fetch_array($result);
	//$data=mysql_fetch_row($result);
	//$data=mysql_fetch_assoc($result);

	echo "<table class='table'>";
	echo "<tr bgcolor='#CCCCCC'><th>รหัสหนังสือ</th><th>ชื่อหนังสือ</th><th>ราคา</th></tr>";
		while(list($book_id,$book_title,$book_sprice)=mysql_fetch_row($result)){
			echo "<tr><td align='center'>$book_id</td><td><a href='index.php?module=books&action=book_detail& id=$book_id'>$book_title</a></td><td align='right'>$book_sprice</td></tr>";
			
		}	
	echo "</table>";
	$page_af=$page_id-1;
	$page_be=$page_id+1;
	
	if($page_id==1){
	echo "<p align='center'>
			  <b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp; </span></b>";
	}else{
		echo "
				   <font color='black' size=4><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า&nbsp; ::</font>
				 <a href='index.php?module=books&action=list_book&page=1&search=$keyword&fieldname=$fieldname'>
				<font color='#000' pointsize=11><strong><<</font></a>
				 <a href='index.php?module=books&action=list_book&page=$page_af&search=$keyword&fieldname=$fieldname' > 
				<font color='#000' pointsize=11><strong><</b></strong></a>";
	}
	for($i=1;$i<=$pages;$i++){
		if($page_id==$i){
			echo "<strong><font color='red' size=+2>[$i]</font></strong>";
			}else{
	echo "<a href='index.php?module=books&action=list_book&page=$i&search=$keyword&fieldname=$fieldname'><font color='#000000'>[$i]</font></a>";
			}
	}
	if($page_id=0){
		echo "";
		
		}elseif($page_id==$pages){
	echo "";
	}else{
	echo "<a href='index.php?module=books&action=list_book&page=$page_be&search=$keyword&fieldname=$fieldname' >
				 <font color='#000' pointsize=11><strong> ></strong></b></a>&nbsp;
				 <a href='index.php?module=books&action=list_book&page=$pages&search=$keyword&fieldname=$fieldname' > 
				 <font color='#000' pointsize=11><b>>></b></a>";
	}

	mysql_free_result($result);
	mysql_close();

}
//=============================================================================================

function book_detail(){
	connect_db();
	
	$rs=mysql_query("SELECT*FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_id,$book_title,$book_writer,$book_price,$book_sprice,$book_pub,$book_detail,$book_cover,$book_cate,  $book_stock,$book_time)=mysql_fetch_row($rs);
	
	$rs=mysql_query("SELECT pub_name FROM publishing WHERE pub_id='$book_pub'")or die(mysql_error());
	list($pub_name)=mysql_fetch_row($rs);	
	
	$rs=mysql_query("SELECT cate_name FROM categories WHERE cate_id='$book_cate'")or die(mysql_error());
	list($cate_name)=mysql_fetch_row($rs);
	$li="SELECT book_id,username FROM likes WHERE book_id=$book_id";
	$lik=mysql_query($li);
	$book=mysql_num_rows($lik);


	echo "<table border='0' align='center'><tr><td valign='middle'>";
	echo "<h1>$book_title<br><a href='index.php?module=order&action=add_like&id=$book_id'><img src='images/11.png' width=50></a>&nbsp;($book)</h1>";
	echo "<p align='center'><img src='images/$book_cover' alt='$book_title' title='$book_title'></p>";
	echo "<p> <table border=0 width=500><tr><td><b>รายละเอียด :</b> $book_detail</td></tr></table></p>";
	echo "<p>ราคาปกติ : <strike>$book_price</strike>บาท</p>";
	echo "<p>ราคาพิเศษ : <font color='red'>$book_sprice</font> บาท </p>";
	echo "<p>บริษัท : $pub_name</p>";
	echo "<p>ผู้แต่ง : $book_writer</p>";
	echo "<p>ประเภทหนังสือ : $cate_name</p>";
	echo "<p>เวลา : $book_time</p>";
	
	echo "<p> สถานะ : <strong>",$book_store = 1 ? 'สินค้าพร้อมจำหน่าย' : 'สินค้าหมด',"</strong></p></tr></td>"; 
	echo "</table>";
	echo "<p align='center'><a href='index.php?module=cart&action=add_tocart&id=$book_id'>เลือกหนังสือเล่มนี้</a></p>";
	mysql_close();

echo "<p><a href='index.php?module=books&action=list_book'>กลับไป</a></p>";
	
}
//=============================================================================================

function manage_book(){
	connect_db();
	echo "<div style='text-align:center;padding:20px'>";
	echo "<form method='get'>";
	echo "<img src='images/search.JPG' width=150>";
	echo "<br align='center'><input type='text' name='search' size='50' ></br>";
	echo "<p align='center'><input type='radio' name='fieldname' value='book_title'  >ชื่อหนังสือ";
	echo "<input type='radio' name='fieldname' value='book_writer'  >ชื่อผู้แต่ง";
	echo "<input type='radio' name='fieldname' value='book_pub' >ชื่อสำนักพิมพ์";
	echo "<input type='radio' name='fieldname' value='book_cate' >หมวดหมู่</p>";
	echo "<input type='hidden' name='module' value='books'>";
echo "<input type='hidden' name='action' value='manage_book'>";
	echo "<p align='center'><input type='submit' value='ค้นหา'></p>";
	echo "</form></div>";	
	


	if(empty($_GET['search'])){
		$keyword="";
		$kw=$keyword;
	}else{
		$keyword=$_GET['search'];
		$kw=$keyword;
	}
		if(empty($_GET['fieldname'])){
		$fieldname=0;
	}else{
		$fieldname=$_GET['fieldname'];
	}
	
	
	/////////////////////////////////**********************///////////////////////////////////////////////
	if($fieldname == "book_pub"){
	
	$rs=mysql_query("SELECT * FROM publishing WHERE pub_name LIKE '%$keyword%'")or die(mysql_error());
	
  	list($pub_id,$pub_name)=mysql_fetch_row($rs);
	$keyword = $pub_id;

}

if($fieldname == "book_cate"){
$rs=mysql_query("SELECT * FROM categories WHERE cate_name LIKE '%$keyword%'")or die(mysql_error());
	
  	list($cate_id,$cate_name)=mysql_fetch_row($rs);
	$keyword = $cate_id;
	
}
///////////////////////////////////////////////////////////////////////////////
	

	$rs=mysql_query("SELECT book_id FROM books WHERE $fieldname LIKE '%$keyword%'")or die (mysql_error());
	$rows=mysql_num_rows($rs);
	$rows1page=15;
	$pages=ceil($rows/$rows1page);
 	echo "<p align='center'><b>จำนวน $rows รายการ</b></p>";
		if(empty($_GET['search'])){
		echo "";
	}else{
		echo "<p align='center'><b>พบคำที่ตรงกับคำว่า '$kw'  </b></p>";
	}
	if(empty($_GET['page'])){
		$page_id=1;	
		$start_row=0;
	}else{
		$page_id=$_GET['page'];
		$start_row=($rows1page*$page_id)-$rows1page;
	}
	
	



	
	$title="SELECT book_id,book_title,book_sprice FROM books WHERE   $fieldname LIKE '%$keyword%'  LIMIT $start_row,$rows1page ";
	
	$result=mysql_query($title) or die(mysql_error());

	

	
	// เรียงค่าจาก มากไปน้อย ORDER BY book_id DESC
	// ส่งค่ากลับออกมาเป็น index array $data=mysql_fetch_row($result);
	// ส่งค่ากลับออกมาเป็น Associative array $data=mysql_fetch_assoc($result);
	// ส่งค่ากลับออกมา 2 ค่า $data=mysql_fetch_array($result);
	//$data=mysql_fetch_array($result);
	//$data=mysql_fetch_row($result);
	//$data=mysql_fetch_assoc($result);
	/////////////////////////////////////////////////////////
if(empty($_GET['all'])){
$chk1="";
$chk="<a href='index.php?module=books&action=manage_book&all=1'>เลือกทั้งหมด</a>";

}elseif($_GET['all']==1){
$chk1="checked='checked'";
$chk="<a href='index.php?module=books&action=manage_book&all=0'>ยกเลิกทั้งหมด</a>";

}

///////////////////////////////////////////////////////
	
	echo "<form method='POST' action='index.php?module=books&action=delete_book' >";
	echo "<table border=1 width=80% align='center' >";
	echo "<tr bgcolor='#CCCCCC'><th>$chk</th><th>รหัสหนังสือ</th><th>ชื่อหนังสือ</th><th>ราคาพิเศษ</th><th>แก้ไข</th><th>ลบข้อมูล</th></tr>";
		while(list($book_id,$book_title,$book_sprice)=mysql_fetch_row($result)){
			echo "<tr><td align='center'><input type='checkbox' name='book_id[]' value='$book_id' $chk1></td><td align='center'>$book_id</td><td><a href='index.php?module=books&action=book_detail&id=$book_id'>$book_title</a></td><td align='right'>$book_sprice</td><td align='center'><a href='index.php?module=books&action=edit_from&id=$book_id'>แก้ไข</a></td><td align='center'><a href='index.php?module=books&action=delete_book&id=$book_id' onclick=\"return confirm('คุณแน่ใจว่าจะลบข้อมูลหนังสือเล่มนี้')\">ลบ</a></td></tr>";
			
		}	
	echo "</table>";

	$page_af=$page_id-1;
	$page_be=$page_id+1;
	
	
	
if($rows<$rows1page){
			echo "<p align='center'><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp; </b>";
}elseif($page_id<=1){
	echo "<p align='center'><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า ::&nbsp;</b></p>";
	}else{
		echo "<font color='black' size=4><b>&nbsp;หน้า $page_id จากทั้งหมด $pages หน้า&nbsp; ::</font>
				 <a href='index.php?module=books&action=manage_book&page=1&search=$keyword&fieldname=$fieldname'>
				<font color='#000' pointsize=11><<</font></a>
				 <a href='index.php?module=books&action=manage_book&page=$page_af&search=$keyword&fieldname=$fieldname' > 
				<</a>";
	}
	for($i=1;$i<=$pages;$i++){
		if($page_id==$i){
			echo "<strong><font color='red' size=+2>[$i]</font></strong>";
			}else{
	echo "<a href='index.php?module=books&action=manage_book&page=$i&search=$keyword&fieldname=$fieldname'><font color='#000000'>[$i]</font></a>";
			}
	}
	
	if($page_id==$pages){
	echo "";
	}else{
	echo "<a href='index.php?module=books&action=manage_book&page=$page_be&search=$keyword&fieldname=$fieldname' >
				 <font color='#000' pointsize=11><strong> > &nbsp;
				 <a href='index.php?module=books&action=manage_book&page=$pages&search=$keyword&fieldname=$fieldname' > 
				 <font color='#000' pointsize=11><b>>></b></a>";
		}		 echo "<hr>";
		echo "<p align='center'><input type='submit' value='ลบหนังสือ' onclick=\"return confirm('คุณต้องการลบรายการที่เลือกใช่หรือไม่')\">";
		
		echo "</form>";
		
	
	


	
	mysql_free_result($result);
	mysql_close();


}
//=============================================================================================
function book_form(){
	connect_db();
	?>
    
    <form method="post" action="index.php?module=books&action=insert_book" enctype="multipart/form-data">
	<p>ชื่อหนังสือ : <input type="text" name="book_title" size="80" /></p>
    <p>ชื่อผู้แต่ง : <input type="text" name="book_writer" size="40"/></p>
  <p>ราคาปกติ : <input type="text" name="book_price" size="20"/></p>
  <p>ราคาพิเศษ : <input type="text" name="book_sprice" size="20"/></p>
  <p>สำนักพิมพ์ :
    <?php	
	$pu=mysql_query("SELECT*FROM publishing") or die(mysql_error());
	//echo "<h1>แสดงรายการหมวดหมู่หนังสือ</h1>";
	echo "<select name='book_pub'>";
	while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
		echo "<option value='$pub_id'>&nbsp;$pub_name</option>";
	}
	echo "</select>"; ?>
    <p>รายละเอียดหนังสือ : <textarea name="book_detail" rows="5" cols="40"/></textarea> </p>
    <p>ปกหนังสือ :  <input type="file" name="book_cover" /></p>
 	<p>หมวดหมู่ : <?php $ca=mysql_query("SELECT*FROM categories") or die(mysql_error());
	//echo "<h1>แสดงรายชื่อสำนักพิมพ์</h1>";
	while(list($cate_id,$cate_name)=mysql_fetch_row($ca)){
		echo "<input type='radio' name='book_cate' value='$cate_id'>&nbsp;$cate_name&nbsp;&nbsp;";
		
	}
	
	mysql_free_result($pu);
	mysql_free_result($ca);
	mysql_close();
  ?>    </p>
    <p><input type="checkbox" name="book_stock"  /> พร้อมจำหน่าย</p><hr>

<p><input type="submit" name="add" value="เพิ่มหนังสือ" />&nbsp;&nbsp;<input type="reset" name="exit" value="ยกเลิก" /></p>
    			
</form>
        
    <?php
}
//=============================================================================================
function insert_book(){
	connect_db();
$book_time=date("Y-m-d H:i:s");
$book_cover=$_FILES['book_cover']['name'];//ชื่อไฟล์รูป
$book_tmp=$_FILES['book_cover']['tmp_name'];//ที่อยู่ของไฟล์ tmp

copy($book_tmp,"images/$book_cover");

if(empty($_POST['book_stock'])){
	$book_stock=0;
}else{
	$book_stock=1;
}


$sql="INSERT INTO books VALUES('','$_POST[book_title]','$_POST[book_writer]','$_POST[book_price]','$_POST[book_sprice]','$_POST[book_pub]','$_POST[book_detail]','$book_cover','$_POST[book_cate]','$book_stock','$book_time')";

mysql_query($sql)or die(mysql_error());

//4.ปิดฐานข้อมูล
	mysql_close();
//header("Location:list_book.php");
echo "<script language='javascript'>window.location='index.php?module=books&action=manage_book'</script>";	
	
}
//=============================================================================================
function delete_book(){
	connect_db();
			if(isset($_GET['id'])){
	$sql="DELETE FROM books WHERE book_id='$_GET[id]'";
	}else{
		if(empty($_POST['book_id'])){
			echo "กรุณาเลือกหนังสือที่ต้องการจะลบจาก checkbox อย่างน้อย 1 เล่ม";
		}else{
		$book_id=$_POST['book_id'];
		$sql="DELETE FROM books WHERE book_id='$book_id[0]'";
		$cnt=count($book_id);
		for($i=1;$i<$cnt;$i++){
			$sql.="OR book_id='$book_id[$i]'";	
			}
		}
}
		
///echo $sql;
if(isset($sql)){
mysql_query($sql)or die(mysql_error());
mysql_close();
echo "<script language='javascript'>window.location='index.php?module=books&action=manage_book'</script>";
}
}
//=============================================================================================
function edit_from(){
	connect_db();
	$rs=mysql_query("SELECT*FROM books WHERE book_id='$_GET[id]'") or die(mysql_error());
	list($book_id,$book_title,$book_writer,$book_price,$book_sprice,$book_pub,$book_detail,$book_cover,$book_cate,  $book_stock,$book_time)=mysql_fetch_row($rs);
	
	$pu=mysql_query("SELECT*FROM publishing") or die(mysql_error());
	$ca=mysql_query("SELECT*FROM categories") or die(mysql_error());
?>


<h1>ฟอร์มแก้ไขข้อมูลหนังสือ</h1>
<form method="post" action="index.php?module=books&action=update_book" enctype="multipart/form-data">
	<input type="hidden" name="book_id" value="<?php echo $book_id ?>"  />
	<p>ชื่อหนังสือ : <input type="text" name="book_title" size="80" value="<?php echo $book_title ?>"/></p>
    <p>ชื่อผู้แต่ง : <input type="text" name="book_writer" size="40" value="<?php echo $book_writer ?>"/></p>
  <p>ราคาปกติ : <input type="text" name="book_price" size="20" value="<?php echo $book_price ?>"/></p>
  <p>ราคาพิเศษ : <input type="text" name="book_sprice" size="20" value="<?php echo $book_sprice ?>"/></p>
  <p>สำนักพิมพ์ : <?php	
	echo "<select name='book_pub'>";
	while(list($pub_id,$pub_name)=mysql_fetch_row($pu)){
		if($book_pub==$pub_id){
		echo "<option value='$pub_id' selected='selected' >$pub_name</option>";
		}else{
		echo "<option value='$pub_id'>$pub_name</option>";
		}
	}
	echo "</select>"; ?>
    				</p>
    <p>รายละเอียดหนังสือ : <textarea name="book_detail" rows="5" cols="100" /><?php echo $book_detail ?></textarea></p>
    <p>ปกหนังสือ :  <input type="file" name="book_cover" value="<?php echo $book_cover ?>"/></p>
 	<p>หมวดหมู่ : <?php 
	//echo "<h1>แสดงรายชื่อสำนักพิมพ์</h1>";
	while(list($cate_id,$cate_name)=mysql_fetch_row($ca)){
		if($book_cate==$cate_id){
		echo "<input type='radio' name='book_cate' value='$cate_id' checked='checked'>$cate_name";
		}else{
		echo "<input type='radio' name='book_cate' value='$cate_id' >$cate_name";
		}
		
		
	}
	
	mysql_free_result($pu);
	mysql_free_result($ca);
	mysql_close();
 ?>    </p>
    <p><input type="checkbox" name="book_stock"  /> พร้อมจำหน่าย</p><hr>

<p><input type="submit" name="add" value="แก้ไขหนังสือ" />&nbsp;&nbsp;<input type="reset" name="exit" value="ยกเลิก" /></p>
    			
</form>
	
	<?php
	}
	//=============================================================================================
	
	function update_book(){
		connect_db();
$book_time=date("Y-m-d H:i:s");
$book_cover=$_FILES['book_cover']['name'];//ชื่อไฟล์รูป
$book_tmp=$_FILES['book_cover']['tmp_name'];//ที่อยู่ของไฟล์ tmp

if($book_cover){
	$update_cover="book_cover='$book_cover'";
	copy($book_tmp,"images/$book_cover");
}else{
	$update_cover="";	
}




if(empty($_POST['book_stock'])){
	$book_stock=0;
}else{
	$book_stock=1;
}

$sql="UPDATE books SET book_title='$_POST[book_title]',book_writer='$_POST[book_writer]',book_price='$_POST[book_price]',book_sprice='$_POST[book_sprice]',book_pub='$_POST[book_pub]',book_detail='$_POST[book_detail]',book_cate='$_POST[book_cate]',book_stock='$book_stock',book_time='$book_time',$update_cover WHERE book_id=$_POST[book_id]";

mysql_query($sql)or die(mysql_error());


//4.ปิดฐานข้อมูล
	mysql_close();

echo "<script language='javascript'>window.location='index.php?module=books&action=manage_book'</script>";

		}
?>