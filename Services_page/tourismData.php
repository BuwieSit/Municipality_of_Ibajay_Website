<?php
header('Content-Type: application/json');
include '../conn.php';

$query = "SELECT t_title, t_desc, t_image, t_tag FROM tourism_content";
$result = mysqli_query($conn, $query);

$tourismData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tourismData[] = $row;
}

echo json_encode($tourismData);
?>
