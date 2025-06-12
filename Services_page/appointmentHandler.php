<?php
    session_start();
    header('Content-Type: application/json');

    include '../conn.php'; 

    $sql = "SELECT * FROM doctors_list";
    $result = mysqli_query($conn, $sql);

    $doctorInfo = [];
    while($row = mysqli_fetch_assoc($result)) {
        $doctorInfo[] = $row;
    }

    echo json_encode($doctorInfo);
?>
