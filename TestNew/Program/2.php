<?php
	include("../function/db_function.php");
	$con=connect_db();
?>
<!doctype html>
<html lang="en">
<head>
<title>รายการวัสดุ / อุปกรณ์</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>รายการวัสดุ / อุปกรณ์</title>
<style>
	body{margin-top:40px;
	}
</style>

		<form class="form-inline my-2 my-lg-0" method ="get">
	    ค้นหา :  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหารายการ" aria-label="Search" id="sizezi2" name='keyword'>
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="sizezi2">Search</button>
</form>
              </div>
		</nav>
        
	









































<div class="container">
<button data-toggle = "modal" data-target="#editemployee" data-id="1">เพิ่มรายการสินค้า</button>
</div>





<div class="modal fade" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        
        
        
        
        <h4 class="modal-title" align="center">ฟอร์มเพิ่มจำนวนวัสดุ-อุปกรณ์</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">รหัสวัสดุ :</label>
            <input type="text" class="form-control" id="emp_id"></label>
            <label for="recipient-name" class="control-label">รายการ :</label>
            <input type="text" class="form-control" id="emp_id"></label>
            <label for="recipient-name" class="control-label">รุ่น/ยี่ห้อ :
            <input type="text" class="form-control" id="emp_id"></label>
            <label for="recipient-name" class="control-label">ประเภท :
            <input type="select" class="form-control" id="emp_id"></label>
            <?php 
 	  
             ?>
             </select>
            <label for="recipient-name" class="control-label">ราคา :
            <input type="text" class="form-control" id="emp_id"></label>
            <label for="recipient-name" class="control-label">จำนวนที่มีอยู่ :
            <input type="text" class="form-control" id="emp_id"></label><p><hr>
            
             <label for="recipient-name" class="control-label">วัน/เดือน/ปีที่รับเข้า :</label>
            <input type="text" class="form-control" id="emp_id"></label>
             <label for="recipient-name" class="control-label">จำนวนที่รับเข้า :</label>
            <input type="text" class="form-control" id="emp_id"></label>
            
            
            
          
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">เพิ่ม</button>
        <button type="button" class="btn btn-danger"">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#editemployee').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget);
	  var id= button.data('id');
	  var modal = $(this);
	  modal.find('#emp_id').val(id);
	});
});
</script>
</body>
</html>