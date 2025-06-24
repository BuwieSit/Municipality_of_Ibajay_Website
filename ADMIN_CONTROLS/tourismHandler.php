<?php 

    session_start();
    include '../conn.php';

    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'tourism_coordinator'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $action = $_POST['action'] ?? $_GET['action'] ?? '';
?>