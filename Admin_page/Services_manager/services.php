<?php 

    session_start();
    include '../../conn.php';
    

    $sql = 'SELECT * FROM documents_list ORDER BY uploaded_at';
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
    
    <div class="member-content-container">
        <div class="general-add">
            <button class="add-buttons d-add" id="addDocuBtn"><img src="../../admin-resources/add.png">Add document</button>
        </div>
        <table class="general-list">
            <thead>
                <th>Document name</th>
                <th>Upload date</th>
                <th>Status</th>
                <th>Actions</th>

            </thead>
        </table>
    </div>
    
    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>