
<?php
    session_start();
    include '../conn.php'; 

    $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    $list = 'SELECT * FROM book_list ORDER BY date';
    $list_result = mysqli_query($conn, $list);

    $bookList = [];
    while($bookRow = mysqli_fetch_assoc($list_result)) {
        $bookList[] = $bookRow;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="./adminStyle.css">
    <link rel="icon" href="../z-resources/ibajay_logo.png" />
    
    <title>Ibajay Admin</title>
</head>
<body>


    <div class="side-nav">

        <div class="profile">
        <a href="../index.php"><img src="../../z-resources/ibajay_logo.png"></a>
            <p class="admin-name">Main Page</p>
        </div>

        <div class="list-wrapper">
            <ul>
                <li id="dashboard"><img src="../admin-resources/dashboard.png">Dashboard</li>
                <li id="announce"><img src="../admin-resources/announcement.png">Announcements</li>
                <li id="health"><img src="../admin-resources/health.png">Healthcare</li>
                <li id="permit"><img src="../admin-resources/permit.png">Permits</li>
            </ul>
        </div>

    </div>

    <header class="head">
        <h2>Dashboard</h2>
    </header>

    <div class="main-container">
        <div class="overview-cont" id="announce-cont">
            <h1>News</h1>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="announce-list">
                    <h2 class="headline-text"><?php echo htmlspecialchars($row['headline']); ?></h2>
                    <small class="timestamp"><?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></small>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="overview-cont" id="health-cont">
            
            <h1>Healthcare</h1>
            
            <?php foreach($bookList as $bookRow ): ?> 
            <div class="booking"
                data-doctor="<?php echo htmlspecialchars($bookRow['doctor_booked'], ENT_QUOTES); ?>"  
                data-fname="<?php echo htmlspecialchars($bookRow['first_name'], ENT_QUOTES); ?>" 
                data-lname="<?php echo htmlspecialchars($bookRow['last_name'], ENT_QUOTES); ?>" 
                data-number="<?php echo htmlspecialchars($bookRow['phone_number'], ENT_QUOTES); ?>" 
                data-email="<?php echo htmlspecialchars($bookRow['email'], ENT_QUOTES); ?>"
                data-id="<?= $bookRow['book_id'] ?>" 
            >
                <div class="book-div sched-time"><p id="time"><?php echo date('g:i a', strtotime($bookRow['time'])); ?></p></div>

                <div class="book-div doctor-info">

                    <img id="docProfile" class="doctor-prof"
                    src="../../ADMIN_CONTROLS/doctor_images/<?php echo htmlspecialchars($row['doctor_image'] 
                    ?? 'default_image.png', ENT_QUOTES); ?>" 
                    alt="doctor profile" 
                    onerror="this.src='../../ADMIN_CONTROLS/doctor_images/default_image.png'">

                    <h4><?php echo htmlspecialchars($bookRow['doctor_booked'], ENT_QUOTES); ?></h4>
                </div>

                <div class="book-div client-details">
                    <img src="../../admin-resources/patient.png" alt="patient" id="patientImg">
                    <h4><?php echo htmlspecialchars($bookRow['first_name'], ENT_QUOTES) . ' ' . htmlspecialchars($bookRow['last_name'], ENT_QUOTES);  ?> </h4>
                    <p><?php echo htmlspecialchars($bookRow['phone_number'], ENT_QUOTES); ?></p>
                    <p><?php echo htmlspecialchars($bookRow['email'], ENT_QUOTES); ?></p> 
                </div>
                <div class="book-div date-sched">
                        <p id="date"><?php echo date('F j, Y', strtotime($bookRow['date'])); ?></p>
                </div>
            </div>

        <?php endforeach; ?> 
        </div>

        <div class="overview-cont" id="permit-cont">
            <h1>Permits</h1>
        </div>
    </div>



<script src="adminControlScript.js"></script>
<script src="newsAdd.js"></script>


</body>
</html>