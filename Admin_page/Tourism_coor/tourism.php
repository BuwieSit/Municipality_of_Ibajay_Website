<?php 

    session_start();
    include '../../conn.php';
    $sql = 'SELECT * FROM tourism_content';
    $tContent = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
    <title>Ibajay Admin</title>
</head>
<body>
    
    <header class="head">
        <div class="settings-popup" id="settingsPopup"></div>
    </header>
    <div class="member-content-container">
        
            <div class="admin-news-container t-add-main" >
                <div class="admin-news-wrapper t-add-wrapper">
                    <p class="admin-title tourism-title">Tourism Page</p>
                    <p class="admin-desc tourism-desc">Post tourism-related articles, upcoming events, and community programs</p>
                </div>
                <div class="admin-add-wrapper n-add-wrapper admin-button">
                    <img class="admin-add-img" src="../../admin-resources/add.png">
                </div>
            </div>

    </div>
    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>