<?php
include "../config/connection.php";
$table = $_GET['table'];
$location = $_GET['location'];
$where = $_GET['where'];
$sql = mysqli_query($con, "DELETE FROM $table WHERE $where");
if($sql){
    echo "<script>alert('DATA DELETE SUCCESSFULLY')</script>";
    echo "<script>window.location='../src/$location'</script>";
}
?>