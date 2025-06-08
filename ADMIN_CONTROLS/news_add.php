<?php 

session_start();
include '../conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['headline'];
        $desc = $_POST['headline-description'];


        $title = mysqli_real_escape_string($conn, $title);
        $desc = mysqli_real_escape_string($conn, $desc);
        $sql = "INSERT INTO news_table (headline, description) VALUES ('$title', '$desc')";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Admin_page/adm_pages/adm_announce.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request.";
    }


    
?>