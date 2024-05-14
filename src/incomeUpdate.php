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
            <h1>Income</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="incomeUpdate.php?id=<?php echo $_GET['id'] ?>" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Update Income</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Income Name</label>
                        <input type="text" class="form-control" name="source" required="">
                        <div class="invalid-feedback">
                          What's your income come from?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" required="">
                        <div class="invalid-feedback">
                          What's your amount ?
                        </div>
                      </div>
                
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  </div>
                
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>View Income</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Amount</th>
                          <th>Created At</th>
                        </tr>
                          <?php
                          $inid=$_GET['id'];
                          $sql = mysqli_query($con, "SELECT * FROM income WHERE user='$uid' AND in_id=$inid");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                  <td>IC<?php echo $result['in_id'] ?></td>
                                  <td><?php echo $result['source'] ?></td>
                                  <td><div class="badge badge-success"><?php echo $result['amount'] ?></div></td>
                                  <td><?php echo $result['date'] ?></td>
                                </tr>
                             <?php
                            }
                          }else{
                            echo "<h5>EMPTY</h5>";
                          }
                          ?>

                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          <div class="section-body">
          </div>
        </section>
      </div>
      <!-- Footer -->
      <?php include "../include/footer.php" ?> 
      <?php
      if(isset($_POST['btn'])){
        $src = $_POST['source'];
        $amnt = $_POST['amount'];

        $sql = mysqli_query($con, "UPDATE income SET source='$src',amount='$amnt' WHERE user='$uid' AND in_id='$inid'");
        if($sql){
          echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
          echo "<script>window.location='income.php'</script>";
        }
      }
      ?>
</body>
</html>