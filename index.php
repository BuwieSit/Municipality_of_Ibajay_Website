<?php
  session_start();
  include './conn.php'; 

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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="z-resources/ibajay_logo.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="footerGlobal.css">
    <title>Municipality Of Ibajay</title>
  </head>
  <body>
    <div class="loader"></div>
    <header>
      <div class="header-logo-cont">
        <a href="index.html">
          <div class="left-wrapper">
            <img src="../z-resources/ibajay_logo.png" />
            <h1 id="headerTitle">Municipality of Ibajay</h1>
          </div>
          
        </a>
      </div>

      <div class="nav-list">
        <ul>
          <a href="About_page/about.html"><li>About</li></a>
          <a href="Services_page/services.html"><li>Services</li></a>
          <a href="News_page/news.php"><li>News</li></a>
          <a href="Contacts_page/contact.html"><li>Contacts</li></a>
          <button id="accButton">Account</button>
        </ul>
      </div>
    </header>


    <section class="parallax top-wrapper">
      <div class="parallax-inner top-inner">
        <video id="videobg" autoplay muted loop>
          <source src="./z-resources/ibajay_video.mp4" type="video/mp4"/>
        </video>
        <p><a href="https://www.instagram.com/reel/CiyWNYYhNwz/" target="_blank">Source: musyonsaibajay Instagram</a></p>
      </div>
    </section>
    <div class="main-container">
          <img id="main-logo" src="./z-resources/ibajay_logo.png" alt="logo">
          <h1 class="main-title">IBAJAY</h1>
          <p class="main-motto">Paradise in Seclusion</p>
    </div>

<!-- EXPERIMENT -->
<!-- EXPERIMENT -->
<div class="carousel">

        <div class="list">
       

          <?php foreach($newsItems as $row): ?>
            <div class="item" style="background-image: url('./z-resources/news_thumb.png"
            data-headline="<?php echo htmlspecialchars($row['headline'], ENT_QUOTES); ?>" 
            data-desc="<?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?>"
            >
                <div class="content">
                    <div class="title"><?php echo htmlspecialchars($row['headline']); ?></div>
                    <div class="name"><?php echo htmlspecialchars($row['description'], ENT_QUOTES); ?></div>
                    <div class="btn">
                        <button><a href="News_page/news.php">See More</a></button>
                        
                    </div>
                </div>
            </div>
            <?php endforeach; ?>   
        </div>

        <!--next prev button-->
        <div class="arrows">
            <button class="prev"><</button>
            <button class="next">></button>
        </div>


        <!-- time running -->
        <div class="timeRunning"></div>

    </div>

    <script src="hero.js"></script>

 <!-- EXPERIMENT -->
 <!-- EXPERIMENT -->

      <div class="hotlines-container">
        <h1>Ibajay Emergency Hotlines</h1>

        <div class="hotlines-wrapper">
          <div class="hotlines">
              <h3>Covid hotline</h3>
              <section>
                <img src="../z-resources/h-resources/virus.png" alt="phone">
                <ul>
                  <li class="hotlists cont-number">0918 559 3406</li>
                  <li class="hotlists cont-number">0947 890 6632</li>
                </ul>
              </section>
          </div>

          <div class="hotlines">
              <h3>Ibajay District Hospital</h3>
              <section>
                <img src="../z-resources/h-resources/pulse.png" alt="phone">
                <ul>
                  <li class="hotlists cont-number">0918 559 3406</li>
                  <li class="hotlists cont-number" >0947 890 6632</li>
                </ul>
              </section>
          </div>

          <div class="hotlines">
              <h3>Ibajay MDRRMO</h3>
              <section>
                <img src="../z-resources/h-resources/disaster.png" alt="phone">
                <ul>
                  <li class="hotlists cont-number">0918 559 3406</li>
                  <li class="hotlists cont-number">0947 890 6632</li>
                </ul>
              </section>
          </div>

          <div class="hotlines">
              <h3>Ibajay PNP</h3>
              <section>
                <img src="../z-resources//h-resources/police.png" alt="phone">
                <ul>
                  <li class="hotlists cont-number">0918 559 3406</li>
                  <li class="hotlists cont-number" >0947 890 6632</li>
                </ul>
              </section>
          </div>

           <div class="hotlines" id="bigHotline">
              <h3>Mental Health Crisis</h3>
              <section>
                <img src="../z-resources/h-resources/mental.png" alt="phone">
                <ul>
                  <li class="hotlists cont-number">0918 559 3406</li>
                  <li class="hotlists cont-number">0947 890 6632</li>
                </ul>
              </section>
          </div>
        </div>

      </div>



    <div class="container-box main-carousel">

      <div class="carousel-content">
        <h1><a href="./Services_page/tourism.html">Explore Ibajay</a></h1>
      </div>

      <div class="carousel-wrapper" style="--quantity: 8;">
        <div class="image-container" style="--position: 1;"><img src="./z-resources/Tourism/Scenic View 2/view2.png"></div>
        <div class="image-container"style="--position: 2;"><img src="./z-resources/Tourism/Scenic View 2/view.png"></div>
        <div class="image-container"style="--position: 3;"><img src="./z-resources/Tourism/Scenic View 2/view3.png"></div>
        <div class="image-container"style="--position: 4;"><img src="./z-resources/Tourism/Scenic View 2/view4.png"></div>
        <div class="image-container"style="--position: 5;"><img src="./z-resources/Tourism/Food/food.png"></div>
        <div class="image-container"style="--position: 6;"><img src="./z-resources/Tourism/Place/church.png"></div>
        <div class="image-container"style="--position: 7;"><img src="./z-resources/Tourism/Food/food1.png"></div>
        <div class="image-container"style="--position: 8;"><img src="./z-resources/Tourism/Food/food2.png"></div>

      </div>
    </div>

  <div class="margin"></div>


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
                  <img src="./z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/profile.php?id=100077757488639" target="_blank">LGU Ibajay</a>
                </section>
                <section class="contact-sections">
                    <img src="./z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/LGUIbajayInfoBoard" target="_blank">LGU Ibajay Information Board</a>
                </section>
                <section class="contact-sections">
                    <img src="./z-resources/contact.png"><p class="contact-text cont-number" >(036) 289-2025</p>
                </section>
                <section class="contact-sections">
                    <img src="./z-resources/email.png"><p class="contact-text">lguibajay@yahoo.com</p>
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
        <img class="admin-access" src="./z-resources/admin.png" alt="adm">
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

    <script src="script.js"></script>
    <script src="globalScript.js"></script>
  </body>
</html>
