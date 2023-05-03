<?php
    session_start();
    include 'includes/connect.php';
    $id = @$_GET['id'];
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
                                Order Detail
                            </div>
                            <div>
                                <br>
                                <button type="button" class="btn btn-outline-secondary" onclick="history.go(-1);">Back</button>
                            </div>
                            <br>
                            <div class="card-body">
                                <h5>Order ID : <?php echo $id; ?></h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price Per Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * 
                                                FROM tb_order_product
                                                INNER JOIN tb_product 
                                                ON tb_order_product.p_no = tb_product.p_no
                                                INNER JOIN tb_order
                                                ON tb_order_product.o_id = tb_order.o_id
                                                WHERE tb_order_product.o_id = '$id'";
                                        $total = 0;
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $total =  $row['o_total_price'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['p_no']; ?></td>
                                            <td><?php echo $row['p_name']; ?></td>
                                            <td><?php echo $row['p_price']; ?></td>
                                            <td><?php echo $row['quantity']; ?></td>
                                            <td><?php echo $row['sum_price']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        mysqli_close($conn); 
                                        $total = number_format($total,2);
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                    
                                    <h5><b>ราคารวม : <?php echo $total; ?> บาท</b></h5>
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

