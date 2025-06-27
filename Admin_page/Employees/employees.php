<?php 

    session_start();
    include '../../conn.php';
        if (!in_array($_SESSION['role'] ?? '', ['super_admin'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts';
    $list = mysqli_query($conn, $sql);


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
    
    <header class="head">
        <div class="settings-popup" id="settingsPopup"></div>
    </header>
    <div class="member-content-container">
        <table class="general-list">
            <thead>
                <th>Profile</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>

            </thead>

            <?php while($admin_row = mysqli_fetch_assoc($list)): ?>
            <tr class="admin_row"
            data-admin_id="<?php echo $admin_row['admin_id']?>"
            data-admin_profile="<?php echo $admin_row['profile']?>"
            data-admin_username="<?php echo $admin_row['admin_username']?>"
            data-admin_role="<?php echo $admin_row['role']?>"
            >
                <td class="adm-profile"><?php echo $admin_row['profile']?></td>
                <td class="adm-email"><?php echo $admin_row['admin_email']?></td>
                <td class="adm-username"><?php echo $admin_row['admin_username']?></td>
                <td class="adm-role"><?php echo $admin_row['role']?></td>

            </tr>

            <?php endwhile; ?>
        </table>
    </div>
    
    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>