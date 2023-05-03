<?php
    include('includes/header.php');
    include('includes/carousel.php');
?>

        <!--Pagination Begin-->
        <?php
        $search = "";
        $category = "";
        $search = @$_GET['search'];
        $category = @$_GET['category'];
        if($search != "")
        {
            $SQL = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            WHERE p.p_name LIKE '%".$search."%'";
        }
        elseif($category == "all")
        {
            $SQL = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id";
        }
        elseif($category != "")
        {
            $SQL = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            WHERE c.cat_name = '".$category."'";
        }
        else
        {
            $SQL = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id";
        }
        // $SQL = "SELECT p.* , c.cat_name
        // FROM `tb_product` p
        // INNER JOIN tb_category c ON p.cat_id = c.cat_id";
        $result = mysqli_query($conn,$SQL);
        //Pagination
        $resultperpage = 20;
        $number_of_result = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_result/$resultperpage);
        if(!isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            $page = $_GET['page'];
        }
        $this_page_first_result = ($page-1)*$resultperpage;
        if($search != "")
        {
            $SQL1 = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            WHERE p.p_name LIKE '%".$search."%'
            LIMIT " . $this_page_first_result . ',' . $resultperpage;
        }
        elseif($category == "all")
        {
            $SQL1 = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            LIMIT " . $this_page_first_result . ',' . $resultperpage;
        }
        elseif($category != "")
        {
            $SQL1 = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            WHERE c.cat_name = '".$category."'
            LIMIT " . $this_page_first_result . ',' . $resultperpage;
        }
        else
        {
            $SQL1 = "SELECT p.* , c.cat_name
            FROM `tb_product` p
            INNER JOIN tb_category c ON p.cat_id = c.cat_id
            LIMIT " . $this_page_first_result . ',' . $resultperpage;
        }
        // $SQL1 = "SELECT p.* , c.cat_name
        //     FROM `tb_product` p
        //     INNER JOIN tb_category c ON p.cat_id = c.cat_id
        //     LIMIT " . $this_page_first_result . ',' . $resultperpage;
        $result1 = mysqli_query($conn,$SQL1);
        ?>
        <!--Pagination End-->

        <!--Product section begin-->
        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><!--Title Begin-->
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>FEATURED PRODUCTS</h1>
                        </div>
                    </div><!--Title End-->
                </div>
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated" method="GET" action=""><!--Search Begin-->
                            <div class="form-group">
                                <input type="text" class="form-control subscribe" name="search" id="search" placeholder="Search..." value="<?php echo $search ;?>">
                                <button class="suscribe-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!--Search End-->
                    </div>
                </div>
                <div class="row"><!--Filter Begin-->
                    <div class="col-md-12">
                        <div class="text-center">
                        <form class="category-form" method="GET" action="">
                            <div class="row">
                            <input type="submit" class="button" name="category" id="category" value="all">
                            <?php
                            $SQLC = "SELECT *
                            FROM tb_category";
                            $resultC = mysqli_query($conn,$SQLC);
                            while($rowC = mysqli_fetch_array($resultC))
                            {
                                ?>
                                <input type="submit" class="button" name="category" id="category" value="<?php echo $rowC['cat_name'];?>">
                                <?php
                                
                            }
                            ?>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!--Filter End-->
                
                <div class="row featured isotope">
                    <!--PHP Show Product Begin-->    
                    <?php
                    while($row = mysqli_fetch_array($result1))
                    {
                    //ข้อมูลมาแสดงผล
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 <?php echo $row['cat_id'];?> featured-items isotope-item">
                        <a href="product.php?id=<?php echo $row['p_no'];?>&cat_id=<?php echo $row['cat_id'];?>&page=1">
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
                    ?>
                    <!--PHP Show Product End-->
                </div>
            </div>
        </section>
        <!--Product section end-->

        <!--Navbar Pagination Center Begin-->
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="shop.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php 

                for($page=1; $page<=$number_of_page; $page++){ 
                ?>
                <li class="<?php if($page==$_GET['page']) {echo 'active'; } ?>">
                    <a href="shop.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
                <?php 
                }   
                ?>
                <li>
                    <a href="shop.php?page=<?php echo $number_of_page;?>" aria-label="Next">
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