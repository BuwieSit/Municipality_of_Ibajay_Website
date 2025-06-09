<?php 
session_start();
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctorImg = 'default_image.png'; 
    if (!empty($_FILES['docimage']['name'])) {
        $doctorImg = $_FILES['docimage']['name'];
        $ext = pathinfo($doctorImg, PATHINFO_EXTENSION);
        $allowedTypes = array('jpg', 'jpeg', 'png');
        $tempName = $_FILES['docimage']['tmp_name'];
        $targetPath = './doctor_images/' . basename($doctorImg);

        if (in_array(strtolower($ext), $allowedTypes)) {
            move_uploaded_file($tempName, $targetPath);
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG allowed.";
            exit;
        }
    }

    $doctorName = mysqli_real_escape_string($conn, $_POST['docname']);
    $doctorSpec = mysqli_real_escape_string($conn, $_POST['docfield']);
    $doctorExp = mysqli_real_escape_string($conn, $_POST['docexp']);
    $doctorFee = mysqli_real_escape_string($conn, $_POST['docfee']);

    $sql = "INSERT INTO doctors_list (doctor_name, doctor_for, exp, fee, doctor_image) 
            VALUES ('$doctorName', '$doctorSpec', '$doctorExp', '$doctorFee', '$doctorImg')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../../Admin_page/adm_pages/adm_health.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
