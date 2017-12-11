function fnSwitch(){
     var chk=document.getElementById("chk");
	 var bt=document.getElementById("btConfirm");
	if(chk.checked==true){
		bt.disabled=false;
	}else{
		bt.disabled=true;
	}
}
function selectKind(){
	var select=document.getElementById("selectkind");
	var saveurl;
	if(select.selectedIndex==0){
		return false;
	}
	window.location.href=window.location+"&kindid="+select.value;
	return true;
}
function switchBg(obj, stateStyle){
	obj.className = stateStyle;
}
function chkRegis(){
	var txtid=document.frmregis.txtid;
	var prefix=document.frmregis.prefix;
	var txtname=document.frmregis.txtname;
	var txtsurname=document.frmregis.txtsurname;
	var txtusername=document.frmregis.txtusername;
	var txtpw=document.frmregis.txtpw;
	var txtpwcf=document.frmregis.txtpwcf;
	var dep=document.frmregis.department;
	if(txtid.value==""){
		txtid.focus();
		return false;
	}
	if(prefix.selectedIndex==0){
		alert('กรุณาใส่คำนำหน้า');
		alert(prefix.value);
		prefix.focus();
		return false;
	}
	if(txtname.value==""){
		txtname.focus();
		return false;
	}
	if(txtsurname.value==""){
		txtsurname.focus();
		return false;
	}
	if(txtusername.value==""){
		txtusername.focus();
		return false;
	}
	if(txtpw.value==""){
		txtpw.focus();
		return false;
	}
	if(txtpwcf.value==""){
		txtpwcf.focus();
		return false;
	}
	if(txtpw.value!==txtpwcf.value){
		alert('คุณยืนยันรหัสผ่าน ไม่ตรงกับ รหัสผ่านที่คุณกรอก');
		txtpwcf.focus();
		return false;
	}
	if(dep.selectedIndex==0){
		alert('กรุณาเลือกส่วนงาน/แผนก ที่คุณทำงานอยู่');
		dep.focus();
		return false;
	}
}
function chkEdit(){
	var prefix=document.frmedit.prefix;
	var txtname=document.frmedit.txtname;
	var txtsurname=document.frmedit.txtsurname;
	var txtpw=document.frmedit.txtpw;
	var txtpwcf=document.frmedit.txtpwcf;
	var dep=document.frmedit.department;
	if(prefix.selectedIndex==0){
		alert('กรุณาใส่คำนำหน้า');
		prefix.focus();
		return false;
	}
	if(txtname.value==""){
		txtname.focus();
		return false;
	}
	if(txtsurname.value==""){
		txtsurname.focus();
		return false;
	}
	if(txtpw.value==""){
		txtpw.focus();
		return false;
	}
	if(txtpwcf.value==""){
		txtpwcf.focus();
		return false;
	}
	if(txtpw.value!==txtpwcf.value){
		alert('คุณยืนยันรหัสผ่าน ไม่ตรงกับ รหัสผ่านที่คุณกรอก');
		txtpwcf.focus();
		return false;
	}
	if(dep.selectedIndex==0){
		alert('กรุณาเลือกส่วนงาน/แผนก ที่คุณทำงานอยู่');
		dep.focus();
		return false;
	}
}
function chkadduserstock(){
	var user=document.getElementById("user");
	var type=document.getElementById("type");
	if(user.value=="0" || user.value=="1"||user.selectedIndex==0){
		alert('กรุณาเลือกชื่อผู้ใช้งาน');
		user.focus();
		return false;
	}
	if(type.selectedIndex==0){
		alert('กรุณาเลือกประเภทผู้ใช้งาน');
		type.focus();
		return false;
	}
}
function slKind(){
	var type=document.getElementById("type");
	var saveurl;
	if(type.selectedIndex==0){
		return false;
	}
	url='index.php?option=hrstock&com_stock=report&action=checkstock';
	window.location.href=url+"&id="+type.value;
	return true;
}