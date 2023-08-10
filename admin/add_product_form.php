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
                                Add Product
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form class="form-horizontal" role="form" method="POST" action="add_product.php" enctype="multipart/form-data">
                                    
                                        <div class="form-group mb-3">
                                            <label for="productname" class="col-sm-3 control-label">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" name="name" placeholder="Product Name" class="form-control" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="productname" class="col-sm-3 control-label">Product Type</label>
                                            <div class="col-sm-9">
                                                <select name="protype" required>
                                                    <option value="1">Face</option>
                                                    <option value="2">Lip</option>
                                                    <option value="3">Eye</option>
                                                    <option value="4">beauty accessories</option>
                                                    <option value="5">Nail</option>
                                                    <option value="6">fragrance</option>
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="detail" class="col-sm-3 control-label">Detail</label>
                                            <div class="col-sm-9">
                                                <textarea row="5" id="detail" name="detail" placeholder="Detail" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Price" class="col-sm-3 control-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="number" id="price" name="price" placeholder="price" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pictureMain" class="col-sm-3 control-label">Picture(Main)</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="picmain" name="picmain" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="picture2" class="col-sm-3 control-label">Picture(2)</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="pic2" name="pic2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="picture3" class="col-sm-3 control-label">Picture(3)</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="pic3" name="pic3" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                                                    <button type="reset" class="btn btn-danger btn-block">Cancel</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

