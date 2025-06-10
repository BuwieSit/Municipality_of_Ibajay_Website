<?php
    session_start();
    include '../../conn.php'; 

    $sql = "SELECT * FROM doctors_list";
    $result = mysqli_query($conn, $sql);

    $doctorInfo = [];
        while($row = mysqli_fetch_assoc($result)) {
            $doctorInfo[] = $row;
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
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../adminStyle.css">
    <link rel="icon" href="../../z-resources/ibajay_logo.png" />
    
    <title>Ibajay Admin</title>
</head>
<body>


    <div class="side-nav">
        
        <div class="profile">
        <a href="../../index.php"><img src="../../z-resources/ibajay_logo.png"></a>
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
        <h2>Healthcare </h2>
    </header>

    <div class="health-main-cont">

        <div class="titles">
            <h2>Healthcare Appointments</h2>
        </div>
        
        <div class="listings book-list">
            
        <?php foreach($bookList as $bookRow ): ?> 
            <div class="booking"
                data-doctor="<?php echo htmlspecialchars($bookRow['doctor_booked'], ENT_QUOTES); ?>"  
                data-fname="<?php echo htmlspecialchars($bookRow['first_name'], ENT_QUOTES); ?>" 
                data-lname="<?php echo htmlspecialchars($bookRow['last_name'], ENT_QUOTES); ?>" 
                data-number="<?php echo htmlspecialchars($bookRow['phone_number'], ENT_QUOTES); ?>" 
                data-email="<?php echo htmlspecialchars($bookRow['email'], ENT_QUOTES); ?>" 
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

        <div class="titles">
            <h2>Healthcare Doctors</h2>
        </div>
        

        <div class="health-div">
            
            <form class="add-doctors-form" method="post" action="../../ADMIN_CONTROLS/add_doctors.php" enctype="multipart/form-data">
                <label>
                    Doctor's Picture
                    <input type="file" id="docimage" name="docimage">
                </label>
                <label>
                    Doctor's Name
                    <input type="text" id="docname" name="docname" placeholder="Doctor's Name" required>
                </label>

                <label>
                    Doctor's Specialization
                    <input type="text" id="docfield" name="docfield" placeholder="Specialization" required>
                </label>

                <label>
                    Doctor's Experience
                    <input type="number" id="docexp" name="docexp" placeholder="Years of Experience" required>
                </label>

                <label>
                    Doctor's Fee
                    <input type="number" id="docfee" name="docfee" placeholder="Consultation Fee (₱)" required>
                </label>

                <button type="submit" id="docadd-btn">Add doctor</button>
            </form>
        </div>

        <div class="listings doctor-list">

            <?php foreach($doctorInfo as $row ): ?> 
            <div class="doc-card"
                data-docname="<?php echo htmlspecialchars($row['doctor_name'], ENT_QUOTES); ?>"  
                data-docfor="<?php echo htmlspecialchars($row['doctor_for'], ENT_QUOTES); ?>"
                data-docexp="<?php echo htmlspecialchars($row['exp'], ENT_QUOTES); ?>"
                data-docfee="<?php echo htmlspecialchars($row['fee'], ENT_QUOTES); ?>"
                >

                <div class="card-options">
                    <form action="../../ADMIN_CONTROLS/delete_doctors.php" method="post" onsubmit="return confirmDelete()">
                        <input type="hidden" name="id" value="<?php echo $row['doctor_id']; ?>">
                        <button type="submit" class="card-buttons"><img src="../../admin-resources/trash.png"></button>
                    </form>

                    <button class="card-buttons" id="editBtn"><img src="../../admin-resources/edit.png"></button>
                </div>

                <img id="docProfile" 
                src="../../ADMIN_CONTROLS/doctor_images/<?php echo htmlspecialchars($row['doctor_image'] 
                ?? 'default_image.png', ENT_QUOTES); ?>" 
                alt="doctor profile" 
                onerror="this.src='../../ADMIN_CONTROLS/doctor_images/default_image.png'">

                <h3 id="card-name"><?php echo htmlspecialchars($row['doctor_name'], ENT_QUOTES); ?></h3>
                <p id="card-spec"><?php echo htmlspecialchars($row['doctor_for'], ENT_QUOTES); ?></p>
                <p id="card-exp"><?php echo htmlspecialchars($row['exp'], ENT_QUOTES); ?></p>
                <p id="card-fee">₱<?php echo htmlspecialchars($row['fee'], ENT_QUOTES); ?></p>

            </div>
            <?php endforeach; ?> 
        </div>

    </div>

    <div class="card-popup">
        <img src="../../admin-resources/close.png" alt="close" id="closeBtn">

        <form id="card-popup-form" action="../../ADMIN_CONTROLS/update_doctors.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['doctor_id']; ?>">
            <input id="docname" type="text" name="docname" class="card-input" placeholder="Doctor name" required value="<?php echo htmlspecialchars($row['doctor_name']); ?>">

            <input id="docfor" type="text" name="docfor" class="card-input" placeholder="Doctor specialization" required value="<?php echo htmlspecialchars($row['doctor_for']); ?>">

            <input id="docexp" type="number" name="docexp" class="card-input" placeholder="Experience" required value="<?php echo htmlspecialchars($row['exp']); ?>">
            <input id="docfee" type="number" name="docfee" class="card-input" placeholder="Doctor Fee" required value="<?php echo htmlspecialchars($row['fee']); ?>">

            <button type="submit" id="card-update">Update</button>
        </form>
            
    </div>

    <div class="confirm-box del-booking">
            <p>Remove booking?</p>
            <div class="wrapper">
                <form id="confirm-form" action="../../ADMIN_CONTROLS/remove_booking.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $bookRow['book_id']; ?>">
                    <button type="submit" class="confirm-buttons conf-yes">Yes, delete</button>

                </form>
                <button class="confirm-buttons conf-can">Cancel</button>
            </div>
    </div>
    <script src="../adminControlScript.js"></script>
    <script src="../confirm.js"></script>
    <script src="../updateHandler.js"></script>


</body>
</html>