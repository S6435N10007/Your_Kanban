<?php
    include('includes/header.php');
    include('includes/connect.php');
?>
    <section>
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" action="change_account_detail.php">
                <h3><b>My Account</b></h3>
                <?php
                    $sql = "SELECT *
                            FROM tb_member
                            WHERE m_no = '".$_SESSION['m_no']."'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" value="<?php echo $row['m_email']; ?>" class="form-control"  disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $row['m_name']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Surname</label>
                    <div class="col-sm-9">
                        <input type="text" id="surname" name="surname" placeholder="Surname" value="<?php echo $row['m_surname']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" value="female" name="gender" <?=$row['m_gender']=="female" ? "checked" : ""?> required>Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" value="male" name="gender" <?=$row['m_gender']=="male" ? "checked" : ""?>>Male
                                </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="number" oninput="maxLengthCheck(this)" maxLength="10" max="9999999999" id="phone" name="phone" placeholder="Phone" value="<?php echo $row['m_tel']; ?>" class="form-control" min="10" max="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea row="5" id="address" name="address" placeholder="Address" class="form-control" required><?php echo $row['m_address']; ?></textarea>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">Change Detail</button>
                    </div>
                </div>
            </form> <!-- /form -->
            <form class="form-horizontal" role="form" method="POST" action="change_password_form.php">
                <div class="form-group"">
                        <div class="col-sm-9 col-sm-offset-3">
                            <h6 class="text-center">Or</h6>
                                <button class="btn btn-secondary btn-block">Change Password</button>
                        </div>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
    </section>
<script>
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
<?php 
    include("includes/footer.php");
?>
