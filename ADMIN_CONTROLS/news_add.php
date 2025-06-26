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
    $sectionArray = $_POST['news_section'] ?? [];  
    $section = mysqli_real_escape_string($conn, implode(',', $sectionArray));

    $sql = "INSERT INTO news_table (news_image, headline, description, news_section) VALUES ('$newsImg', '$title', '$desc', '$section')";

    if (mysqli_query($conn, $sql)) {
        $referer = $_SERVER['HTTP_REFERER'];
        // header("Location: " . $referer . (strpos($referer, '?') === false ? '?' : '&') . "status=success");
        echo "success";

    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request.";
}
?>

