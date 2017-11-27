<?php

define('EMAIL_FOR_REPORTS', '');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

define('_DIR_', str_replace('\\', '/', dirname(__FILE__)) . '/');
require_once _DIR_ . '/handler.php';

?>

<?php if (frmd_message()): ?>
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-red.css" type="text/css" />
<span class="alert alert-success"><?php echo FINISH_MESSAGE; ?></span>
<?php else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="<?php echo dirname($form_path); ?>/formoid-solid-red.css" type="text/css" />
<script type="text/javascript" src="<?php echo dirname($form_path); ?>/jquery.min.js"></script>
<form enctype="multipart/form-data" class="formoid-solid-red" style="background-color:#FFFFFF;font-size:18px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Form Edit Asset</h2></div>
	<div class="element-input<?php frmd_add_class("input"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input" placeholder="Barcode"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input5"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input5" placeholder="เลขทะเบียนสินทรัพย์"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input4"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input4" required="required" placeholder="Serial Number"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input3"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="input3" required="required" placeholder="ชื่อสินทรัพย์"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input2"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input2" placeholder="Mac Address"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input1"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input1" placeholder="Computer name"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input6"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input6" placeholder="รุ่น"/><span class="icon-place"></span></div></div>
	<div class="element-date<?php frmd_add_class("date"); ?>"><label class="title"></label><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" name="date" placeholder="Date"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input7"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input7" placeholder="ซื้อจาก"/><span class="icon-place"></span></div></div>
	<div class="element-input<?php frmd_add_class("input8"); ?>"><label class="title"></label><div class="item-cont"><input class="large" type="text" name="input8" placeholder="ราคา"/><span class="icon-place"></span></div></div>
	<div class="element-select<?php frmd_add_class("select"); ?>"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="select" required="required">

		<option value="จอ">จอ</option>
		<option value="เครื่องคอมพิวเตอร์">เครื่องคอมพิวเตอร์</option>
		<option value="All in One">All in One</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-file<?php frmd_add_class("file"); ?>"><label class="title"></label><div class="item-cont"><label class="large" ><div class="button">Choose File</div><input type="file" class="file_input" name="file" /><div class="file_text">รูปภาพ</div><span class="icon-place"></span></label></div></div>
	<div class="element-textarea<?php frmd_add_class("textarea"); ?>"><label class="title"></label><div class="item-cont"><textarea class="medium" name="textarea" cols="20" rows="5" placeholder="หมายเหตุ"></textarea><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><script type="text/javascript" src="<?php echo dirname($form_path); ?>/formoid-solid-red.js"></script>

<!-- Stop Formoid form-->
<?php endif; ?>

<?php frmd_end_form(); ?>