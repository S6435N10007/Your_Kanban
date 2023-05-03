<?php
    session_start();
    include 'includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Koban</title>
        <link rel="icon" href="../images/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
            <?php
            include 'includes/menu.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Order Data(CANCELED)
                            </div>
                            <div>
                                <br>
                                <a href="order_report_new.php"><button type="button" class="btn btn-outline-warning">New</button></a>
                                <a href="order_report_shipping.php"><button type="button" class="btn btn-outline-primary">Shipping</button></a>
                                <a href="order_report_canceled.php"><button type="button" class="btn btn-outline-danger active">Canceled</button></a>
                                <a href="order_report_completed.php"><button type="button" class="btn btn-outline-success">Completed</button></a>
                            </div>
                            <br>
                            <div>
                                <form name="form1" method="POST" action="order_report_canceled.php">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="date" name="date1" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="date" name="date2" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Shipping Address</th>
                                            <th>Tel</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>o_id</th>
                                            <th>o_shipping_name</th>
                                            <th>o_shipping_address</th>
                                            <th>o_shipping_phone</th>
                                            <th>o_total_price</th>
                                            <th>o_time</th>
                                            <th>o_status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $date1 = @$_POST['date1'];
                                        $date2 = @$_POST['date2'];
                                        if($date1 != "" && $date2 != ""){
                                            echo "Search from $date1 to $date2";
                                            $sql = "SELECT * 
                                                    FROM tb_order
                                                    INNER JOIN tb_order_status ON tb_order.o_status = tb_order_status.order_status_id
                                                    WHERE o_status = '3' AND o_time BETWEEN '$date1' AND '$date2'
                                                    ORDER BY o_time DESC";
                                        }else{
                                            $sql = "SELECT * 
                                                    FROM tb_order
                                                    INNER JOIN tb_order_status ON tb_order.o_status = tb_order_status.order_status_id
                                                    WHERE o_status = '3'
                                                    ORDER BY o_time DESC";
                                        }
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['o_id']; ?></td>
                                            <td><?php echo $row['o_shipping_name']; ?></td>
                                            <td><?php echo $row['o_shipping_address']; ?></td>
                                            <td><?php echo $row['o_shipping_phone']; ?></td>
                                            <td><?php echo $row['o_total_price']; ?></td>
                                            <td><?php echo $row['o_time']; ?></td>
                                            <td>
                                                <b style='color:grey'><?php echo $row['order_status']; ?></b>
                                            </td>
                                            <td>
                                            <a href="order_detail_report.php?id=<?php echo $row['o_id']; ?>" class="btn btn-light">Detail</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php
                include 'includes/footer.php';
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
