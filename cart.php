<?php
    include('includes/header.php');
?>

        <section class="vh-100" style="background-color: #ffffff;">
            <div class="container padding-bottom-3x mb-1">
                <form id="form1" method="POST" action="insert_cart.php"><!--Form Start-->
                <div class="col-md-12"><!--Title Begin-->
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>Cart</h1>
                    </div>
                </div><!--Title End-->
                <!-- Alert-->
                <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><img class="d-inline align-center" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAzIDUxMi4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDMgNTEyLjAwMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMjU2LjAwMSw2NGMtNzAuNTkyLDAtMTI4LDU3LjQwOC0xMjgsMTI4czU3LjQwOCwxMjgsMTI4LDEyOHMxMjgtNTcuNDA4LDEyOC0xMjhTMzI2LjU5Myw2NCwyNTYuMDAxLDY0eiAgICAgIE0yNTYuMDAxLDI5OC42NjdjLTU4LjgxNiwwLTEwNi42NjctNDcuODUxLTEwNi42NjctMTA2LjY2N1MxOTcuMTg1LDg1LjMzMywyNTYuMDAxLDg1LjMzM1MzNjIuNjY4LDEzMy4xODQsMzYyLjY2OCwxOTIgICAgIFMzMTQuODE3LDI5OC42NjcsMjU2LjAwMSwyOTguNjY3eiIgZmlsbD0iIzUwYzZlOSIvPgoJCQk8cGF0aCBkPSJNMzg1LjY0NCwzMzMuMjA1YzM4LjIyOS0zNS4xMzYsNjIuMzU3LTg1LjMzMyw2Mi4zNTctMTQxLjIwNWMwLTEwNS44NTYtODYuMTIzLTE5Mi0xOTItMTkycy0xOTIsODYuMTQ0LTE5MiwxOTIgICAgIGMwLDU1Ljg1MSwyNC4xMjgsMTA2LjA2OSw2Mi4zMzYsMTQxLjE4NEw2NC42ODQsNDk3LjZjLTEuNTM2LDQuMTE3LTAuNDA1LDguNzI1LDIuODM3LDExLjY2OSAgICAgYzIuMDI3LDEuNzkyLDQuNTY1LDIuNzMxLDcuMTQ3LDIuNzMxYzEuNjIxLDAsMy4yNDMtMC4zNjMsNC43NzktMS4xMDlsNzkuNzg3LTM5Ljg5M2w1OC44NTksMzkuMjMyICAgICBjMi42ODgsMS43OTIsNi4xMDEsMi4yNCw5LjE5NSwxLjI4YzMuMDkzLTEuMDAzLDUuNTY4LTMuMzQ5LDYuNjk5LTYuNGwyMy4yOTYtNjIuMTQ0bDIwLjU4Nyw2MS43MzkgICAgIGMxLjA2NywzLjE1NywzLjU0MSw1LjYzMiw2LjY3Nyw2LjcyYzMuMTM2LDEuMDY3LDYuNTkyLDAuNjQsOS4zNjUtMS4yMTZsNTguODU5LTM5LjIzMmw3OS43ODcsMzkuODkzICAgICBjMS41MzYsMC43NjgsMy4xNTcsMS4xMzEsNC43NzksMS4xMzFjMi41ODEsMCw1LjEyLTAuOTM5LDcuMTI1LTIuNzUyYzMuMjY0LTIuOTIzLDQuMzczLTcuNTUyLDIuODM3LTExLjY2OUwzODUuNjQ0LDMzMy4yMDV6ICAgICAgTTI0Ni4wMTcsNDEyLjI2N2wtMjcuMjg1LDcyLjc0N2wtNTIuODIxLTM1LjJjLTMuMi0yLjExMi03LjMxNy0yLjM4OS0xMC42ODgtMC42NjFMOTQuMTg4LDQ3OS42OGw0OS41NzktMTMyLjIyNCAgICAgYzI2Ljg1OSwxOS40MzUsNTguNzk1LDMyLjIxMyw5My41NDcsMzUuNjA1TDI0Ni43LDQxMS4yQzI0Ni40ODcsNDExLjU2MywyNDYuMTY3LDQxMS44NCwyNDYuMDE3LDQxMi4yNjd6IE0yNTYuMDAxLDM2Mi42NjcgICAgIEMxNjEuOSwzNjIuNjY3LDg1LjMzNSwyODYuMTAxLDg1LjMzNSwxOTJTMTYxLjksMjEuMzMzLDI1Ni4wMDEsMjEuMzMzUzQyNi42NjgsOTcuODk5LDQyNi42NjgsMTkyICAgICBTMzUwLjEwMywzNjIuNjY3LDI1Ni4wMDEsMzYyLjY2N3ogTTM1Ni43NTksNDQ5LjEzMWMtMy40MTMtMS43MjgtNy41MDktMS40NzItMTAuNjg4LDAuNjYxbC01Mi4zNzMsMzQuOTIzbC0zMy42NDMtMTAwLjkyOCAgICAgYzQwLjM0MS0wLjg1Myw3Ny41ODktMTQuMTg3LDEwOC4xNi0zNi4zMzFsNDkuNTc5LDEzMi4yMDNMMzU2Ljc1OSw0NDkuMTMxeiIgZmlsbD0iIzUwYzZlOSIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" width="18" height="18" alt="Medal icon">&nbsp;&nbsp;With this purchase you will earn <strong>290</strong> Reward Points.</div>
                    <!-- Shopping Cart-->
                    <div class="table-responsive shopping-cart">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Price per item</th> 
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Add-Reduce</th>
                                    <th class="text-center">Delete</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $quantity = 0;
                                    $sumprice = 0;
                                    $total = 0;
                                    if(!isset($_SESSION["intLine"]))   //ถ้าบรรทัด ไม่ได้เก็บค่า (ถ้ามาจากหน้าอื่นโดยที่ไม่มีสินค้าในตะกร้า จะไม่ขึ้น error)
                                    {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                                <h3>ไม่มีสินค้าในตะกร้า</h3>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    else
                                    {
                                        for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                                        {
                                            if(($_SESSION["strProductID"][$i]) != "")
                                            {
                                                $SQL1 = "SELECT * 
                                                        FROM tb_product 
                                                        WHERE p_no = '".$_SESSION["strProductID"][$i]."'";
                                                $result1 = mysqli_query($conn,$SQL1);
                                                $row_p = mysqli_fetch_array($result1);
                                                $_SESSION["price"] = $row_p['p_price'];
                                                $quantity = $_SESSION["strQty"][$i] ;
                                                $sumprice = $quantity * $row_p['p_price'];
                                                $total = $total + $sumprice;
                                                $_SESSION["total"] = $total;
                                            
                                    ?> 
                                <!-- cart item-->
                                <tr>
                                    <td>
                                        <div class="product-item">
                                            <a class="product-thumb" href="product.php?id=<?php echo $row_p['p_no'];?>&cat_id=<?php echo $row_p['cat_id'];?>"><img src="admin/product_image/<?php echo $row_p['p_pic_main'];?>" alt="Product"></a>
                                            <div class="product-info">
                                                <h4 class="cart-product-title"><a href="product.php?id=<?php echo $row_p['p_no'];?>&cat_id=<?php echo $row_p['cat_id'];?>"><?php echo $row_p['p_name'];?></a></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center text-lg text-medium"><?php echo $row_p['p_price'];?></td>
                                    <td class="text-center text-lg text-medium"><?php echo $quantity;?></td>
                                    <td class="text-center text-lg text-medium"><?php echo $sumprice;?></td>
                                    <td class="text-center text-lg text-medium">
                                        <a href="order.php?id=<?php echo $row_p['p_no'];?>">+</a>
                                        <?php
                                            if($_SESSION["strQty"][$i]>1)
                                            {
                                        ?>
                                        <a href="order_reduce.php?id=<?php echo $row_p['p_no'];?>">-</a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center"><a class="remove-from-cart" href="pro_delete.php?Line=<?php echo $i;?>" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <!-- cart item-->
                                <?php
                                        }
                                    }
                                }
                                //format
                                $total = number_format($total,2);
                                ?>
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="shopping-cart-footer">
                        <div class="column text-lg"><h1>Total: <span class="text-medium"><?php echo $total;?></span></h1></div>
                    </div>
                    <div class="row">
                        <div style="col-md-4">
                        <div class="alert alert-success" h4 role="alert">
                            Shipping Address
                        </div>
                        <?php
                        $sqlShipping = "SELECT * 
                                        FROM tb_member 
                                        WHERE m_no = '".$_SESSION['m_no']."'";
                        $result = mysqli_query($conn,$sqlShipping); 
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        Name :
                        <input type="text" name="shipping_name" class="form-control" required placeholder="ชื่อ ..." VALUE="<?php echo $row['m_name'];?>">
                        Surname :
                        <input type="text" name="shipping_surname" class="form-control" required placeholder="นามสกุล ..." VALUE="<?php echo $row['m_surname'];?>">
                        Shipping Address :
                        <textarea name="shipping_address" class="form-control" required placeholder="ที่อยู่ ..." row="3"><?php echo $row['m_address'];?></textarea>
                        Phone :
                        <input type="number" name="shipping_phone" class="form-control" required placeholder="เบอร์โทร ..." VALUE="<?php echo $row['m_tel'];?>">
                        
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                        <!-- Payment -->
                        <div class="alert alert-success mt-3" h4 role="alert">
                            Payment
                        </div>
                        <!-- <form> -->
                            <div class="row">
                                <input type="radio" name="payment" id="credit" value="credit" checked/>
                                <label for="credit">Credit Card</label>
                                <input type="radio" name="payment" id="debit" value="debit"/>
                                <label for="debit">Debit Card</label>
                                <input type="radio" name="payment" id="paypal" value="paypal"/>
                                <label for="paypal">PayPal</label>
                            </div>
                        <!-- </form> -->
                         Name on card:
                        <input type="text" name="card_name" class="form-control"  placeholder="Name" VALUE="">
                        Card number :
                        <input type="number" name="card_number" class="form-control"  placeholder="1111 2222 3333 4444" VALUE="">
                        Expiration :
                        <input type="text" name="card_expiration" class="form-control"  placeholder="MM/YY" VALUE="">
                        Cvv :
                        <input type="number"name="card_cvv" class="form-control"  placeholder="111" VALUE="">
                        
                        </div>
                    </div>
                        <div class="shopping-cart-footer">
                        <div class="column">
                            <a class="btn btn-outline-secondary" href="shop.php"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a>
                        </div>
                        <div class="column">
                            <button type="submit "class="btn btn-success">Checkout</button>
                        </div>
                </div>
                </form><!-- End Form -->
            </div>
         </section>

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>GET IN TOUCH</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><span>M</span>art</h1>
                            <h3>We'd love To Meet You In Person Or Via The Web!</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p><b>Main Office:</b> 123 Elm St. New York City, NY</p>
                                <p><b>Phone:</b> 1.555.555.5555</p>
                                <p><b>Email:</b> info@yourdomain.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Website URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php 
    include("includes/footer.php");
?>
