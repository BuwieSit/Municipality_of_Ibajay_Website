<?php
  session_start();
  include '../conn.php'; 

  $sql = "SELECT * FROM news_table ORDER BY created_at DESC";
  $result = mysqli_query($conn, $sql);


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
        <div class="header-logo-cont">
            <a href="../index.html">
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
                <a href="../News_page/news.html"><li><span class="underline">News</span></li></a>
                <a href="../Contacts_page/contact.html"><li>Contacts</li></a>
                <button id="accButton">Account</button>
            </ul>
        </div>
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

<div class="sub-news">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="sub-box">
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
      <?php endwhile; ?>




    <!-- THIS IS SUB NEWS -->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
    <!-- THIS IS SUB NEWS-->
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
                <li><a href="./News_page/news.html">Events</a></li>
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
        <button class="sign-button log-button toggle">
          <p>Login</p>
        </button>
        <a href="../admin.html"><sub id="adminText">sign in as admin?</sub></a>
      </div>
      <div class="popup-wrapper pleft">
        <form class="popup-form reg-form" autocomplete="off">
          <input
            type="text"
            id="username"
            name="username"
            placeholder="username"
            required
          />

          <input
            type="email"
            id="email"
            name="email"
            placeholder="email"
            required
          />

          <input
            type="password"
            id="password"
            name="password"
            placeholder="password"
            required
          />

          <button type="submit" class="sign-button reg-button">Sign up</button>
        </form>
      </div>
      <div class="popup-wrapper pright">
        <form class="popup-form login-form" autocomplete="off">
          <input
            type="text"
            id="username"
            name="username"
            placeholder="username"
            required
          />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="password"
            required
          />

          <button type="submit" class="sign-button reg-button">Sign in</button>
          <p class="forgot-pass">Forgot password?</p>
        </form>
      </div>
    </div>

  <script src="newsScript.js"></script>
  <script src="../globalScript.js"></script>
</body>
</html>