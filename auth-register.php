<?php
include "include/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "include/link.php" ?>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              GEMT
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="auth-register.php">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="fname" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="lname" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm" required>
                    </div>
                  </div>

                  <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select class="form-control select2" name="country" required>
                        <option value="">Please select here</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="DRC">DRC</option>
                        <option value="Kenya">Kenya</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Type</label>
                      <select class="form-control select2" name="type" required>
                      <option value="">Please select here</option>
                        <option values="business">Business</option>
                        <option values="personal">Personal</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-6">
                      <label>Sex</label>
                      <select class="form-control select2" name="sex" required>
                      <option value="">Please select here</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="notprefer">Not Prefer</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control" name="code" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="btn" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              i have an account? <a href="auth-login.php">Login</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; IshChristian 2024
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <?php
  if(isset($_POST['btn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['password_confirm'];
    $cont = $_POST['country'];
    $type = $_POST['type'];
    $sex = $_POST['sex'];
    $code = $_POST['code'];
    if($pass != $cpass){
      echo "<script>alert('Password not equal'); return;</script>";
    }
    $sql = mysqli_query($con, "INSERT INTO user (fname,lname,email,password,passwordconf,country,type,sex) VALUES ('$fname','$lname','$email','$pass','$cpass','$cont','$type','$sex')");
    if($sql){
      $_SESSION['user'] = $_POST['lname'];
      echo "<script>window.location='auth-login.php'</script>";
    }else{
      echo "<script>alert('DATA NOT SAVED, PLEASE TRY AGAIN')</script>";
    }
  }

  ?>
</body>
</html>