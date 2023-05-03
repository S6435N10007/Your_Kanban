<?php
    include('includes/header.php');
?>

        <!--PHP Show Product Begin-->    
        <?php
        $id = $_GET['id'];
        $cat_id = $_GET['cat_id'];
        //SQL For Product Details
        $SQL = "SELECT *
                FROM `tb_product` 
                WHERE `p_no` = $id";
        $result = mysqli_query($conn,$SQL);  
        while($row = mysqli_fetch_array($result))
        {
        //ข้อมูลมาแสดงผล
        ?>
        <!--Product Detail Begin-->
        <section>
            <div class="container">
                <div class="card">
                    <div class="container-fliud">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="admin/product_image/<?php echo $row['p_pic_main'];?>" /></div>
                                <div class="tab-pane" id="pic-2"><img src="admin/product_image/<?php echo $row['p_pic_2'];?>" /></div>
                                <div class="tab-pane" id="pic-3"><img src="admin/product_image/<?php echo $row['p_pic_3'];?>" /></div>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="admin/product_image/<?php echo $row['p_pic_main'];?>" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="admin/product_image/<?php echo $row['p_pic_2'];?>" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img src="admin/product_image/<?php echo $row['p_pic_3'];?>" /></a></li>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h1><?php echo $row['p_name'];?></h1>
                                <h4 class="price">current price: <span><?php echo $row['p_price'];?> ฿</span></h4>
                                <p class="product-description"><?php echo $row['p_detail'];?></p>
                                <div class="action">
                                    <?php
                                    //ถ้า login อยู่ ให้เพิ่มสินค้าลงตะกร้าได้
                                    if (isset($_SESSION['m_no'])) {
                                    ?>
                                    <a href="order.php?id=<?php echo $row['p_no'];?>"><button class="add-to-cart btn btn-default" type="button">Add to cart</button></a>
                                    <?php
                                    }
                                    //ถ้าไม่ได้ login อยู่ ให้ไปที่หน้า login
                                    else
                                    {
                                    ?>
                                    <a href="login.php"><button class="add-to-cart btn btn-default" type="button">Add to cart</button></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	        </div>
        <section>
        <!--Product Detail End-->
        <?php
        }
        ?>
        <!--Product Detail End-->

        <!--Relative Product begin-->
        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><!--Title Begin-->
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>RELATIVE PRODUCTS</h1>
                        </div>
                    </div><!--Title End-->
                </div>
                <div class="row featured isotope">
                    <!--PHP Show Relative Product Begin-->    
                    <?php
                    //SQL Relative Product
                    $RPSQL = "SELECT *
                    FROM `tb_product` 
                    WHERE cat_id = $cat_id AND p_no != $id";
                    $RPresult = mysqli_query($conn,$RPSQL); 
                    //Pagination
                    $resultperpage = 4;
                    $number_of_result = mysqli_num_rows($RPresult);
                    $number_of_page = ceil($number_of_result/$resultperpage);
                    if(!isset($_GET['page']))
                    {
                        $page = 1;
                    }
                    else
                    {
                        $page = $_GET['page'];
                    }
                    //SQL select For Pagination
                    $this_page_first_result = ($page-1)*$resultperpage;
                    $RPSQL = "SELECT *
                            FROM `tb_product` 
                            WHERE cat_id = $cat_id AND p_no != $id
                            LIMIT " . $this_page_first_result . ',' . $resultperpage;
                    //SQL show Relative Product in page
                    $RPresult = mysqli_query($conn,$RPSQL); 
                    while($row = mysqli_fetch_array($RPresult))
                    {
                    ?>
                    <!--Pagination End-->
                    <div class="col-md-3 col-sm-6 col-xs-12 featured-items isotope-item">
                        <a href="product.php?id=<?php echo $row['p_no'];?>&cat_id=<?php echo $row['cat_id'];?>&page=1">
                            <div class="product-item"><!--Product Begin-->
                                <img src="admin/product_image/<?php echo $row['p_pic_main'];?>" class="img-responsive" width="255" height="322" alt="">
                                <div class="product-title">
                                        <h3><?php echo $row['p_name'];?></h3>
                                        <span><?php echo $row['p_price'];?></span>
                                </div>
                            </div><!--Product End-->
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                    <!--PHP Show Product End-->
                </div>
            </div>
        </section>
        <!--Relative Product end-->

        <!--Navbar Pagination Center Begin-->
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="product.php?id=<?php echo $id ?>&cat_id=<?php echo $cat_id ?>&page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php 

                for($page=1; $page<=$number_of_page; $page++){ 
                ?>
                <li class="<?php if($page==$_GET['page']) {echo 'active'; } ?>">
                    <a href="product.php?id=<?php echo $id ?>&cat_id=<?php echo $cat_id?>&page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
                <?php 
                }
                ?>
                <li>
                    <a href="product.php?id=<?php echo $id ?>&cat_id=<?php echo $cat_id?>&page=<?php echo $number_of_page;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
            </div>
        </nav>
        <!--Navbar Pagination End-->

        <!--Banner Begin-->
        <section class="offer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 wow fadeInDown animated ">
                        <h1>END OF SEASON SALE</h1>
                        <h2>Up to 35% off Women's Denim</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--Banner End-->
        
        <!--Partner section begin-->
        <section class="client-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>our partner</h1>
                        </div>
                    </div>
                </div>
                <div id="client" class="row owl-carousel owl-theme client-area">
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_01.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_02.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_03.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_04.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_01.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_02.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_03.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 item">
                        <a href="#">
                            <img src="images/client_04.jpg" class="img-responsive" width="300" height="200" alt="">
                        </a>
                    </div>
                </div>
                <div class="customNavigation works-navigation">
                    <a class="btn-work works-prev"><i class="pe-7s-angle-left"></i></a>
                    <a class="btn-work works-next"><i class="pe-7s-angle-right"></i></a>
                </div><!-- end of /.client navigation -->
            </div>
        </section>
        <!--Partner section end-->

<?php 
    include("includes/footer.php");
    mysqli_close($conn);
?>
