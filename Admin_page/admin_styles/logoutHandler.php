<?php 
    session_start();
    session_destroy();
    header('../../admin.php');
    exit();
    

?>