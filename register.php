<?php
    include('includes/header.php');
?>
    <section>
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" action="add_member.php">
                <h3><b>Registration Form</b></h3>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
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
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Surname</label>
                    <div class="col-sm-9">
                        <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">   
                                    <input type="radio" id="femaleRadio" value="female" name="gender" required>
                                    <label for="credit">Female</label>
                                    <input type="radio" id="maleRadio" value="male" name="gender">
                                    <label for="credit">Male</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="number" oninput="maxLengthCheck(this)" maxLength="10" max="9999999999" id="phone" name="phone" placeholder="Phone" class="form-control" min="10" max="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea row="5" id="address" name="address" placeholder="Address" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <button type="reset" class="btn btn-danger btn-block">Cancel</button>
                        
                    </div>
                </div>
                <div class="text-center">
                    <h>Already have an account? <a href="login.php">Login Here</a></h>
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
