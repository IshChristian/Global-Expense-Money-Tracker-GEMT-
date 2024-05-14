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
            <h1>Budget | Tracking Spending</h1>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Spending</h4>
                    <div class="card-header-form">
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Category</th>
                          <th>Budget Amount</th>
                          <th>Total Spend</th>
                          <th>Remain</th>
                          <th>Due Date</th>
                          <th>Action</th>
                        </tr>
                        <?php
                          $sql = mysqli_query($con, "SELECT * FROM setbudget WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              $rem = $result['amount'] - $result['spend'];
                              ?>
                              <tr>
                          <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?php echo $result['category'] ?></td>
                          <td class="align-middle">$<?php echo $result['amount'] ?></td>
                          <td> $<?php echo $result['spend'] ?></td>
                          <td> $<?php echo $rem ?></td>
                          <td><?php echo $result['date'] ?></td>
                          <td><a href="budgetamount.php?id=<?php echo $result['bu_id'] ?>" class="btn btn-primary">+ Budget</a></td>
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
            </div>
          <div class="section-body">
          </div>
        </section>
      </div>
       <!-- Footer -->
       <?php include "../include/footer.php" ?>
</body>
</html>