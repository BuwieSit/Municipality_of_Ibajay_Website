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
    
    <div class="member-content-container">
        
            <div class="admin-news-container t-add-main" >
                <div class="t-add-wrapper">
                    <p class="tourism-title">Tourism Page</p>
                    <p class="tourism-desc">Add contents to Tourism Sections!</p>
                </div>

                <div class="t-add-wrapper t-button">
                    <img class="t-add" src="../../admin-resources/add.png">
                </div>
            </div>

    </div>
    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>