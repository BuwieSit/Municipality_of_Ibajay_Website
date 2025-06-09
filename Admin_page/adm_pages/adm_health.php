<?php
    session_start();
    include '../../conn.php'; 

    $sql = "SELECT * FROM doctors_list";
    $result = mysqli_query($conn, $sql);

//     $bookings = [];
//     while($row = mysqli_fetch_assoc($result)) {
//       $bookings[] = $row;
//   }
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
        <h2>Healthcare Doctors/Appointments</h2>
    </header>

    <div class="health-main-cont">

        <div class="book-list">

            <div class="booking">
                <div class="sched-time"><p>8 am</p></div>
                <div class="doctor-info">
                    <h4>Doctor name</h4>
                    <p>specialization</p>
                </div>
            </div>
        </div>


        <div class="health-div">
            <form class="add-doctors-form" method="post" action="../../ADMIN_CONTROLS/add_doctors.php" >
                <label>
                    Doctor Name
                    <input type="text" id="docname" name="docname" placeholder="Doctor's Name" required>
                </label>

                <label>
                    Doctor Specialization
                    <input type="text" id="docfield" name="docfield" placeholder="Specialization" required>
                </label>

                <label>
                    Experience
                    <input type="number" id="docexp" name="docexp" placeholder="Years of Experience" required>
                </label>

                <label>
                    Fee
                    <input type="number" id="docfee" name="docfee" placeholder="Consultation Fee (₱)" required>
                </label>

                <button type="submit" id="docadd-btn">Add doctor</button>
            </form>
        </div>
    </div>

<script src="../adminControlScript.js"></script>



</body>
</html>