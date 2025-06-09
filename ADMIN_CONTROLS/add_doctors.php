<?php 
session_start();
include '../conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $doctorName = $_POST['docname'];
        $doctorSpec = $_POST['docfield'];
        $doctorExp = $_POST['docexp'];
        $doctorFee = $_POST['docfee'];

        $doctorName = mysqli_real_escape_string($conn, $doctorName);
        $doctorSpec = mysqli_real_escape_string($conn, $doctorSpec);
        $doctorExp = mysqli_real_escape_string($conn, $doctorExp);
        $doctorFee = mysqli_real_escape_string($conn, $doctorFee);

        $sql = "INSERT INTO doctors_list (doctor_name, doctor_for, exp, fee) VALUES ('$doctorName', '$doctorSpec', '$doctorExp', '$doctorFee')";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Admin_page/adminControl.html');
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request.";
    }


    
?>