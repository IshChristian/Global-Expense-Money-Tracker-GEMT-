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
            <h1>Category</h1>
          </div>
              <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="category.php" method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required="">
                        <div class="invalid-feedback">
                          What's your Category come from?
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
                          <th>Created At</th>
                        </tr>
                          <?php
                          $sql = mysqli_query($con, "SELECT * FROM category WHERE user='$uid'");
                          if(mysqli_num_rows($sql)>0){
                            while($result=mysqli_fetch_array($sql)){
                              ?>
                                <tr>
                                  <td>C<?php echo $result['id'] ?></td>
                                  <td><?php echo $result['name'] ?></td>
                                  <td><?php echo $result['date'] ?></td>
                                  <td><a href="categoryUpdate.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Update</a></td>
                                  <td><a href="deletecancer.php?table=category&where=id=<?php echo $result['id'] ?>&location=category.php" class="btn btn-danger">Delete</a></td>
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
        $src = $_POST['name'];
        $date =  date('y-m-d');
        $sel=mysqli_query($con, "SELECT * FROM category WHERE name='$src'");
        if(mysqli_num_rows($sel)>0){
          echo "<script>alert('CATEGORY ARE ADDED')</script>";
        }else{
        $sql = mysqli_query($con, "INSERT INTO category (name,user) VALUES ('$src','$uid')");
        }
        if($sql){
          echo "<script>alert('DATA SAVED SUCCESSFULLY')</script>";
          echo "<script>window.location='category.php'</script>";
        }
      }
      ?>
</body>
</html>