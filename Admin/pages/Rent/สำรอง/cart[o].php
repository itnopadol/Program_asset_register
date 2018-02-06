<?php
session_start();
require "../../Funtion/Funtion.php";
$con = connect_db();

$action = isset($_GET['a']) ? $_GET['a'] : "";
$ItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['Qty']))
{
    $myQty = 0;
    foreach ($_SESSION['Qty'] as $myItem)
    {
        $myQty = $myQty + $myItem;
    }
} else
{
    $myQty = 0;
}
if (isset($_SESSION['cart']) and $ItemCount > 0)
{
    $itemIDs = "";
    foreach ($_SESSION['cart'] as $ItemID)
    {
        $itemIDs = $itemIDs . $ItemID . ",";
    }
    $inputItem = rtrim($itemIDs, ",");
	$sql = "SELECT * FROM spare_part WHERE id = '$inputItem'";
	$myQuery = mysqli_query($con,$sql) or die ("Error =>".mysqli_error($con));
    $myCount = mysqli_num_rows($myQuery);
} else
{
    $myCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
   		<link href="../../CSS/nava.css" rel="stylesheet">
    	<link href="../../CSS/bootstrapv3.1.1.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container">

            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Shopping Cart - ItOffside.com</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index_sp.php">หน้าแรกสินค้า</a></li>
                            <li><a href="cart.php">ตะกร้าสินค้าของฉัน <span class="badge"><?php echo $myQty; ?></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>
			<h3>รายการวัสดุของฉัน</h3>
            <!-- Main component for a primary marketing message or call to action -->
            <?php
            if ($action == 'removed')
            {
                echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
            }

            if ($myCount == 0)
            {
                echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
            } else
            {
                ?>
                <form action="updatecart.php" method="post" name="fromupdate">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>รายละเอียด</th>
                                <th>จำนวน</th>
                                <th>ราคาต่อหน่วย</th>
                                <th>จำนวนเงิน</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            $num = 0;
                            while ($myResult = mysqli_fetch_assoc($myQuery))
                            {
                                $key = array_search($myResult['id'], $_SESSION['cart']);
                                $total_price = $total_price + ($myResult['price'] * $_SESSION['Qty'][$key]);
                                ?>
                                <tr>
                                    <td><img src="img/<?php echo $myResult['photo']; ?>" border="0"></td>
                                    <td><?php echo $myResult['id']; ?></td>
                                    <td><?php echo $myResult['name']; ?></td>
                                    <td><?php echo $myResult['brand']; ?></td>
                                    <td>
                                        <input type="text" name="Qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['Qty'][$key]; ?>" 
                                        class="form-control" style="width: 60px;text-align: center;">
                                        <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                    </td>
                                    <td><?php echo number_format($myResult['price'],2); ?></td>
                                    <td><?php echo number_format(($myResult['price'] * $_SESSION['Qty'][$key]),2); ?></td>
                                    <td>
                                        <a class="btn btn-danger btn-lg" href="removecart.php?ItemID=<?php echo $myResult['id']; ?>" role="button">
                                            <span class="glyphicon glyphicon-trash"></span>
                                            ลบทิ้ง</a>
                                    </td>
                                </tr>
                                <?php
                                $num++;
                            }
                            ?>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price,2); ?> บาท</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <button type="submit" class="btn btn-info btn-lg">คำนวณราคาสินค้าใหม่</button>
                                    <a href="Sp_rent.php" type="button" class="btn btn-primary btn-lg">สังซื้อสินค้า</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php
            }
            ?>

        </div> <!-- /container -->

    <script src="../../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../JS/bootstrap.min.js"></script>
    </body>
</html>
<?php
mysqli_close($con);
?>