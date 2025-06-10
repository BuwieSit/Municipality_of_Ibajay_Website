<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM book_list WHERE book_id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "deleted";
        header("Location: ../Admin_page/adm_pages/adm_health.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
