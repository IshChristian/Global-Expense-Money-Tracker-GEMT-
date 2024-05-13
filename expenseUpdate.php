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
            <h1>Expense</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="expenseUpdate.php?id=<?php echo $_GET['id'] ?>" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Update Expense</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Expense Name</label>
                        <select class="form-control" name="category" id="" required>
                          <option value="">Please select category</option>
                          <?php
                          $sql = mysqli_query($con, "SELECT * FROM income WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <option value="<?php echo $result['source'] ?>"><?php echo $result['source'] ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          What's your Expense category?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" required="">
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
                    <h4>View Expense</h4>
                  </div>
                  <div class="card-body p-0">
                  <?php
                      $sql = mysqli_query($con, "SELECT SUM(outgoing) as Balance FROM income WHERE user='$uid'");
                      $balance=mysqli_fetch_array($sql);
                  ?>
                  <div class="float-right"><b><span class="text-dark">Balance: </span><span class="badge badge-primary">$<?php echo $balance['Balance'] ?></span></b></div>
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>category</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        $eid = $_GET['id'];
                          $sql = mysqli_query($con, "SELECT * FROM expense WHERE user='$uid' AND en_id='$eid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <tr>
                                <td>EX<?php echo $result['en_id'] ?></td>
                                <td><?php echo $result['category'] ?></td>
                                <td><div class="badge badge-success">$<?php echo $result['amount'] ?></div></td>
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
          $cat = $_POST['category'];
          $amnt = $_POST['amount'];
          
          // $exp = $balance - $amnt;
          $inc = mysqli_query($con, "SELECT * FROM income WHERE source='$cat' AND user='$uid'");
          $resInc = mysqli_fetch_array($inc);
          $cid = $resInc['in_id'];
          $upInc = mysqli_query($con, "UPDATE income SET outgoing=(amount-$amnt) WHERE in_id=$cid AND user='$uid'");
          $sql = mysqli_query($con, "UPDATE expense SET category='$cat',amount='$amnt' WHERE user='$uid' AND en_id='$eid'");
          if($sql){
            echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
            echo "<script>window.location='expense.php'</script>";
          }
        }
       ?>
</body>
</html>