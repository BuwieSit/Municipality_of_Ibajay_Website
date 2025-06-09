<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "SELECT * FROM news_table WHERE news_id = $id";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
    <link rel="stylesheet" href="admin_controls.css">
</head>
<body>
    <div class="container-box">
        <h2>Edit News</h2>
        <form id="editForm" action="update_news.php" method="post">
            <input type="hidden" name="id" value="<?php echo $news['news_id']; ?>">

            <input type="text" name="headline" id="headline" value="<?php echo htmlspecialchars($news['headline']); ?>" required class="headline-box">

            <textarea name="description" id="description" rows="6" required class="description-box"><?php echo htmlspecialchars($news['description']); ?></textarea>

            <button type="submit">Update</button>
        </form>
        <a href="../Admin_page/adm_pages/adm_announce.php" class="back-link">← Cancel</a>
    </div>

    <script>
        const form = document.getElementById('editForm');
        const headline = document.getElementById('headline');
        const description = document.getElementById('description');
        let isDirty = false;

        // Detect changes
        [headline, description].forEach(input => {
            input.addEventListener('input', () => {
                isDirty = true;
            });
        });

        // Confirm before form submission
        form.addEventListener('submit', function(e) {
            if (!headline.value.trim() || !description.value.trim()) {
                e.preventDefault();
                alert("Headline and Description cannot be empty.");
                return;
            }

            const confirmUpdate = confirm("Are you sure you want to apply these updates?");
            if (!confirmUpdate) {
                e.preventDefault();
            } else {
                isDirty = false; // Allow page unload
            }
        });

        // Warn on close if unsaved
        window.addEventListener("beforeunload", function(e) {
            if (isDirty) {
                e.preventDefault();
                e.returnValue = "You have unsaved changes. Are you sure you want to leave?";
            }
        });
    </script>
</body>
</html>
