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
                    <button id="actionBtn" type="submit">Add</button>
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

        // ANNOUNCEMENTS

        const announceItem = e.target.closest('.a_row');

        // === ADD ANNOUNCEMENT ===
        if (e.target && e.target.classList.contains('a-add')) {
            popup.innerHTML = `
                <form class="news-action-form a-edit-form" action="../../ADMIN_CONTROLS/announce_handler.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <label>What: <input type="text" name="a_what" placeholder="What" required></label>
                    <label>When: <input type="date" name="a_date"></label>
                    <label>Where: <input type="text" name="a_loc" placeholder="Where"></label>
                    <label>Why: <input type="text" name="a_why" placeholder="Why" required></label>
                    <button id="actionBtn" type="submit">Add</button>
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

        // === EDIT ANNOUNCEMENT ===
        if (e.target && e.target.classList.contains('a-edit')) {
            const a_id = announceItem.dataset.a_id;
            const a_what = announceItem.dataset.a_what;
            const a_when = announceItem.dataset.a_where;
            const a_where = announceItem.dataset.a_when;
            const a_why = announceItem.dataset.a_why;

            popup.innerHTML = `
                <form class="news-action-form a-edit-form" action="../../ADMIN_CONTROLS/announce_handler.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="announce_id" value="${a_id}">
                    <label>What: <input type="text" name="a_what" value="${a_what}" required></label>
                    <label>When: <input type="date" name="a_date" value="${a_when}"></label>
                    <label>Where: <input type="text" name="a_loc" value="${a_where}"></label>
                    <label>Why: <input type="text" name="a_why" value="${a_why}" required></label>
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

        // === VIEW ANNOUNCEMENT ===
        if (e.target && e.target.classList.contains('a-view')) {
            const a_what = announceItem.dataset.a_what;
            const a_when = announceItem.dataset.a_where;
            const a_where = announceItem.dataset.a_when;
            const a_why = announceItem.dataset.a_why;
            const a_publish = announceItem.dataset.a_publish;

            popup.innerHTML = `
                <div class="news-action-form a-view-form">
                    <h2>${a_what}</h2>
                    <p><strong>When:</strong> ${a_when}</p>
                    <p><strong>Where:</strong> ${a_where}</p>
                    <p><strong>Why:</strong> ${a_why}</p>
                    <p><strong>Published:</strong> ${a_publish}</p>
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

        if (e.target && e.target.classList.contains('a-delete')) {
            const aItem = e.target.closest('.a_row');
            const announceId = aItem.dataset.a_id;
            const what = aItem.dataset.a_what;

            popup.innerHTML = `
            <form class="news-action-form delete-form" action="../../ADMIN_CONTROLS/announce_handler.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="announce_id" value="${announceId}">
                <p id="delTitle">Do you really want to delete (Not recoverable):</p>
                <div class="headline-cont">
                    <h1 id="headlineTitle">${what}</h1>
                </div>
                <button type="submit" id="deleteBtn">Delete</button>
                <button type="button" id="closePopup" class="cancelBtn">Cancel</button>
            </form>
            `;


            popup.style.display = 'block';
            popup.style.pointerEvents = 'all';

            document.getElementById('closePopup').addEventListener('click', () => {
                popup.style.display = 'none';
                popup.style.pointerEvents = 'none';
            });
        }

        
            // SERVICES
        if (e.target && e.target.classList.contains('d-add')) {
            popup.innerHTML = `
                <form class="news-action-form d-edit-form" 
                    action="../../ADMIN_CONTROLS/serviceHandler.php" 
                    method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <label>Document type: <input type="file" name="d_file" required></label>

                    <label>Document name: <input type="text" name="d_name" placeholder="Document name" required></label>
                    <label>Department: 
                        <select name="d_avail" required>
                            <option value="civilreg">Civil Registry</option>
                            <option value="engdept">Engineering</option>
                            <option value="healthoffice">Health Office</option>
                            <option value="treasury">Treasury</option>
                            <option value="business">Business Permits</option>
                        </select>
                    </label>
                    <label>Availability: 
                        <select name="d_avail" required>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                    </label>

                    <button id="actionBtn" type="submit">Add</button>
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


        const row = e.target.closest('.d_row');
        if (e.target && e.target.classList.contains('d-edit')) {
            const docId = row.dataset.d_id;
            const filename = row.dataset.d_filename;
            const fileRef = row.dataset.d_document;
            const dept = row.dataset.d_dept;
            const availability = row.dataset.d_avail;
           

            popup.innerHTML = `
                <form class="news-action-form d-edit-form" 
                    action="../../ADMIN_CONTROLS/serviceHandler.php" 
                    method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="d_id" value="${docId}">

                    <label>Document name: 
                        <input type="text" name="d_name" value="${filename}" required>
                    </label>

                    <label>Replace file (optional): 
                        <input type="file" name="d_file" accept=".pdf,.docx">
                        <small>Current file: <em>${fileRef}</em></small>
                    </label>
                    <label>Department: 
                        <select name="d_dept" required>
                            <option value="Civil Registry">Civil Registry</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Health Office">Health Office</option>
                            <option value="Treasury">Treasury</option>
                            <option value="Business Permits">Business Permits</option>
                        </select>
                    </label>
                    <label>Availability: 
                        <select name="d_avail" required>
                            <option value="Available" ${availability === 'Available' ? 'selected' : ''}>Available</option>
                            <option value="Unavailable" ${availability === 'Unavailable' ? 'selected' : ''}>Unavailable</option>
                        </select>
                    </label>

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

        if (e.target && e.target.classList.contains('d-view')) {
            const docId = row.dataset.d_id;
            const filename = row.dataset.d_filename;
            const availability = row.dataset.d_avail;

            popup.innerHTML = `
                <div class="news-action-form a-view-form">
                    <p>Filename: ${filename}</p>
                    <p>Availability: ${availability}</p>
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

        if(e.target && e.target.closest('.d-delete')) {
            const dItem = e.target.closest('.d_row');
            const docuId = dItem.dataset.d_id;
            const fileName = dItem.dataset.d_filename;

            popup.innerHTML = `
            <form class="news-action-form d-delete-form" action="../../ADMIN_CONTROLS/serviceHandler.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="d_id" value="${docuId}">
                <p id="delTitle">Do you really want to delete (Not recoverable):</p>
                <div class="headline-cont">
                    <h1 id="headlineTitle">${fileName}</h1>
                </div>
                <button type="submit" id="deleteBtn">Delete</button>
                <button type="button" id="closePopup" class="cancelBtn">Cancel</button>
            </form>
            `;


            popup.style.display = 'block';
            popup.style.pointerEvents = 'all';

            document.getElementById('closePopup').addEventListener('click', () => {
                popup.style.display = 'none';
                popup.style.pointerEvents = 'none';
            });
        }



    });

});


    