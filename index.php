<?php
    include('includes/header.php');
    include('includes/carousel.php');
?>

        <!--New Product Begin-->
        <section class="new-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>NEW PRODUCTS</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--PHP Show Product Begin-->    
                    <?php
                    $SQL = "SELECT *
                    FROM `tb_product`
                    WHERE p_no
                    BETWEEN (SELECT p_no-3
                          FROM tb_product
                          ORDER BY p_no DESC
                          LIMIT 1)
                    AND  (SELECT p_no
                          FROM tb_product
                          ORDER BY p_no DESC
                          LIMIT 1)";
                    $result = mysqli_query($conn,$SQL);
                    while($row = mysqli_fetch_array($result))
                    {
                    //ข้อมูลมาแสดงผล
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 <?php echo $row['cat_id'];?> featured-items isotope-item">
                        <a href="product.php?id=<?php echo $row['p_no'];?>&cat_id=<?php echo $row['cat_id'];?>">
                            <div class="product-item"><!--Product Begin-->
                                <img src="admin/product_image/<?php echo $row['p_pic_main'];?>" class="img-responsive" width="255" height="322" alt="">
                                <div class="product-title">
                                    
                                        <h3><?php echo $row['p_name'];?></h3>
                                        <span><?php echo $row['p_price'];?> ฿</span>
                                    
                                </div>
                            </div><!--Product End-->
                        </a>
                    </div>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                    <!--PHP Show Product End-->
                </div>
            </div>
        </section>
        <!--New Product End-->

        

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

       
<?php 
    include("includes/footer.php");
    
?>
