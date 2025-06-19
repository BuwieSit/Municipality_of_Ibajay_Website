<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $headline = trim($_POST['headline']);
    $description = trim($_POST['description']);

    if ($headline === '' || $description === '') {
        $error = "Error: Headline or description cannot be empty.";
        
   
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => false, 'message' => $error]);
            exit;
        } else {
            echo $error;
            exit;
        }
    }

    $stmt = $conn->prepare("UPDATE news_table SET headline = ?, description = ? WHERE news_id = ?");
    $stmt->bind_param("ssi", $headline, $description, $id);

    if ($stmt->execute()) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true, 'message' => 'News updated successfully.']);
            exit;
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $err = "Update failed: " . $stmt->error;
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => false, 'message' => $err]);
            exit;
        } else {
            echo $err;
            exit;
        }
    }
}
?>
