<?php
    session_start();
    include '../conn.php';

    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'services_manager'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $action = $_POST['action'] ?? $_GET['action'] ?? '';
    $uploadDir = './documents/';
    $allowed = ['pdf', 'docx'];

    function safeFilename($name, $ext) {
        return uniqid('doc_', true) . '.' . $ext;
    }

    switch ($action) {
        case 'add':
            if ($_FILES['d_file']['error'] === 0) {
                $ext = strtolower(pathinfo($_FILES['d_file']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowed)) {
                    $fileName = safeFilename($_FILES['d_file']['name'], $ext);
                    move_uploaded_file($_FILES['d_file']['tmp_name'], $uploadDir . $fileName);
                    $stmt = $conn->prepare("INSERT INTO documents_list (filename, document, dept, availability) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("sss", $_POST['d_name'], $fileName, $_POST['d_dept'] ,$_POST['d_avail']);  
                    $stmt->execute();
                }
            }
            break;

        case 'edit':
            $fileId = $_POST['d_id'];
            $name = $_POST['d_name'];
            $dept = $_POST['d_dept'];
            $avail = $_POST['d_avail'];
            $newFileName = null;

            if (!empty($_FILES['d_file']['name'])) {
                $ext = strtolower(pathinfo($_FILES['d_file']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowed)) {
                    $newFileName = safeFilename($_FILES['d_file']['name'], $ext);
                    move_uploaded_file($_FILES['d_file']['tmp_name'], $uploadDir . $newFileName);
                }
            }

            if ($newFileName) {
                $stmt = $conn->prepare("UPDATE services_files SET filename=?, document=?, dept=?, availability=? WHERE file_id=?");
                $stmt->bind_param("ssssi", $name, $newFileName, $dept, $avail, $fileId);
            } else {
                $stmt = $conn->prepare("UPDATE documents_list SET filename=?, dept=?, availability=? WHERE file_id=?");
                $stmt->bind_param("sssi", $name, $dept, $avail, $fileId);
            }

            $stmt->execute();
            break;

        case 'delete':
            $id = $_POST['d_id'] ?? 0;
            $stmt = $conn->prepare("DELETE FROM documents_list WHERE file_id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            break;
    }

$conn->close();
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;

?>