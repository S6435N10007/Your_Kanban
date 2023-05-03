<?php
    include('includes/header.php');
?>

<!--login form-->
        <form class="form-horizontal" role="form" name="form1" method="POST" action="check_login.php">
            <h3><b>Login Form</b></h3>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">E-mail</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                <?php 
                if (isset($_SESSION['login_error'])) { 
                    echo "<div class='text-danger text-center'>";
                    echo $_SESSION['login_error'];
                    echo "</div>";
                }
                ?>
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
                <div class="text-center">
                    <h>Don't have any account? <a href="register.php">Register Here</a></h>
                </div>
            
        </form>
<!--login form-->

<?php 
    include("includes/footer.php");
?>
