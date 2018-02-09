<?php 
	include("../../Funtion/connect.php");
	//$con = connect_db();
?>
<?php
	include("header.php");
?>
<div class="row">
	<div class="col-md-10 col-md-offset-2">
    	<h1>Updata Data With Modal</h1>
    </div>
    <div class="col-md2">
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-2">
    	<table class="table">
        	<thead>
            	<tr>
                	<th>รหัสสินทรัพย์</th>
                    <th>หมายเลขทะเบียน</th>
                    <th>Serial Number</th>
                    <th>ชื่อสินทรัพย์</th>
                    <th>รุ่น / ยี่ห้อ</th>
                    <th>สถานะการใช้งาน</th>
                    <th>จุดใช้งาน</th>
                    <th>เบิกสินทรัพย์</th>
                 </tr>
              </thead>
              <tbody
              		<?php
					$i = 1;
					foreach($asset as $a){
					?>
                    <tr>
                    	<td><?php echo $i ?></td>
                        <td><?php echo $a['Asset_id'] ?></td>
                        <td><?php echo $a['Asset_code'] ?></td>
                        <td><?php echo $a['Asset_serial'] ?></td>
                        <td><?php echo $a['Asset_name'] ?></td>
                        <td><?php echo $a['brand'] ?></td>
                        <td><?php echo $a['Asset_status'] ?></td>
                        <td><?php echo $a['active_point'] ?></td>
                        <td>
                        	<div class="dropdown">
                            	<button type="button" name="button"
                                class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                                
                                </button>
                                <ul class="dropdown-menu">
                                	<li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                            </div>
                        </td>
                    </tr>
                    <?php
						$i++;
					}
					?>
              </tbody>
    </div>
    <div class="col-md2">
</div>

<?php 
	include("footer.php");
?>
