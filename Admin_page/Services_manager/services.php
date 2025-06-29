<?php 

    session_start();
    include '../../conn.php';
    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'content_manager'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts WHERE role="transp_officer" ';
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    


    $table = 'SELECT * FROM documents_list ORDER BY uploaded_at';
    $list = mysqli_query($conn, $table);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="1024">
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
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

            <section class="admin-sidenav adm-transp">
                <img src="../../admin-resources/reports.png">
                <p class="nav-text">Services</p>
            </section>

        </div>
    </div>

    
    <div id="adminContent" class="admin-content-container">
        
    </div>

    <div class="member-content-container">

        <div class="admin-news-container" >
                <div class="admin-news-wrapper ">
                    <p class="admin-title">Services Page</p>
                    <p class="admin-desc ">List of services per department with requirements and processing times</p>
                </div>
        </div>


        <div class="general-add">
            <button class="add-buttons d-add" id="addDocuBtn"><img src="../../admin-resources/add.png">Add document</button>
        </div>
        <table class="general-list">
            <thead>
                <th>Document name</th>
                <th>Department</th>
                <th>Availability</th>
                <th>Upload date</th>
                <th>Actions</th>
            </thead>

            <?php while($d_row = mysqli_fetch_assoc($list)): ?>
            <tr class="d_row"
            data-d_id="<?php echo $d_row['file_id']?>"
            data-d_filename="<?php echo $d_row['filename']?>"
            data-d_document="<?php echo $d_row['document']?>"
            data-d_dept="<?php echo $d_row['dept']?>"
            data-d_avail="<?php echo $d_row['availability']?>"
            data-d_uploadDate="<?php echo $d_row['uploaded_at']?>"
            >
                <td class="docu-name"><?php echo $d_row['filename']?></td>
                <td class="docu-dept"><?php echo $d_row['dept']?></td>
                <td class="docu-avail"><?php echo $d_row['availability']?></td>
                <td class="docu-date"><?php echo $d_row['uploaded_at']?></td>
                <td class="actions">
                    <img class="action-img d-edit" src="../../admin-resources/edit.png" alt="edit">
                    <img class="action-img d-view" src="../../admin-resources/preview.png" alt="edit">
                    <img class="action-img d-delete" src="../../admin-resources/delete.png" alt="edit">
                </td>
            </tr>

            <?php endwhile; ?>
        </table>

        <div class="news-action-popup documents-action-popup">
            <!-- announce-action-form -->
        </div>
    </div>


    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>