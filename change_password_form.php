<?php
    include('includes/header.php');
    include('includes/connect.php');
    
?>
    <section>
        <div class="container">
            <form class="form-horizontal" id="change_password_form" name="change_password_form" role="form" method="POST" action="change_password.php" onsubmit="return check()">
                <h3><b>Change Password</b></h3>
                <?php
                    $sql = "SELECT *
                            FROM tb_member
                            WHERE m_no = '".$_SESSION['m_no']."'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control" focus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="newpassword" name="newpassword" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required>
                    </div>
                </div>

                <?php
                    }
                ?>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                    </div>
                </div>
            </form> <!-- /form -->
            
        </div> <!-- ./container -->
    </section>
    
<?php 
    include("includes/footer.php");
?>
<script>
    function check(){
        if(document.change_password_form.newpassword.value != document.change_password_form.confirmpassword.value){
        alert('Password do not match');
        document.change_password_form.confirmpassword.focus();    
        return false;
        }
        return true;
        }
</script>