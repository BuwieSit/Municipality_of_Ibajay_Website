
    <?php
        session_start();
        include '../../conn.php'; 

        $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
    <link rel="stylesheet" href="../../global.css">

    <title>Ibajay Admin</title>
</head>
<body>
    
    <header class="head">
    </header>

    <div class="side-navigation">
        <div class="side-wrapper">
            <img src="../../z-resources/ibajay_logo.png" alt="ibajay logo">
            <h2 id="userRole" class="user-role">User Role</h2>
        </div>
        <div class="admin-navlist">
            <section class="admin-sidenav adm-news">
                <img src="../../admin-resources/news.png">
                <p class="nav-text">Announcements</p>
            </section>

        </div>
    </div>

    
    <div id="adminContent" class="admin-content-container">
        
    </div>



    <div class="member-content-container">

        <div class="add-news-wrapper">
                <div class="add-news">
                    <button class="add-buttons add-news-btn" id="addNewsBtn"><img src="../../admin-resources/add.png">Add news</button>
                </div>
                    

            <div class="admin-news-container">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="admin-news-item"
                data-id="<?php echo $row['news_id']; ?>"
                data-headline="<?php echo htmlspecialchars($row['headline'], ENT_QUOTES); ?>"
                data-description="<?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?>" 
                >
                    <div class="headline-image">
                    <img id="docProfile" class="doctor-prof"
                    src="../../ADMIN_CONTROLS/news_thumbnails/<?php echo htmlspecialchars($row['news_image'] 
                    ?? 'news_thumb.png', ENT_QUOTES); ?>"   
                    alt="news picture" 
                    onerror="this.src='../../z-resources/news_thumb.png'">
                      
                        <div class="headline-image-wrapper">
                            <img class="action-buttons edit-news-btn" id="newsEdit" src="../../admin-resources/edit.png" alt="edit">
                            <img class="action-buttons view-news-btn" id="newsView" src="../../admin-resources/preview.png" alt="prev">
                            <img class="action-buttons delete-news-btn" id="newsDel" src="../../admin-resources/delete.png" alt="del">
                        </div>  
                    </div>
                    <div class="headline-wrapper">
                        <span class="headline-title"><?php echo htmlspecialchars($row['headline']); ?></span>
                        <small><?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></small>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        
        <div class="add-news-wrapper">
                <div class="add-news">
                    <button class="add-buttons add-announce-btn" id="addAnnounceBtn"><img src="../../admin-resources/add.png">Add announcement</button>
                </div>

            <table class="announce-list">
                <thead>
                    <tr>
                        <th>Headline</th>
                        <th>Description</th>
                        <th>Date Published</th>
                        <th>Date Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="headline">The headliner</td>
                        <td id="description">Some description</td>
                        <td id="publishDate">2024-06-01</td>
                        <td id="updateDate">2024-06-17</td>
                        <td class="actions">
                            
                            <img src="../../admin-resources/edit.png" alt="edit">
                            <img src="../../admin-resources/preview.png" alt="edit">
                            <img src="../../admin-resources/delete.png" alt="edit">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="news-action-popup"
        data-id="<?php echo $news['news_id']; ?>"
        data-headline="<?php echo htmlspecialchars($news['headline'], ENT_QUOTES); ?>"
        data-description="<?php echo htmlspecialchars($news['description'], ENT_QUOTES); ?>"
        >
            <!-- news-action-form -->
        </div>
 

    </div>


    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
    <script src="editNews.js">

    </script>
</body>
</html>