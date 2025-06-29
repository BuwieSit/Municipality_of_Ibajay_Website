<?php 

    session_start();
    include '../../conn.php';
    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'helpdesk_officer'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts WHERE role="helpdesk_officer" ';
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($result);
    


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
                <p class="nav-text">Inquiries</p>
            </section>

        </div>
    </div>

    
    <div id="adminContent" class="admin-content-container">
        
    </div>
    
    <div class="member-content-container">
        <div class="member-content-container">
            <div class="admin-news-container" >
                <div class="admin-news-wrapper ">
                    <p class="admin-title ">Helpdesk inquiries</p>
                    <p class="admin-desc ">Update emergency hotlines, manage doctors, </p>
                </div>
            </div>
        </div>
    </div>

    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>