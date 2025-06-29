<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $headline = trim($_POST['headline']);
    $description = trim($_POST['description']);

    // Parse checkboxes
    $isTopnews = isset($_POST['is_topnews']) ? 1 : 0;
    $isFeatured = isset($_POST['is_featured']) ? 1 : 0;

    if ($headline === '' || $description === '') {
        $error = "Error: Headline or description cannot be empty.";
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => false, 'message' => $error]);
            exit;
        } else {
            echo $error;
            exit;
        }
    }

    // If this is being set to featured, demote existing one and remember it
    if ($isFeatured === 1) {
        $conn->query("UPDATE news_table SET is_featured = 0, was_featured = 1 WHERE is_featured = 1 AND news_id != $id");
    }

    // Update the current news item
    $stmt = $conn->prepare("UPDATE news_table 
                            SET headline = ?, description = ?, is_topnews = ?, is_featured = ?, was_featured = ? 
                            WHERE news_id = ?");
    // If marked as featured, reset was_featured to 0 (since it's now active)
    $wasFeatured = ($isFeatured === 1) ? 0 : 1;

    $stmt->bind_param("ssiiii", $headline, $description, $isTopnews, $isFeatured, $wasFeatured, $id);

    if ($stmt->execute()) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true, 'message' => 'News updated successfully.']);
            exit;
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $err = "Update failed: " . $stmt->error;
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => false, 'message' => $err]);
            exit;
        } else {
            echo $err;
            exit;
        }
    }
}
?>
