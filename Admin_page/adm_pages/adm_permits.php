<?php 

    session_start();
    include '../../conn.php';

    $list = 'SELECT * FROM payments ORDER BY request_at';
    $list_result = mysqli_query($conn, $list);

    $reqList = [];
    while($reqRow = mysqli_fetch_assoc($list_result)) {
        $reqList[] = $reqRow;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../adminStyle.css">
    <link rel="icon" href="../../z-resources/ibajay_logo.png" />
    
    <title>Ibajay Admin</title>
</head>
<body>


    <div class="side-nav">

        <div class="profile">
        <a href="../../index.html"><img src="../../z-resources/ibajay_logo.png"></a>
            <p class="admin-name">Main Page</p>
        </div>

        <div class="list-wrapper">
            <ul>
                <li id="dashboard"><img src="../../admin-resources/dashboard.png">Dashboard</li>
                <li id="announce"><img src="../../admin-resources/announcement.png">Announcements</li>
                <li id="health"><img src="../../admin-resources/health.png">Healthcare</li>
                <li id="permit"><img src="../../admin-resources/permit.png">Permits</li>
            </ul>
        </div>
    </div>

    <header class="head">
        <h2>Permit Requests</h2>
    </header>

    <div class="requests-cont">
        <?php foreach($reqList as $reqRow ): ?>

        <div class="request"
            data-doctor="<?php echo htmlspecialchars($reqRow['permit_type'], ENT_QUOTES); ?>" 
        >
            <div class="req-wrapper">
                <h4><?php echo htmlspecialchars($reqRow['permit_type']); ?></h4>
            </div>
            <div class="req-wrapper">
                <p><?php echo htmlspecialchars($reqRow['usernumber']); ?></p>
            </div>
            <div class="req-wrapper">
                <p><?php echo htmlspecialchars($reqRow['email']); ?></p>
            </div>

        </div>

        <?php endforeach; ?> 
    </div>

<script src="../adminControlScript.js"></script>



</body>
</html>