<meta charset="utf-8">
<?php
session_start();
include 'includes/connect.php';
$timestamp = date('Y-m-d H:i:s');
$shipping_name = $_POST['shipping_name'];
$shipping_surname = $_POST['shipping_surname'];
$shipping_address = $_POST['shipping_address'];
$shipping_phone = $_POST['shipping_phone'];
$status = "0";
$month = date('F');
$sql = "INSERT INTO tb_order(m_no,o_time,o_status,o_shipping_name,o_shipping_surname,o_shipping_address,o_shipping_phone,o_total_price,datemonth) 
        VALUES ('".$_SESSION['m_no']."','$timestamp','$status','$shipping_name','$shipping_surname','$shipping_address','$shipping_phone','".$_SESSION['total']."','$month')";
mysqli_query($conn,$sql);
$order_id = mysqli_insert_id($conn);
$_SESSION["order_id"] = $order_id;

for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
        if(($_SESSION["strProductID"][$i]) != "")
            {
                $sql1 ="SELECT * 
                FROM tb_product 
                WHERE p_no = '".$_SESSION["strProductID"][$i]."'";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_array($result1);
                $p_price = $row1['p_price'];
                $sumprice = $_SESSION["strQty"][$i]*$p_price;
                
                $sql2 = "INSERT INTO tb_order_product(o_id,p_no,p_price,quantity,sum_price)
                        VALUES ('$order_id','".$_SESSION["strProductID"][$i]."','$p_price','".$_SESSION["strQty"][$i]."','$sumprice')";
                if(mysqli_query($conn,$sql2)){
                    echo "<script>alert('Order Success')</script>";
                    echo "<script>window.location='shop.php'</script>"; 
                }
            }
    }
    mysqli_close($conn);
    unset($_SESSION["intLine"]);
    unset($_SESSION["strProductID"]);
    unset($_SESSION["strQty"]);
    unset($_SESSION["total"]);