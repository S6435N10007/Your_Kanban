<?php
session_start();
include 'includes/connect.php';
$sql = "SELECT * FROM tb_order WHERE o_id ='".$_SESSION['order_id']."'";
$result = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($result);
$total = $rs['o_total_price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสั่งซื้อ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 themed-grid-col">
                <div class="alert alert-danger h4 text-center mt4" role="alert">
                <b>รายการสั่งซื้อ</b>
                </div>
                <b>เลขที่ใบสั่งซื้อ :</b> <?php echo $_SESSION['order_id'];?><br>
                <b>ชื่อ-นามสกุล(ผู้รับ) :</b> <?php echo $rs['o_shipping_name']." ".$rs['o_shipping_surname'];?><br>
                <b>ที่อยู่การจัดส่ง :</b> <?php echo $rs['o_shipping_address'];?><br>
                <b>เบอร์โทรศัพท์ :</b> <?php echo $rs['o_shipping_phone'];?><br>
                <div class="card mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>รหัสสินค้า</b></td>
                            <td><b>ชื่อสินค้า</b></td>
                            <td><b>ราคา</b></td>
                            <td><b>จำนวน</b></td>
                            <td><b>ราคารวม</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * 
                                FROM tb_order_product 
                                INNER JOIN tb_product 
                                ON tb_order_product.p_no = tb_product.p_no 
                                WHERE o_id ='".$_SESSION['order_id']."'";
                        $result1 = mysqli_query($conn,$sql1);
                        while($row = mysqli_fetch_array($result1))
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['p_no'];?></td>
                            <td><?php echo $row['p_name'];?></td>
                            <td><?php echo $row['p_price'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['sum_price'];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <h4 class="text-right">ราคารวมทั้งหมด : <?php echo $total;?> บาท</h4>
                </div>
                <div>
                ***กรุณาโอนเงินภายใน 24 ชั่วโมง หลังจากที่ท่านได้ทำการสั่งซื้อสินค้าเรียบร้อยแล้ว<br>
                ธนาคารกรุงไทย <br>
                ชื่อบัญชี : นายปิยะวัฒน์ ดวงพรม<br>    
                เลขที่บัญชี : 123-456789-1
                <br>
                </div>
                <div class="text-center mt-4">
                <a href = "shop.php" class="btn btn-success">Back</a>
                <button onclick="window.print()" class="btn btn-success">Print</button>
                </div>
        </div>
    </div>
</body>
</html>