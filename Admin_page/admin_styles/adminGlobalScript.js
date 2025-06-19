window.addEventListener('DOMContentLoaded', () => {

    const header = document.querySelector('.head');

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
                    <li>User settings</li>
                </ul>
            </div>
        </div>`;


if (header) {
    header.innerHTML = headerContent;
  } else {
    console.error("No <header> element found on the page.");
  }
}

routing();


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


document.addEventListener('click', (e) => {
    const popup = document.querySelector('.news-action-popup');
    const newsItem = e.target.closest('.admin-news-item');



    // === EDIT NEWS ===
    if (e.target && e.target.classList.contains('edit-news-btn')) {
        const newsId = newsItem.dataset.id;
        const headline = newsItem.dataset.headline;
        const description = newsItem.dataset.description;

        popup.innerHTML = `
            <form class="news-action-form news-edit-form" method="post" action="../../ADMIN_CONTROLS/update_news.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="${newsId}">
                <input type="file" name="headline_image"> 
                <input type="text" name="headline" required class="headline-box" value="${headline}">
                <textarea name="description" rows="6" required class="description-box">${description}</textarea>
                <button id="actionBtn" type="submit">Update</button>
                <button type="button" id="closePopup">Cancel</button>
            </form>
        `;

        popup.style.display = 'block';
        popup.style.pointerEvents = 'all';

        document.getElementById('closePopup').addEventListener('click', () => {
            popup.style.display = 'none';
            popup.style.pointerEvents = 'none';
        });
    }

    // === VIEW NEWS ===
    if (e.target && e.target.classList.contains('view-news-btn')) {
        const headline = newsItem.dataset.headline;
        const description = newsItem.dataset.description;

        popup.innerHTML = `
            <div class="news-action-form news-edit-form">
                <div class="headline-cont">
                    <h1 id="headlineTitle">${headline}</h1>
                </div>
                <div class="description-cont">
                    <p id="news-description">${description}</p>
                </div>
                <button type="button" id="closePopup">Close</button>
            </div>
        `;

        popup.style.display = 'block';
        popup.style.pointerEvents = 'all';

        document.getElementById('closePopup').addEventListener('click', () => {
            popup.style.display = 'none';
            popup.style.pointerEvents = 'none';
        });
    }

    // === ADD NEWS ===
    if (e.target && e.target.classList.contains('add-news-btn')) {
        // const newsId = newsItem.dataset.id;
        // const headline = newsItem.dataset.headline;
        // const description = newsItem.dataset.description;

        popup.innerHTML = `
            <form class="news-action-form add-form" action="../../ADMIN_CONTROLS/news_add.php" method="post" enctype="multipart/form-data">
                <input type="file" name="headline-image"> 
                <input type="text" name="headline" placeholder="Headline" required>
                <textarea name="headline-description" placeholder="Description" required></textarea>
                <button type="submit">Add</button>
                <button type="button" id="closePopup">Cancel</button>
            </form>
        `;

        popup.style.display = 'block';
        popup.style.pointerEvents = 'all';

        document.getElementById('closePopup').addEventListener('click', () => {
            popup.style.display = 'none';
            popup.style.pointerEvents = 'none';
        });
    }


    if (e.target && e.target.classList.contains('delete-news-btn')) {
        const newsId = newsItem.dataset.id;
        const headline = newsItem.dataset.headline;
        const description = newsItem.dataset.description;
        popup.innerHTML = `
            <form class="news-action-form delete-form" action="../../ADMIN_CONTROLS/delete_news.php" method="post">

                <input type="hidden" name="id" value="${newsId}">
                <p id="delTitle">Do you really want to delete (Not recoverable):</p>
                <div class="headline-cont">
                    <h1 id="headlineTitle">${headline}</h1>
                </div>
                <button type="submit" id="deleteBtn">Delete</button>
                <button type="button" id="closePopup" class="cancelBtn">Cancel</button>
            </form>
        `
        popup.style.display = 'block';
        popup.style.pointerEvents = 'all';

        document.getElementById('closePopup').addEventListener('click', () => {
            popup.style.display = 'none';
            popup.style.pointerEvents = 'none';
        });
    }


});







});


    