<?php 

    session_start();
    include '../../conn.php';
    if (!in_array($_SESSION['role'] ?? '', ['super_admin'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts WHERE role="super_admin" ';
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($result);
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
    <title>Super Admin</title>
</head>
<body>
    <header class="head">
        <div class="settings-popup" id="settingsPopup"></div>
    </header>

    <div class="logout-popup" id="logoutPopup">
        <p class="logout-text">Are you sure you want to logout?</p>

        <form class="logout-form" novalidate>
           <button type="button" class="logout-button" id="logoutBtn">Log out</button>
            <button type="button" class="logout-button" id="logoutCancel">Cancel</button>
        </form>
    </div>
    <div class="side-navigation">
        <div class="side-wrapper">
            <img src="../../z-resources/ibajay_logo.png" alt="ibajay logo">
            <h2 id="userRole" class="user-role"><?php echo htmlspecialchars($data['admin_username']); ?></h2>
        </div>
        <div class="admin-navlist">
            <section class="admin-sidenav adm-dashboard">
                <img src="../../admin-resources/dashboard.png">
                <p class="nav-text">Dashboard</p>
            </section>

            <section class="admin-sidenav adm-news">
                <img src="../../admin-resources/news.png">
                <p class="nav-text">Announcements</p>
            </section>

            <section class="admin-sidenav adm-services">
                <img src="../../admin-resources/services.png">
                <p class="nav-text">Services</p>
            </section>

            <section class="admin-sidenav adm-tourism">
                <img src="../../admin-resources/tourism.png">
                <p class="nav-text" >Tourism</p>
            </section>
            <section class="admin-sidenav adm-tourism">
                <img src="../../admin-resources/health.png">
                <p class="nav-text">Healthcare</p>
            </section>

            <section class="admin-sidenav adm-transp">
                <img src="../../admin-resources/reports.png">
                <p class="nav-text">Transparency</p>
            </section>

            <section class="admin-sidenav adm-feedbacks">
                <img src="../../admin-resources/feedback.png">
                <p class="nav-text">Inquiries</p>
            </section>
            
            <section class="admin-sidenav adm-bookings">
                <img src="../../admin-resources/booking.png">
                <p class="nav-text">Online Application</p>
            </section>

            <section class="admin-sidenav adm-employees">
                <img src="../../admin-resources/employees.png">
                <p class="nav-text">Employees</p>
            </section>
        </div>
    </div>

    
    <div id="adminContent" class="admin-content-container">
        
    </div>

    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>