<?php
    session_start();
    header('Content-Type: application/json');

    include './conn.php'; 

    $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    $newsItems = [];
    while($row = mysqli_fetch_assoc($result)) {
        $newsItems[] = $row;
    }

    echo json_encode($newsItems);
?>
