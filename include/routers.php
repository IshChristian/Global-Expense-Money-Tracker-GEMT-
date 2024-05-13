<?php
if(!isset($_SESSION['user'])){
  echo "<script>window.location='auth-login.php'</script>";
}
$uid = $_SESSION['user'];
?>