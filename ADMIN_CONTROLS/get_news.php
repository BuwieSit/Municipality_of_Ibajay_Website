<?php
include '../conn.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM news_table WHERE news_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $news = mysqli_fetch_assoc($result);
        echo json_encode($news);
    } else {
        echo json_encode(null);
    }
} else {
    echo json_encode(null);
}
