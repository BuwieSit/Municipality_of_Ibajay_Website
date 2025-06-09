<?php
  session_start();
  include '../conn.php'; 

  $sql = "SELECT * FROM doctors_list";
  $result = mysqli_query($conn, $sql);

  $doctorInfo = [];
  while($row = mysqli_fetch_assoc($result)) {
      $doctorInfo[] = $row;
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../z-resources/ibajay_logo.png">
    <title>Appoinment</title>
    <link rel="stylesheet" href="appointmentStyle.css">
    <link rel="stylesheet" href="../global.css"> 
</head>
<body>


  <header>
        <div class="header-logo-cont">
            <a href="../index.php">
            <div class="left-wrapper">
                <img src="../z-resources/ibajay_logo.png">
                <h1 id="headerTitle">Municipality of Ibajay</h1>
            </div>       
            </a>
        </div>

        <div class="nav-list">
            <ul>
                <a href="../About_page/about.html"><li>About</li></a>
                <a href="../Services_page/services.html"><li>Services</li></a>
                <a href="../News_page/news.php"><li>News</li></a>
                <a href="../Contacts_page/contact.html"><li>Contacts</li></a>
                <button id="accButton">Account</button>
            </ul>
        </div>
    </header>

    <div class="doctors-list">

    <?php foreach($doctorInfo as $row ): ?> 
    
        <div class="doctor-cont"
            data-docname="<?php echo htmlspecialchars($row['doctor_name'], ENT_QUOTES); ?>"  
            data-docfor="<?php echo htmlspecialchars($row['doctor_for'], ENT_QUOTES); ?>"
            data-docexp="<?php echo htmlspecialchars($row['exp'], ENT_QUOTES); ?>"
            data-docfee="<?php echo htmlspecialchars($row['fee'], ENT_QUOTES); ?>"
        >
          <div class="docleft-wrapper">
            <img id="docProfile" src="" alt="doctor profile">
            <div class="doctor-info">
              <h4 id="docname"><?php echo htmlspecialchars($row['doctor_name'], ENT_QUOTES); ?></h4>
              <p id="docpost"><?php echo htmlspecialchars($row['doctor_for'], ENT_QUOTES); ?></p>
              <p id="docexp"><?php echo htmlspecialchars($row['exp'], ENT_QUOTES); ?></p>
            </div>
          </div>

          <div class="docright-wrapper">
            <div class="schedule-cont">
                <h4 id="schedtitle">Doctor's Fee</h4>
                <p id="docfee">₱<?php echo htmlspecialchars($row['fee'], ENT_QUOTES); ?></p>
            </div>  
            
            <button id="appoint-btn">Book Appointment</button>
          </div>
        </div>
    <?php endforeach; ?> 
    </div>

    <div class="doctor-popup">
      <div class="pop-cont popleft">
          <h4>Ibajay District Hospital</h4>

      </div>
      <div class="pop-cont popright">

          <form autocomplete="off" class="book-form" action="book_appointment.php" method="post">
              <h4>Appointment with </h4>
              <div class="form-group">
                  <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                  <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
              </div>
              

              <div class="form-group">
                <input type="date" id="appointment_date" name="appointment_date" required>
                <select id="appointment_time" name="appointment_time" required>
                    <option value="">Select Time</option>
                    <option value="08:00">8:00 AM</option>
                    <option value="09:00">9:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="13:00">1:00 PM</option>
                    <option value="14:00">2:00 PM</option>
                    <option value="15:00">3:00 PM</option>
                    <option value="16:00">4:00 PM</option>
                    <option value="17:00">5:00 PM</option>
                </select>
              </div>
              

              <input type="tel" id="contact_number" name="contact_number" placeholder="Phone Number" required>
              <input type="email" id="email" name="email" placeholder="Email (Optional)">

              <button id="bookBtn" type="submit">Book</button>
          </form>

          <script>

              const dateInput = document.getElementById("appointment_date");
              const today = new Date().toISOString().split("T")[0];
              dateInput.min = today;
          </script>
      </div>

    </div>

    <script src="./appointScript.js"></script>
    
</body>
</html>