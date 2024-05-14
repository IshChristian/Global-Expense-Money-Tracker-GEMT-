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
            <h1>Report</h1>
          </div>
          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                  <div class="card-header">
                    <h4>Set Range</h4>
                  </div>
                  <form action="report.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Date Range Form</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="date" name="from" class="form-control daterange-cus">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Date Range To</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="date" name="to" class="form-control daterange-cus">
                      </div>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary">Check</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <?php
          if(isset($_POST['btn'])){
          $from = $_POST['from'];
          $to = $_POST['to'];
          ?>
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>General Amount</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Income</th>
                          <th>Expense</th>
                          <th>Saving</th>
                          <th>Loan</th>
                        </tr>
                        <?php
                          $sql = mysqli_query($con, "SELECT SUM(amount) as income FROM income WHERE date BETWEEN '$from' AND '$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <td>$<?php echo $result['income'] ?></td>
                              <?php
                            }
                          }
                          $sql = mysqli_query($con, "SELECT SUM(amount) as expense FROM expense WHERE date BETWEEN '$from' AND '$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <td>$<?php echo $result['expense'] ?></td>
                              <?php
                            }
                          }
                          $sql = mysqli_query($con, "SELECT SUM(amount) as saving FROM saving WHERE date BETWEEN '$from' AND '$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <td>$<?php echo $result['saving'] ?></td>
                              <?php
                            }
                          }
                          $sql = mysqli_query($con, "SELECT SUM(amount) as loan FROM loan WHERE date BETWEEN '$from' AND '$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <td>$<?php echo $result['loan'] ?></td>
                              <?php
                            }
                          }
                          ?>
                        <tr>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="card-header">
                    <h4>Saving</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>ID</th>
                          <th>Category</th>
                          <th>Amount</th>
                          <th>Withdraw</th>
                          <th>Date</th>
                        </tr>
                        <?php
                        $from = $_POST['from'];
                          $to = $_POST['to'];
                          $sql = mysqli_query($con, "SELECT * FROM saving WHERE date BETWEEN '$from' AND '$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <tr>
                          <td>SA-<?php echo $result['sa_id'] ?></td>
                          <td><?php echo $result['name'] ?></td>
                          <td><?php echo $result['target'] ?></td>
                          <td><?php echo $result['amount'] ?></td>
                          <td><?php echo $result['date'] ?></td>
                        </tr>
                              <?php
                              }
                            }else{
                            echo "<div class='align-center text-center text-success'>Data Not found</div>";
                            }
                              ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-header">
                    <h4>Loan</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>ID-1</th>
                          <th>Category</th>
                          <th>Amount</th>
                          <th>Date</th>
                        </tr>
                        <?php
                          $sql1 = mysqli_query($con, "SELECT * FROM loan WHERE date>='$from' AND date<='$to' AND user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($results=mysqli_fetch_array($sql1)){
                              ?>
                              <tr>
                          <td>LO-<?php echo $results['lo_id'] ?></td>
                          <td><?php echo $results['type'] ?></td>
                          <td><?php echo $results['amount'] ?></td>
                          <td><?php echo $results['date'] ?></td>
                        </tr>
                              <?php
                              }
                            }else{
                            echo "<div class='align-center text-center text-success'>Data Not found</div>";
                            }
                              ?>
                      </table>
                    </div>
                  </div>
                <?php
                }
                ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Footer -->
      <?php include "../include/footer.php" ?>
</body>
</html>