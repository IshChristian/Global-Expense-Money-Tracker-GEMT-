<?php
session_start();
session_destroy();
echo "<script>window.location='auth-login.php'</script>";
?>