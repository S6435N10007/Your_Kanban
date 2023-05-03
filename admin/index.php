<?php
    session_start();
    include 'includes/connect.php';
    //New Order
    $sql1 = "SELECT COUNT(o_status) AS total_order 
            FROM tb_order
            WHERE o_status = '0'";
    $hand1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($hand1);
    //Shipping Order
    $sql2 = "SELECT COUNT(o_status) AS total_order 
            FROM tb_order
            WHERE o_status = '1'";
    $hand2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($hand2);
    //Complete Order
    $sql3 = "SELECT COUNT(o_status) AS total_order 
            FROM tb_order
            WHERE o_status = '2'";
    $hand3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($hand3);
    //Cancel Order
    $sql4 = "SELECT COUNT(o_status) AS total_order 
            FROM tb_order
            WHERE o_status = '3'";
    $hand4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_array($hand4);

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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Order (New)<h4>[<?php echo $row1['total_order']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order_report_new.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Order (Shipping)<h4>[<?php echo $row2['total_order']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order_report_shipping.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Order (Complete)<h4>[<?php echo $row3['total_order']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order_report_completed.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Order (Cancel)<h4>[<?php echo $row4['total_order']?>]</h4></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order_report_canceled.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Month Sales
                            </div>
                            <div class="card-body"><canvas id="graphCanvas1" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Category Sales
                            </div>
                            <div class="card-body"><canvas id="graphCanvas" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </main>
                
                <?php
                include 'includes/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>

    <script>
        $(document).ready(function () {
            showGraph();
        });

        //category sales
        function showGraph()
        {
            {
                $.post("data_category_sales.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].cat_name);
                        marks.push(data[i].Total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Category Sales',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            showGraph1();
        });
    
        // Month Sales
        function showGraph1()
        {
            {
                $.post("data_month_sales.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].datemonth);
                        marks.push(data[i].Total);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Month Sales',
                                backgroundColor: '#ee436e',
                                borderColor: '#ee436e',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
    </script>
    
