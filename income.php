<?php
include "include/connection.php";
include "include/routers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "include/link.php" ?>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "include/header.php" ?>
      <div class="main-sidebar sidebar-style-2">
        <?php include "include/menu.php" ?>
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
                  <form action="income.php" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Add Income</h4>
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
                          $sql = mysqli_query($con, "SELECT * FROM income WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                  <td>IC<?php echo $result['in_id'] ?></td>
                                  <td><?php echo $result['source'] ?></td>
                                  <td><div class="badge badge-success"><?php echo $result['amount'] ?></div></td>
                                  <td><?php echo $result['date'] ?></td>
                                  <td><a href="incomeUpdate.php?id=<?php echo $result['in_id'] ?>" class="btn btn-primary">Update</a></td>
                                  <td><a href="delete.php?table=income&where=in_id=<?php echo $result['in_id'] ?>&location=income.php" class="btn btn-danger">Delete</a></td>
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
      <?php include "include/footer.php" ?> 
      <?php
      if(isset($_POST['btn'])){
        $src = $_POST['source'];
        $amnt = $_POST['amount'];
        $date =  date('y-m-d');

        $sql = mysqli_query($con, "INSERT INTO income (source,amount,date,user) VALUES ('$src','$amnt','$date','IshChristian')");
        if($sql){
          echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
          echo "<script>window.location='income.php'</script>";
        }
      }
      ?>
</body>
</html>