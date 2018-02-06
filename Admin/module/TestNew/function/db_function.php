<?php
//Step1 ติดต่อฐานข้อมูล
//Step2 เลือกฐานข้อมูลที่จะใช้งาน
function connect_db(){
  $con=mysqli_connect("localhost","root","","nopadol");
  //mysqli_connect("locallhost","ชื่อผู้ใช้","รหัสผ่าน","ชื่อฐานข้อมูล");
  mysqli_set_charset($con,"utf8");//กำหนดชุดตัวอักษรเป็น utf8 เพื่อนให้รองรับภาษาไทย
return $con;
}
//Step3 เรียกใช้ตำสั่ง SQL

//Step4 ปิดฐานข้อมูล

?>