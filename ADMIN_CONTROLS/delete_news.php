<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM news_table WHERE news_id = $id";

    if (mysqli_query($conn, $sql)) {
        // 🔙 Redirect to the previous page after successful delete
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
