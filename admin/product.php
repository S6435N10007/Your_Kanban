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
        <title>Your Kanban</title>
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
                                Product Data
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Picture</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Detail</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>p_no</th>
                                            <th>p_pic_main</th>
                                            <th>p_name</th>
                                            <th>p_type</th>
                                            <th>p_price</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT p.* , c.cat_name
                                                FROM `tb_product` p
                                                INNER JOIN tb_category c 
                                                ON p.cat_id = c.cat_id
                                                ORDER BY p_no ASC";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['p_no']; ?></td>
                                            <td><img src="product_image/<?php echo $row['p_pic_main'];?>" class="img-responsive" height="100" alt=""></td>
                                            <td><?php echo $row['p_name']; ?></td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td><?php echo $row['p_price']; ?></td>
                                            <td>
                                            <a href="product_detail.php?id=<?php echo $row['p_no']; ?>" class="btn btn-light">Detail</a>
                                            </td>
                                            <td>
                                            <a href="remove_product.php?id=<?php echo $row['p_no']; ?>" class="btn btn-danger" onclick = "removeProduct(this.href); return false;">Remove</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        mysqli_close($conn);
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
<script>
    function removeProduct(id){
    var r = confirm("Are you sure to remove this product?");
    if(r){
        window.location = mypage;
    }
}
</script>
