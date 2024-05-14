<?php
$con = mysqli_connect('localhost','root','','gemt_db');
if(!$con){
    ?>
     <div class="toast-container">
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Toast</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Your toast is ready!
      </div>
    </div>
    <?php
}
session_start();

?>