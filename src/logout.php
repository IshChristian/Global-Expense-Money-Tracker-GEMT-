<?php
session_start();
session_destroy();
echo "<script>window.location='../src/auth-login.php'</script>";
?>