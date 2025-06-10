
<?php
    session_start();
    include '../conn.php'; 

    $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./adminStyle.css">
    <link rel="icon" href="../z-resources/ibajay_logo.png" />
    
    <title>Ibajay Admin</title>
</head>
<body>


    <div class="side-nav">

        <div class="profile">
        <a href="../index.php"><img src="../../z-resources/ibajay_logo.png"></a>
            <p class="admin-name">Main Page</p>
        </div>

        <div class="list-wrapper">
            <ul>
                <li id="dashboard"><img src="../admin-resources/dashboard.png">Dashboard</li>
                <li id="announce"><img src="../admin-resources/announcement.png">Announcements</li>
                <li id="health"><img src="../admin-resources/health.png">Healthcare</li>
                <li id="permit"><img src="../admin-resources/permit.png">Permits</li>
            </ul>
        </div>

    </div>

    <header class="head">
        <h2>Dashboard</h2>
    </header>

    <div class="main-container">
        <div class="overview-cont" id="announce-cont">
            <h1>News</h1>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="announce-list">
                    <h2 class="headline-text"><?php echo htmlspecialchars($row['headline']); ?></h2>
                    <small class="timestamp"><?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></small>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="overview-cont" id="health-cont">
            <h1>Healthcare</h1>
        </div>

        <div class="overview-cont" id="permit-cont">
            <h1>Permits</h1>
        </div>
    </div>



<script src="adminControlScript.js"></script>
<script src="newsAdd.js"></script>


</body>
</html>