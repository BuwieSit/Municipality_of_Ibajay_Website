<?php
  session_start();
  include '../conn.php'; 

  $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
  $result = mysqli_query($conn, $sql);

  $newsItems = [];
  while($row = mysqli_fetch_assoc($result)) {
      $newsItems[] = $row;
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../z-resources/ibajay_logo.png">
    
    <link rel="stylesheet" href="newsStyle.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="../footerGlobal.css">
    <title>Municipality Of Ibajay</title>
</head>
<body class="page">

   <header>
      <script src="../renderHeader.js"></script>
    </header>

    <div class="navsnews">
        <ul>
            <a href= "../News_page/announcement.html"><li>Announcements</li></a>
            <a href= ""><button id="newsButtons"><span>News</span></button></a>
        </ul>
        
    </div>
 
    <div class="box">
      <div class="news1">
                <img class="news-image" src="../z-resources/news1.png" alt="news1">
      </div>
      <div class="headline">
        <strong>PNP, LTO ag iba pang ahensiya it gobyerno, nagatingub it pwersa agud nga mapabaskog pa ro road safety sa Aklan</strong>
      </div>
      <div class="ndnt-bar">
      <div class="name">
        Bombo Merani Esparcia
      </div>
      <div class="dnt">
        May 24, 2025 | 11:28 AM
      </div>
      </div>
    </div>



    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->

    <!-- SUB NEWS -->
  <div class="sub-news">

      <?php foreach($newsItems as $row): ?>
        <div class="sub-box" 
            data-headline="<?php echo htmlspecialchars($row['headline'], ENT_QUOTES); ?>" 
            data-date="<?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?>" 
            data-desc="<?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?>">
          <div class="news2">
            <img class="news-image2" src="../z-resources/news_thumb.png" alt="news2">
          </div>
          <div class="sub-headline">
            <strong><?php echo htmlspecialchars($row['headline']); ?></strong>
          </div>
          <div class="date">
            <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?>
          </div>
        </div>
      <?php endforeach; ?>
  </div>

    <!-- POPUP -->
      <div class="news-desc-popup" id="newsPopup">
        <div class="head-text">
          <h3 id="popupHeadline"></h3>
          <p id="popupDate"></p>
        </div>
        <div class="news-desc">
          <p id="popupDesc"></p>
        </div>
        <button id="popup-close"><img src="../z-resources/close-line.png"></button>
      </div>


      <footer>
        <div class="footer-column">
          <section class="logo-text">
            <img src="../z-resources/ibajay_logo.png" />
            <h1 id="footerTitle">Municipality of Ibajay</h1>
          </section>
          <section class="tab-list">

            <ul>
                <p class="list-title">Services</p>
                <li><a href="./Services_page/permits.html">Business Registration and Permits</a></li>
                <li><a href="./Services_page/healthcare.html">Healthcare</a></li>
                <li><a href="./Services_page/tourism.html">Tourism</a></li>

            </ul>

            <ul>
                <p class="list-title">News</p>
                <li><a href="./News_page/announcement.html">Announcements</a></li>
                <li><a href="./News_page/news.php">Events</a></li>
            </ul>
          </section>
        </div>
        <div class="footer-column">
            <div class="terms-wrapper">
              <a><p>Terms of Service</p></a>
              <a><p>Privacy Policy</p></a>
            </div>
            <p id="copyright">Copyright @ 2025 Team 1. All Rights Reserved.</p>
        </div>
        <div class="footer-column">
            <p id="contact-title">Contact Us</p>
              <div class="contact-list">
                <section class="contact-sections">
                  <img src="../z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/profile.php?id=100077757488639" target="_blank">LGU Ibajay</a>
                </section>
                <section class="contact-sections">
                    <img src="../z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/LGUIbajayInfoBoard" target="_blank">LGU Ibajay Information Board</a>
                </section>
                <section class="contact-sections">
                    <img src="../z-resources/contact.png"><p class="contact-text cont-number" >(036) 289-2025</p>
                </section>
                <section class="contact-sections">
                    <img src="../z-resources/email.png"><p class="contact-text">lguibajay@yahoo.com</p>
                </section>
              </div>
        </div>
    </footer>

<!-- Script and POPUP stays at the bottom of the page -->
    <div class="acc-popup">
      <div class="slider">
        <div class="slider-wrapper">
          <img src="../z-resources/ibajay_logo.png" />
          <h1 id="headerTitle">Municipality of Ibajay</h1>
        </div>
        <button class="sign-button log-button toggle"></button>
        <img class="admin-access" src="../z-resources/admin.png" alt="adm">
      </div>

      <div class="popup-wrapper pleft">
        <form class="popup-form reg-form" autocomplete="off">

          <input
            type="email"
            id="email"
            name="email"
            placeholder="email"
            required
          />

          <button type="submit" class="sign-button reg-button">Subscribe</button>
        </form>
      </div>
      <div class="popup-wrapper pright">
        <div class="text-container">
          <p>Subscribe to our newsletter for updates about the Municipality of Ibajay, Aklan's events, recommended destinations, new handicrafts, local delicacies, available services, etc. </p>
          </div>
      </div>
    </div>

  <script src="newsScript.js"></script>
  <script src="../globalScript.js"></script>
</body>
</html>