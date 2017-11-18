<?php 
	include("../../Funtion/funtion.php");
	$con = connect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Form Asset</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<!-- Start Formoid form-->
<link rel="stylesheet" href="../../CSS/formoid-solid-red.css" type="text/css" />
<script type="text/javascript" src="../../JS/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-red" 
	style="background-color:#FFFFFF;font-size:18px;font-family:'TH Sarabun New','Tw Cen MT',Arial,Helvetica,sans-serif;
	color:#34495E;max-width:450px;min-width:150px" 
	method="post"><div class="title"><h2>Form Asset</h2></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_barcode" placeholder="Barcode"/ >
        <span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_code" placeholder="เลขทะเบียนสินทรัพย์"/>
        <span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_serial" required placeholder="Serial Number"/>
        <span class="icon-place"></span>
    </div></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_name" required placeholder="ชื่อสินทรัพย์"/><span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="mac_address" placeholder="Mac Address"/><span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="computer_nam" placeholder="Computer name"/><span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="brand" placeholder="รุ่น"/><span class="icon-place"></span></div></div>
	<div class="element-date"><label class="title"></label><div class="item-cont">
    	<input class="large" data-format="yyyy-mm-dd" type="date" name="Asset_date" placeholder="Date"/>
        <span class="icon-place">
    </span></div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
    	<input class="large" type="text" name="Asset_company" placeholder="ซื้อจาก"/><span class="icon-place"></span>
	</div></div>
	<div class="element-input"><label class="title"></label><div class="item-cont">
		<input class="large" type="text" name="Asset_price" placeholder="ราคา"/><span class="icon-place"></span></div></div>
	<div class="element-select"><label class="title"><span class="required">*</span></label>
    <div class="item-cont"><div class="large"><span><select name="Category_id" >
		<?php
				  $result=mysqli_query($con,"SELECT Category_id,Category_name FROM category") 
				  or die ("mysql error=>>".mysql_error($con));
				  while(list( $Category_id,$Category_name)=mysqli_fetch_row($result)){
					  $select = $Category_id == $Category_name? "selected":"";
				  echo "<option value='$Category_id' $select>$Category_name</option>";  
				  }
				  
				  mysqli_free_result($result);
				  mysqli_close($con);
				?>
        </select><i></i><span class="icon-place">
        </span></span></div></div></div>
	<div class="element-file">
        <label class="title"></label><div class="item-cont">
        <label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="Asset_photo" />
    	<div class="file_text">รูปภาพ</div><span class="icon-place"></span></label>
	</div></div>
	<div class="element-textarea">
        <label class="title"></label><div class="item-cont">
        <textarea class="medium" name="detail" cols="20" rows="5" placeholder="หมายเหตุ"></textarea>
    	<span class="icon-place"></span>
	</div></div>
	<div class="submit">
    	<input type="submit" value="Submit"/>
	</div>
    
</form>
<script type="text/javascript" src="../../JS/formoid-solid-red.js"></script>
<!-- Stop Formoid form-->
</body>
</html>
