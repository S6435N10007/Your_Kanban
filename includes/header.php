<?php
    include('connect.php');
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Your Kanban</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <!-- Header Top Section Begin -->
        <section class="header-top-section">
            <div class="container">
                <div class="row">
                    <div  class="col-md-6">
                        <div class="header-top-content" bg-info>
                            <ul class="nav nav-pills navbar-left">
                                <!-- ตรวจสอบว่ามี session อยู่หรือไม่ (user login อยู่หรือไม่)-->
                                <?php
                                if (isset($_SESSION['m_no'])) {
                                    $UserSQL = "SELECT * 
                                    FROM `tb_member`
                                    WHERE `m_no` = '".$_SESSION['m_no']."'";
                                    $Userresult = mysqli_query($conn,$UserSQL);
                                    while($row = mysqli_fetch_array($Userresult))
                                    {
                                    ?>
                                    <li><a href="my_account.php"><i class="pe-7s-person"></i><span><?php echo $row['m_name'];?></span></a></li>
                                    <li><a href="my_account.php"><i ></i><span><?php echo $row['m_surname'];?></span></a></li>
                            </ul>
                        </div>
                    </div>        
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <li><a href="my_account.php">My Account</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="order_history.php">Order</a></li>
                                <li><a href="logout.php"><i class="pe-7s-unlock"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>               
                                    
                    <?php 
                        }
                    }
                    else {
                    ?>
                            </ul>
                        </div>
                    </div>        
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <li><a href="register.php"><i class="pe-7s-lock"></i>Register</a></li>
                                <li><a href="login.php"><i class="pe-7s-user"></i>Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                                
                            
                    
                </div>
            </div>
        </section>
        <!-- Header Top Section End -->

        <!--Navbar Section Begin-->
        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php?page=1"><b>Y</b>our <b>K</b>anban</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php?page=1">shop</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>
        <!--Navbar Section End-->