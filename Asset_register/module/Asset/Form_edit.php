<?php 
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Form Edit Asset</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
    </script>
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<?php
	$result=mysqli_query($con,"SELECT * FROM asset WHERE 
	Asset_id='$_GET[Asset_id]'")  or die("SQL Error=>".mysqli_error($con));

	list($Asset_id,$Asset_code ,$Asset_serial ,$Asset_name ,$mac_address,$computer_name
	,$brand ,$Asset_date ,$Asset_company ,$Asset_price,$Asset_barcode
	,$Asset_Category,$Asset_photo ,$Asset_time,$detail)=mysqli_fetch_row($result);
?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="../../CSS/formoid-solid-red.css" type="text/css" />
<script type="text/javascript" src="../../JS/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-red" 
	style="background-color:#FFFFFF;font-size:18px;font-family:'TH Sarabun New','Tw Cen MT',Arial,Helvetica,sans-serif;
	color:#34495E;max-width:420px;min-width:100px" method="post" action="Asset_update.php">
    <input type="hidden" name="Old_ID" value="<?php echo $Asset_id ?>">
    <input type="hidden" name="Cat_ID" value="<?php echo $Category_id ?>">
  <div class="title"><h2>Form Edit Asset</h2></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_barcode" placeholder="Barcode" value="<?php echo $Asset_barcode ?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_code" placeholder="เลขทะเบียนสินทรัพย์" value="<?php echo $Asset_code ?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_serial" required placeholder="Serial Number" 
        value="<?php echo $Asset_serial ?>"/>
        
    </div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_name" required placeholder="ชื่อสินทรัพย์" 
        value="<?php echo $Asset_name ?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="mac_address" placeholder="Mac Address" value="<?php echo $mac_address?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="computer_name" placeholder="Computer name" 
        value="<?php echo $computer_name ?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="brand" placeholder="รุ่น" value="<?php echo $brand ?>"/>
        
        </div></div>
	<div class="element-date"><label class="title"></label><div class="item-cont">
    	<input class="large" data-format="yyyy-mm-dd" type="date" name="Asset_date" placeholder="Date" 
        value="<?php echo $Asset_date ?>"/>
       
    </span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_company" placeholder="ซื้อจาก" 
        value="<?php echo $Asset_company ?>"/>
        
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
		<input class="large" type="text" name="Asset_price" placeholder="ราคา" value="<?php echo $Asset_price ?>"/>
        
        </div></div>
	<div class="element-select"><label class="title"><span class="required">*</span></label>
    <div class="item-cont"><div class="large"><select name="Asset_Category" >
		<?php
				  $result=mysqli_query($con,"SELECT Category_id,Category_name FROM category ") 
				  or die ("mysql error=>>".mysql_error($con));
				  while(list($Category_id,$Category_name)=mysqli_fetch_row($result)){
					  $select = $Category_id == $Asset_Category? "selected":"";
				  echo "<option value='$Category_id' $select>$Category_name</option>";  
				  }
				  
				  mysqli_free_result($result);
				  mysqli_close($con);
				?>
        </select>
        </div></div></div>
	<div class="element-file">
        <label class="title"></label><div class="item-cont">
        <label class="large" ><div class="button">Choose File</div>
        <input type="file" class="file_input" name="Asset_photo" />
    	<div class="file_text">รูปภาพ</div>
        
        </label>
	</div></div>
	<div class="element-textarea">
        <label class="title"></label><div class="item-cont">
        <textarea class="medium" name="detail" cols="20" rows="5" placeholder="หมายเหตุ"><?php echo $detail?></textarea>
    	
	</div></div>
	<div class="submit">
    	<input type="submit" onClick="MM_popupMsg('บันทึกข้อมูลเรียบร้อยแล้วจ้า :3')" value="Submit"/>
	</div>
    
</form>
<script type="text/javascript" src="../../JS/formoid-solid-red.js"></script>
<!-- Stop Formoid form-->
</body>
</html>
