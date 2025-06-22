const foot = document.querySelector('footer');

function routing() {
  const path = window.location.pathname;
  const depth = path.split('/').filter(Boolean).length;

  // Define link prefixes depending on the depth
  let prefix = './';
  if (depth === 2) prefix = '../';
  if (depth >= 3) prefix = '../../';

  const footContents = `
       <footer class = "footer" id="foot">
          <div class="footer-row ffrow">
            <section class="logo-text">
                <img id="fLogo" src= "${prefix}z-resources/ibajay_logo.png"/>
                <h1 id="footerTitle">Municipality of Ibajay</h1>
            </section>
            <section class = "paragraph">
                <p>Ibajay lies in the northwest section of Aklan province on Panay Island. It is 
                bounded on the north by the Sibuyan Sea, east by Tangalan, west by Nabas, and south
                 by Antique. The distance from Kalibo, the capital of Aklan, is 34 kilometres (21 mi) 
                 and takes 45 minutes to one hour by road transport. Its road networks are composed of 
                 16 kilometres (9.9 mi) of National Road, 32.918 kilometres (20.454 mi) of Provincial 
                 Roads, and 75.430 kilometres (46.870 mi) of Barangay Road.
                 </p>
            </section>
          </div>
          <div class="footer-row fsrow">
            <div class="frow-list">

              <div class="frow-wrapper">
                <p class="frow-titles">Useful Links</p>
                <ul>
                  <li><a href="${prefix}News_page/news.html">News</a></li>
                  <li><a href="${prefix}Services_page/services.html">Services</a></li>
                  <li><a href="${prefix}About_page/about.html">About</a></li>
                  <li><a href="${prefix}Contacts_page/contact.html">Contact</a></li>
                </ul>
              </div>
             
              <div class="frow-wrapper">
                <p class="frow-titles">Services</p>
                <ul>
                  <li><a href="${prefix}Services_page/permits.html">Business Permits</a></li>
                  <li><a href="${prefix}Services_page/healthcare.html">Healthcare</a></li>
                  <li><a href="${prefix}Services_page/tourism.html">Tourism</a></li>
                </ul>
              </div>

              <div class="frow-wrapper">
                <p class="frow-titles">Updates</p>
                <ul>
                  <li><a href="${prefix}News_page/announcement.html">Announcements</a></li>
                  <li><a>Projects</a></li>
                  <li><a>Bulletins</a></li>
                  <li><a>Advisories</a></li>
                </ul>
              </div>


          </div>

            <div class="frow-sub-cont">
                <p class="frow-titles">Subscribe</p>
                <p>Join our community to receive updates!</p>
                <form class="sub-form">
                    <button class="sub-button">SUBSCRIBE</button>
                </form>
                
            </div>
          
          </div>

          <div class="footer-row ftrow">
              <section class="ftrow-sect ftrow-left">
                  <p class="ftrow-title">Ibajay.</p>
                  <ul class="terms-list">
                    <li><a>Privacy Policy</a><li>
                    <li><a>Terms of Service</a><li>
                    <li><a>Cookie Policy</a><li> 
                  </ul>
              </section>

              <section class="ftrow-sect ftrow-right">
                  <ul class="socials-list">
                    <li><a><img src= "${prefix}z-resources/phone.png"></a></li>
                    <li><a><img src= "${prefix}z-resources/facebook.png"></a></li>
                    <li><a><img src= "${prefix}z-resources/email.png"></a></li>
                  </ul>

                  <p class="copyright">&copy2025 Team 1 Web Development Team. All rights reserved.</p>
              </section>
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


 