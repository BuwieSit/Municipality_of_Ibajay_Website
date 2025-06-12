const foot = document.querySelector('footer');

function routing() {
  const path = window.location.pathname;
  const depth = path.split('/').filter(Boolean).length;

  // Define link prefixes depending on the depth
  let prefix = './';
  if (depth === 2) prefix = '../';
  if (depth >= 3) prefix = '../../';

  const footContents = `
       <footer>
            <div class="footer-column">
            <section class="logo-text">
                <img src="${prefix}z-resources/ibajay_logo.png" />
                <h1 id="footerTitle">Municipality of Ibajay</h1>
            </section>
            <section class="tab-list">

                <ul>
                    <p class="list-title">Services</p>
                    <li><a href="${prefix}Services_page/permits.html">Business Registration and Permits</a></li>
                    <li><a href="${prefix}Services_page/healthcare.html">Healthcare</a></li>
                    <li><a href="${prefix}Services_page/tourism.html">Tourism</a></li>

                </ul>

                <ul>
                    <p class="list-title">News</p>
                    <li><a href="${prefix}News_page/announcement.html">Announcements</a></li>
                    <li><a href="${prefix}News_page/news.php">Events</a></li>
                </ul>
            </section>
            </div>
            <div class="footer-column terms-policy">
            <section class="logo-text mobile-logo">
                <img src=".${prefix}z-resources/ibajay_logo.png" />
                <h1 id="footerTitle">Municipality of Ibajay</h1>
            </section>
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
                    <img src="${prefix}z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/profile.php?id=100077757488639" target="_blank">LGU Ibajay</a>
                    </section>
                    <section class="contact-sections">
                        <img src="${prefix}z-resources/facebook.png"><a class="contact-text" href="https://www.facebook.com/LGUIbajayInfoBoard" target="_blank">LGU Ibajay Information Board</a>
                    </section>
                    <section class="contact-sections">
                        <img src="${prefix}z-resources/contact.png"><p class="contact-text cont-number" >(036) 289-2025</p>
                    </section>
                    <section class="contact-sections">
                        <img src="${prefix}z-resources/email.png"><p class="contact-text">lguibajay@yahoo.com</p>
                    </section>
                </div>
            </div>
        </footer>
  `;

  if (foot) {
    foot.innerHTML = footContents;
  } else {
    console.error("No <footer> element found on the page.");
  }
}

routing();


 