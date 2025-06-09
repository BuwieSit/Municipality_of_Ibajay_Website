
<?php
    session_start();
    include '../../conn.php'; // Make sure this connects to your DB

    $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../adminStyle.css">
    <link rel="icon" href="../../z-resources/ibajay_logo.png" />
    
    <title>Ibajay Admin</title>
</head>
<body>


    <div class="side-nav">

        <div class="profile">
        <a href="../../index.php"><img src="../../z-resources/ibajay_logo.png"></a>
            <p class="admin-name">Main Page</p>
        </div>

        <div class="list-wrapper">
            <ul>
                <li id="dashboard"><img src="../../admin-resources/dashboard.png">Dashboard</li>
                <li id="announce"><img src="../../admin-resources/announcement.png">Announcements</li>
                <li id="health"><img src="../../admin-resources/health.png">Healthcare</li>
                <li id="permit"><img src="../../admin-resources/permit.png">Permits</li>
            </ul>
        </div>
    </div>

    <header class="head">
        <h2>Announcements</h2>
    </header>

    <div class="news-preview">

    </div>

    <div class="announcements-container">
        <div class="announce-list add"><img src="../../admin-resources/plus.png"></div>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="announce-list">
            <h2 class="headline-text"><?php echo htmlspecialchars($row['headline']); ?></h2>
            <small class="timestamp"><?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></small>

            <div class="opt-wrapper">

                <form class="form-options trash-form" action="../../ADMIN_CONTROLS/delete_news.php" method="post" onsubmit="return confirmDelete();">
                    <input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
                    <button class="opt-buttons" id="trash" type="submit"><img src="../../admin-resources/trash.png"><button>
                </form>

                <form class="form-options edit-form" action="../../ADMIN_CONTROLS/edit_news.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
                    <button class="opt-buttons" id="edit" type="submit"><img src="../../admin-resources//edit.png"></button>
                </form>

                <form class="form-options view-form" action="../../ADMIN_CONTROLS/view_news.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
                    <button class="opt-buttons" id="view" type="submit"><img src="../../admin-resources//preview.png"></button>
                </form>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <div class="add-popup">
        <img src="../../admin-resources/close.png" alt="close" id="closeBtn">
        <form class="add-form" action="../../ADMIN_CONTROLS/news_add.php" method="post">
            <input type="text" name="headline" id="headline" placeholder="Headline" required>
            <textarea name="headline-description" id="headline-description" placeholder="Description" required></textarea>
        <button type="submit" class="add-btn"> <img src="../../admin-resources/plus.png"></button>
        </form>
    </div>

        <div class="edit-popup">
        <img src="../../admin-resources/close.png" alt="close" id="closeBtn">
        <form class="add-form" action="../../ADMIN_CONTROLS/news_add.php" method="post">
            <input type="text" name="headline" id="headline" placeholder="Headline" required>
            <textarea name="headline-description" id="headline-description" placeholder="Description" required></textarea>
        <button type="submit" class="add-btn"> <img src="../../admin-resources/plus.png"></button>
        </form>
    </div>
<script src="../adminControlScript.js"></script>
<script src="../newsAdd.js"></script>


</body>
</html>