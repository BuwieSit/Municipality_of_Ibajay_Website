
<?php
    session_start();
    include '../../conn.php'; 

    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'content_manager'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts WHERE role="content_manager" ';
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);


        $newsTable = "SELECT * FROM news_table ORDER BY created_at DESC";
        $newsRes = mysqli_query($conn, $newsTable);

        $a_table = "SELECT * FROM announce_table ORDER BY publish_date DESC";
        $a_result = mysqli_query($conn, $a_table);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="1024">
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
    <link rel="stylesheet" href="../../global.css">

    <title>Ibajay Admin</title>
</head>
<body>
    
    <header class="head">
        <div class="settings-popup" id="settingsPopup"></div>
    </header>

    <div class="side-navigation">
        <div class="side-wrapper">
            <img src="../../z-resources/ibajay_logo.png" alt="ibajay logo">
            <h2 id="userRole" class="user-role"><?php echo htmlspecialchars($data['admin_username']); ?></h2>
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

    <div class="added-popup" id="addedPopup">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
            <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
            <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
        </svg>
        <p class="added-text">Successful!</p>
    </div>
    <script src="./editNews.js"></script>


            <div class="admin-news-container t-add-main" >
                <div class="admin-news-wrapper t-add-wrapper">
                    <p class="admin-title tourism-title">Contents/Announcements Page</p>
                    <p class="admin-desc tourism-desc">Latest Advisories, government bulletins, projects, and activities</p>
                </div>
            </div>


        <div class="add-news-wrapper">
                <div class="general-add">
                    <button class="add-buttons add-news-btn" id="addNewsBtn"><img src="../../admin-resources/add.png">Add news</button>
                </div>
                    

            <div class="admin-news-container">
                <?php while($row = mysqli_fetch_assoc($newsRes)): ?>
                <div class="admin-news-item"
                data-id="<?php echo $row['news_id']; ?>"
                data-headline="<?php echo htmlspecialchars($row['headline'], ENT_QUOTES); ?>"
                data-description="<?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?>" 
                data-isfeatured="<?php echo htmlspecialchars($row['is_featured'], ENT_QUOTES); ?>"
                data-istopnews="<?php echo htmlspecialchars($row['is_topnews'], ENT_QUOTES); ?>"
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
                <div class="general-add">
                    <button class="add-buttons a-add" id="addAnnounceBtn"><img src="../../admin-resources/add.png">Add announcement</button>
                </div>

            <table class="general-list">
                <thead>
                    <tr>
                        <th>What</th>
                        <th>When</th>
                        <th>Where</th>
                        <th>Why</th>
                        <th>Date Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($a_row = mysqli_fetch_assoc($a_result)): ?>
                    <tr class="a_row"
                    data-a_id="<?php echo $a_row['announce_id']; ?>"
                    data-a_what="<?php echo $a_row['a_what']; ?>"
                    data-a_where="<?php echo $a_row['a_when']; ?>"
                    data-a_when="<?php echo $a_row['a_where']; ?>"
                    data-a_why="<?php echo $a_row['a_why']; ?>"
                    data-a_publish="<?php echo $a_row['publish_date']; ?>"
                    >
                        
                        <td id="aWhat"><?php echo $a_row['a_what']; ?></td>
                        <td id="aWhen"><?php echo $a_row['a_when']; ?></td>
                        <td id="aWhere"><?php echo $a_row['a_where']; ?></td>
                        <td id="aWhy"><?php echo $a_row['a_why']; ?></td>
                        <td id="publishDate"><?php echo $a_row['publish_date']; ?></td>
                        <td class="actions">
                            
                                <img class="action-img a-edit" src="../../admin-resources/edit.png" alt="edit">
                                <img class="action-img a-view" src="../../admin-resources/preview.png" alt="edit">
                                <img class="action-img a-delete" src="../../admin-resources/delete.png" alt="edit">

                        </td>
                    </tr>
                    <?php endwhile; ?>
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
        
        <div class="news-action-popup announce-action-popup">
            <!-- announce-action-form -->
        </div>

    </div>


    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>


    </script>
</body>
</html>