<?php
session_start();
header('Content-Type: application/json');
include '../conn.php'; 

// Fetch news
$sql = "SELECT * FROM news_table ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$newsItems = [];

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $newsItems[] = $row;
    }
}

// Fetch announcements
$announce = "SELECT * FROM announce_table";
$announceRes = mysqli_query($conn, $announce);
$announceItems = [];

if ($announceRes) {
    while($a_row = mysqli_fetch_assoc($announceRes)) {
        $announceItems[] = $a_row;
    }
}

// Return as a combined JSON object
echo json_encode([
    'news' => $newsItems,
    'announcements' => $announceItems
]);
?>
