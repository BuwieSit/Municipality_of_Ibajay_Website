<?php 
session_start();
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newsImg = 'news_thumb.png'; 
    
    if (!empty($_FILES['headline-image']['name'])) {
        $newsImg = $_FILES['headline-image']['name'];
        $ext = pathinfo($newsImg, PATHINFO_EXTENSION);
        $allowedTypes = array('jpg', 'jpeg', 'png');
        $tempName = $_FILES['headline-image']['tmp_name'];
        $targetPath = './news_thumbnails/' . basename($newsImg);

        if (in_array(strtolower($ext), $allowedTypes)) {
            move_uploaded_file($tempName, $targetPath);
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG allowed.";
            exit;
        }
    }

    $title = mysqli_real_escape_string($conn, $_POST['headline']);
    $desc = mysqli_real_escape_string($conn, $_POST['headline-description']);
    $is_topnews = isset($_POST['is_topnews']) ? 1 : 0;
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    $sql = "INSERT INTO news_table 
    (news_image, headline, description, is_topnews, is_featured)
    VALUES ('$newsImg', '$title', '$desc', '$is_topnews', '$is_featured')";


    if (mysqli_query($conn, $sql)) {
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: " . $referer . (strpos($referer, '?') === false ? '?' : '&') . "status=success");

    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request.";
}
?>

