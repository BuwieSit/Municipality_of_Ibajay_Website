<?php
session_start();
include '../conn.php';

if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'tourism_coordinator'])) {
    exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';
$tourTable = "tourism_content";

// Upload path setup
$uploadDir = __DIR__ . '/tourism_uploads/';
$relativePath = 'tourism_uploads/';

// Ensure folder exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Helper for image filename
function safeFileName($originalName) {
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    return uniqid('tour_', true) . '.' . $ext;
}

switch ($action) {
    case 'add':
        $title = $_POST['t_title'];
        $desc = $_POST['t_desc'];
        $tag = $_POST['t_tag'];
        $newName = '';

        if (isset($_FILES['t_image']) && $_FILES['t_image']['error'] === UPLOAD_ERR_OK) {
            $newName = safeFileName($_FILES['t_image']['name']);
            move_uploaded_file($_FILES['t_image']['tmp_name'], $uploadDir . $newName);
        } else {
            echo "<script>alert('Image upload failed'); history.back();</script>";
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO $tourTable (t_title, t_desc, t_tag, t_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $desc, $tag, $newName);
        $stmt->execute();
        break;

    case 'edit':
        $id = $_POST['t_id'];
        $title = $_POST['t_title'];
        $desc = $_POST['t_desc'];
        $tag = $_POST['t_tag'];
        $image = null;

        if (isset($_FILES['t_image']) && $_FILES['t_image']['error'] === UPLOAD_ERR_OK) {
            $image = safeFileName($_FILES['t_image']['name']);
            move_uploaded_file($_FILES['t_image']['tmp_name'], $uploadDir . $image);

            $stmt = $conn->prepare("UPDATE $tourTable SET t_title=?, t_desc=?, t_tag=?, t_image=? WHERE t_title=?");
            $stmt->bind_param("sssss", $title, $desc, $tag, $image, $id);
        } else {
            $stmt = $conn->prepare("UPDATE $tourTable SET t_title=?, t_desc=?, t_tag=? WHERE t_title=?");
            $stmt->bind_param("ssss", $title, $desc, $tag, $id);
        }

        $stmt->execute();
        break;

    case 'delete':
        $id = $_POST['t_id'];
        $stmt = $conn->prepare("DELETE FROM $tourTable WHERE t_title=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        break;
}

$conn->close();
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
