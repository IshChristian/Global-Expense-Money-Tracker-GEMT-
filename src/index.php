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
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Balance</h4>
                  </div>
                  <?php
                    $sql = mysqli_query($con, "SELECT SUM(outgoing) as balance FROM income WHERE user='$uid'");
                    $result=mysqli_fetch_array($sql);
                  ?>
                  <div class="card-body">
                    $<?php echo $result['balance'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Expense</h4>
                  </div>
                  <?php
                    $sql = mysqli_query($con, "SELECT SUM(amount) as expense FROM expense WHERE user='$uid'");
                    $result=mysqli_fetch_array($sql);
                  ?>
                  <div class="card-body">
                    $<?php echo $result['expense'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
              <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Budget</h4>
                  </div>
                  <?php
                    $sql = mysqli_query($con, "SELECT SUM(amount) as spend FROM setbudget WHERE user='$uid'");
                    $result=mysqli_fetch_array($sql);
                  ?>
                  <div class="card-body">
                    $<?php echo $result['spend'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Spending Status</h4>
                  <div class="card-header-action">
                    <a href="report.php" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Spending ID</th>
                        <th>Category</th>
                        <th>Amount Spend</th>
                        <th>Remain</th>
                        <th>Action</th>
                      </tr>
                      <?php
                          $sql = mysqli_query($con, "SELECT * FROM setbudget WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              $rem = $result['amount'] - $result['spend'];
                              ?>
                              <tr>
                          <td class="p-0">SP-<?php echo $result['bu_id'] ?></td>
                          <td><?php echo $result['category'] ?></td>
                          <td> $<?php echo $result['spend'] ?></td>
                          <td> $<?php echo $rem ?></td>
                          <td><a href="spendingbudget.php" class="btn btn-primary">Details</a></td>
                        </tr>
                              <?php
                              }
                            }
                            ?>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <?php
                          $sql = mysqli_query($con, "SELECT COUNT(id) as cate FROM category WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <h4><?php echo $result['cate'] ?></h4>
                              <?php
                            }
                          }
                          ?>
                  
                  <div class="card-description">Category need help</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    
                      <?php
                          $sql = mysqli_query($con, "SELECT * FROM category WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <a href="category.php" class="ticket-item">
                                <div class="ticket-title">
                                  <h4><?php echo $result['name'] ?></h4>
                                </div>
                            </a>
                              <?php
                            }
                          }
                          ?>
                      
                    <a href="category.php" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include "../include/footer.php" ?> 
</body>
</html>