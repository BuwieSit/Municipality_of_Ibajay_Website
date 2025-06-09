<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $docname = trim($_POST['docname']);
    $docspec = trim($_POST['docfor']);
    $docexp = trim($_POST['docexp']);
    $docfee = trim($_POST['docfee']);

    if ($docname === '' || $docspec === '' || $docexp === '' || $docfee === '') {
        echo "Error: Fields cannot be empty";
        exit;
    }

    $stmt = $conn->prepare("UPDATE doctors_list SET doctor_name = ?, doctor_for = ?, exp = ?, fee = ? WHERE doctor_id = ?");
    $stmt->bind_param("ssiii", $docname, $docspec, $docexp, $docfee, $id);

    if ($stmt->execute()) {
        header("Location: ../Admin_page/adm_pages/adm_health.php");
        exit;
    } else {
        echo "Update failed: " . $stmt->error;
    }
}
?>
