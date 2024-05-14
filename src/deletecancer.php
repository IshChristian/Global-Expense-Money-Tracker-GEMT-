<?php
include "../config/connection.php";
include "../routers/routers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "../routers/link.php" ?>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "../include/header.php" ?>
      <div class="main-sidebar sidebar-style-2">
        <?php include "../include/menu.php" ?>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Expense</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="deletecancer.php?table=<?php echo $_GET['table'] ?>&where=<?php echo $_GET['where'] ?>&location=<?php echo $_GET['location'] ?>" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Are you sure do you want to delete</h4>
                    </div>
                    <div class="card-body">
                    <div class="card-footer text-right">
                      <button type="submit" name="cbtn" class="btn btn-primary">Cancer</button>
                      <button type="submit" name="dbtn" class="btn btn-danger">Delete</button>
                    </div>
                    </div>
                  </form>
                  </div>
                
              </div>
              
            </div>
          <div class="section-body">
          </div>
        </section>
      </div>
      <?php
      if(isset($_POST['cbtn'])){
        $location = $_GET['location'];
        echo "<script>window.location='$location'</script>";
      }else if(isset($_POST['dbtn'])){
        $table = $_GET['table'];
        $location = $_GET['location'];
        $where = $_GET['where'];
        $sql = mysqli_query($con, "DELETE FROM $table WHERE $where");
        echo "<script>window.location='$location'</script>";
      }
      
      ?>
</body>
</html>