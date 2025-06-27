<?php 

    session_start();
    include '../../conn.php';
    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'health_admin'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

    $sql = 'SELECT * FROM admin_accounts WHERE role="health_admin" ';
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    $doctorsql = "SELECT * FROM doctors_list";
    $docRes = mysqli_query($conn, $sql);

    $doctorInfo = [];
        while($docRow = mysqli_fetch_assoc($docRes)) {
            $doctorInfo[] = $docRow;
        }
        
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "SELECT * FROM doctors_list WHERE doctor_id = $id";
        $result = mysqli_query($conn, $sql);
        $doctorInfo = mysqli_fetch_assoc($result);
    }


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
    <link rel="stylesheet" href="../admin_styles/adminGlobalStyle.css">
    <link rel="stylesheet" href="../adminStyle.css">
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
                <p class="nav-text">Healthcare</p>
            </section>

        </div>
    </div>

    
    <div id="adminContent" class="admin-content-container">
        
    </div>
    
    <div class="member-content-container">
        <div class="admin-news-container" >
            <div class="admin-news-wrapper ">
                <p class="admin-title ">Health Care</p>
                <p class="admin-desc ">Update emergency hotlines, manage doctors, </p>
            </div>
        </div>

        <div class="listings book-list">
            
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
    </div>

    <script src="../admin_styles/adminGlobalScript.js"></script>
    <script src="../admin_styles/adminAJAX.js"></script>
</body>
</html>