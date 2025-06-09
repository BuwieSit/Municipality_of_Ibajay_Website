<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "SELECT * FROM news_table WHERE news_id = $id";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_assoc($result);
} else {
    header("Location: ../Admin_page/adm_pages/adm_announce.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ibajay Admin</title>
    <link rel="stylesheet" href="../ADMIN_CONTROLS/admin_controls.css">
</head>
<body>

    <div class="container-box">
        <h2 class="view-title">VIEW MODE</h2>
        <div class="view-section">

            <div class="headline-box">
                <?php echo htmlspecialchars($news['headline']); ?>
            </div>

            <div class="description-box">
                <?php echo nl2br(htmlspecialchars($news['description'])); ?>
            </div>

            <div class="published-box">
                Published on <?php echo date('F j, Y, g:i a', strtotime($news['created_at'])); ?>
            </div>

            <a href="../Admin_page/adm_pages/adm_announce.php" class="back-link">← Back</a>
        </div>
    </div>

</body>
</html>
