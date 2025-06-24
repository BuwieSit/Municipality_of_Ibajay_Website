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
                    <img class="d-edit" src="../../admin-resources/edit.png" alt="edit">
                    <img class="d-view" src="../../admin-resources/preview.png" alt="edit">
                    <img class="d-delete" src="../../admin-resources/delete.png" alt="edit">
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