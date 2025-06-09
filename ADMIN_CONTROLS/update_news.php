<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $headline = trim($_POST['headline']);
    $description = trim($_POST['description']);

    if ($headline === '' || $description === '') {
        echo "Error: Headline or description cannot be empty.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE news_table SET headline = ?, description = ? WHERE news_id = ?");
    $stmt->bind_param("ssi", $headline, $description, $id);

    if ($stmt->execute()) {
        header("Location: ../Admin_page/adm_pages/adm_announce.php");
        exit;
    } else {
        echo "Update failed: " . $stmt->error;
    }
}
?>
