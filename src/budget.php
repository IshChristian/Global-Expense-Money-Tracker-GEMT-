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
            <h1>Budget</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-5 col-lg-5">
              <div class="card">
                  <form action="budget.php" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Set Budget</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="category" id="" required>
                          <option value="">Please select category</option>
                          <?php
                          $sql = mysqli_query($con, "SELECT * FROM category WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <option value="<?php echo $result['name'] ?>"><?php echo $result['name'] ?></option>
                              <?php
                              }
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                          What's your budget category?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" id="" class="form-control">
                        <div class="invalid-feedback">
                          What's your amount?
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Period</label>
                        <input type="number" name="period" id="" class="form-control" placeholder="Enter long period (ex: 2)"><br>
                        <select class="form-control" name="long" id="" required>
                          <option value="">Please select period</option>
                          <option value="weeks">Weeks</option>
                          <option value="month">Month</option>
                          <option value="year">year</option>
                        </select>
                        <div class="invalid-feedback">
                          What's your budget come from?
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
                          <th>Action</th>
                        </tr>
                        <?php
                          $sql = mysqli_query($con, "SELECT * FROM setbudget WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                              <tr>
                          <td>#<?php echo $result['bu_id'] ?></td>
                          <td><?php echo $result['category'] ?></td>
                          <td><div class="badge badge-success">$<?php echo $result['amount'] ?></div></td>
                          <td><?php echo $result['period'] ?><?php echo $result['days'] ?></td>
                          <td><?php echo $result['date'] ?></td>
                          <td><a href="budgetspend.php?id=<?php echo $result['bu_id'] ?>" class="btn btn-secondary">Spend</a></td>
                          <td><a href="deletecancer.php?table=setbudget&where=bu_id=<?php echo $result['bu_id'] ?>&location=budget.php" class="btn btn-danger">Delete</a></td>
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
       <?php include "../include/footer.php" ?>
       <?php
        if(isset($_POST['btn'])){
          $cat = $_POST['category'];
          $amnt = $_POST['amount'];
          $per = $_POST['period'];
          $lon = $_POST['long'];
          $sel=mysqli_query($con, "SELECT * FROM setbudget WHERE category='$cat' AND amount='$amnt' AND period='$per' AND days='$lon'");      
          if(mysqli_num_rows($sel)>0){
            echo "<script>alert('BUDGET Already ')</script>";
          }else{
          }
          $sql = mysqli_query($con, "INSERT INTO setbudget (category,amount,period,days,user,spend) VALUES ('$cat','$amnt','$per','$lon','$uid','0')");
          if($sql){
            echo "<script>window.location='budget.php'</script>";
            echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
          }
        }
       ?>
</body>
</html>