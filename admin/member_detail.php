<?php
    session_start();
    include 'includes/connect.php';
    $id = $_GET['id'];
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
                                Member Details
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form class="form-horizontal" role="form" method="POST" action="update_member.php">
                                        <?php
                                        $sql = "SELECT *
                                                FROM tb_member 
                                                WHERE m_no = '$id'";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <div class="form-group mb-3">
                                            <label for="productname" class="col-sm-3 control-label">Member ID</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="id" name="id" class="form-control" value="<?php echo $row['m_no']; ?>" disabled>
                                                <input hidden name="id" value="<?php echo $row['m_no']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row['m_email']; ?>"  autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-3">Permission</label>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="userRadio" value="user" name="permission" required <?=$row['m_status'] == 'user' ? ' checked="checked"' : '';?>>User
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="adminRadio" value="admin" name="permission" <?=$row['m_status'] == 'admin' ? ' checked="checked"' : '';?>>Admin
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Name" class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?php echo $row['m_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Surname" class="col-sm-3 control-label">Surname</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control" value="<?php echo $row['m_surname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label col-sm-3">Gender</label>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="femaleRadio" value="female" name="gender" required <?=$row['m_gender'] == 'female' ? ' checked="checked"' : '';?>>Female
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="maleRadio" value="male" name="gender" <?=$row['m_gender'] == 'male' ? ' checked="checked"' : '';?>>Male
                                                        </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Phone" class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="number" oninput="maxLengthCheck(this)" maxLength="10" max="9999999999" id="phone" name="phone" placeholder="Phone" class="form-control" min="10" max="10" value="<?php echo $row['m_tel']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Address" class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea row="5" id="address" name="address" placeholder="Address" class="form-control" required><?php echo $row['m_address']; ?></textarea>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-group text-center">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary btn-block">Change</button>
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
<script>
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>    
        </body>
</html>


