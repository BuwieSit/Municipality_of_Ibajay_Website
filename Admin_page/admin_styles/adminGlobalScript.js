window.addEventListener('DOMContentLoaded', () => {

    const settings = document.getElementById('admSettings');
    const popup = document.querySelector('.settings-popup');


    settings.addEventListener('mouseover', () => {
        if (popup.style.opacity = '0') {
            popup.style.opacity = '1' 
            popup.style.pointerEvents = 'all'
        }
        else {
            popup.style.opacity = '0';
            popup.style.pointerEvents = 'none'
        }
    });

    settings.addEventListener('click', () => {
        popup.style.pointerEvents = 'none'
        popup.style.opacity = '0';
    });


function routing() {
  const path = window.location.pathname;
  const depth = path.split('/').filter(Boolean).length;


  let prefix = './';
  if (depth === 2) prefix = '../';

     const headerContent = `
        <div class="head-wrapper left">
            <h1>Dashboard</h1>
        </div>
        <div class="head-wrapper right">
            <img src="../../admin-resources/settings.png" alt="settings" id="admSettings" class="adm-settings">
            <h2 class="admin-username" id="adminUsername">Admin</h2>
            <img src="../../admin-resources/profile.png" alt="profile" id="profile" class="adm-profile">
            <div class="settings-popup" id="settingsPopup">
                <ul class="settings-list">
                    <li>User profile</li>
                    <li>Settings</li>
                </ul>
            </div>
        </div>`;

    const sideContents = `
        <div class="side-navigation">
            <div class="side-wrapper">
                <img src="../../z-resources/ibajay_logo.png" alt="ibajay logo">
                <h2 id="userRole" class="user-role">User Role</h2>
            </div>
            <div class="admin-navlist">
                <section class="admin-sidenav adm-dashboard">
                    <img src="../../admin-resources/dashboard.png">
                    <p>Dashboard</p>
                </section>

                <section class="admin-sidenav adm-news">
                    <img src="../../admin-resources/news.png">
                    <p>Announcements</p>
                </section>

                <section class="admin-sidenav adm-services">
                    <img src="../../admin-resources/services.png">
                    <p>Services</p>
                </section>

                <section class="admin-sidenav adm-tourism">
                    <img src="../../admin-resources/tourism.png">
                    <p>Tourism</p>
                </section>
                <section class="admin-sidenav adm-tourism">
                    <img src="../../admin-resources/health.png">
                    <p>Healthcare</p>
                </section>

                <section class="admin-sidenav adm-transp">
                    <img src="../../admin-resources/reports.png">
                    <p>Transparency</p>
                </section>

                <section class="admin-sidenav adm-feedbacks">
                    <img src="../../admin-resources/feedback.png">
                    <p>Inquiries</p>
                </section>
                
                <section class="admin-sidenav adm-bookings">
                    <img src="../../admin-resources/booking.png">
                    <p>Online Application</p>
                </section>

                <section class="admin-sidenav adm-employees">
                    <img src="../../admin-resources/employees.png">
                    <p>Employees</p>
                </section>
            </div>
        </div>
    `

if (head) {
    head.innerHTML = headContents;
  } else {
    console.error("No <header> element found on the page.");
  }
}

routing();

   

});


    