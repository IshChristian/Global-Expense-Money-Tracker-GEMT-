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
            <h1>Budget</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-5 col-lg-5">
              <div class="card">
                  <form action="budgetamount.php?id=<?php echo $_GET['id'] ?>" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Spent</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" id="" class="form-control">
                        <div class="invalid-feedback">
                          What's your amount?
                        </div>
                      </div>   
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                  </div>
                
              </div>
              <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4>View Budget</h4>
                  </div>
                  <div class="card-body p-0">
                  <!-- <div class="float-right"><b><span class="text-dark">Balance: </span><span class="badge badge-primary">$2000</span></b></div> -->
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Amount</th>
                          <th>period</th>
                          <th>Created At</th>
                        </tr>
                        <?php
                          $bid=$_GET['id'];
                          $sql = mysqli_query($con, "SELECT * FROM setbudget WHERE bu_id=$bid");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <tr>
                          <td>#<?php echo $result['bu_id'] ?></td>
                          <td><?php echo $result['category'] ?></td>
                          <td><div class="badge badge-success">$<?php echo $result['amount'] ?></div></td>
                          <td><?php echo $result['period'] ?><?php echo $result['days'] ?></td>
                          <td><?php echo $result['date'] ?></td>
                            </tr>
                              <?php
                              }
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
          $amnt = $_POST['amount'];
          $bid = $_GET['id'];
          $sql=mysqli_query($con, "SELECT amount FROM setbudget WHERE bu_id=$bid");
          $result=mysqli_fetch_array($sql);
            $sql = mysqli_query($con, "UPDATE setbudget SET amount='$amnt' WHERE bu_id='$bid'");
          if($sql){
            echo "<script>window.location='spendingbudget.php'</script>";
            echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
          }
        }
       ?>
</body>
</html>