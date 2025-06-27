window.addEventListener('DOMContentLoaded', () => {


const header = document.querySelector('.head');

function routing() {
    const path = window.location.pathname;
    const depth = path.split('/').filter(Boolean).length;


  let prefix = './';
  if (depth === 2) prefix = '../';

     const headerContent = `
        <div class="head-wrapper left">
            <h1 id='headTitle'>Dashboard</h1>
        </div>
        <div class="head-wrapper right">
            <img src="../../admin-resources/settings.png" alt="settings" id="admSettings" class="adm-settings">
            <h2 class="admin-username" id="adminUsername">Admin</h2>
            <img src="../../admin-resources/profile.png" alt="profile" id="profile" class="adm-profile">
            <div class="settings-popup" id="settingsPopup">
                <ul class="settings-list">
                    <li>Profile</li>
                    <li>Settings</li>
                    <li>Log out</li>
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

function bindNewsFormSubmit() {
    const popup = document.querySelector('.news-action-popup');
    const form = document.querySelectorAll('.news-action-form');
    const popupBox = document.getElementById('addedPopup');

    if (!form) return;
    form.forEach(addf => {
        addf.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(addf);

        try {
            const response = await fetch(addf.action, {
                method: 'POST',
                body: formData,
            });

            const result = await response.text();

            if (result.trim() === "success") {
                popupBox.style.display = 'block';
                popup.style.display = 'none';

                setTimeout(() => {
                    popupBox.style.display = 'none';
                    setTimeout(() => window.location.reload(), 1000);
                }, 1000);

                
            } else {
                alert("Error: " + result);
            }
        } catch (err) {
            console.error("AJAX error:", err);
        }
        });
    });
}

    const params = new URLSearchParams(window.location.search);
    if (params.get("status") === "success") {
        const addpopup = document.getElementById("addedPopup");
        if (addpopup) addpopup.style.display = "block";

        history.replaceState({}, document.title, window.location.pathname);
    }

    const settingPopup = document.getElementById('settingsPopup');
    const settings = document.getElementById('admSettings');
    settings.addEventListener('mouseover', () => {
        if (settingPopup.style.opacity = '0') {
            settingPopup.style.opacity = '1' 
            settingPopup.style.pointerEvents = 'all'
        }
        else {
            settingPopup.style.opacity = '0';
            settingPopup.style.pointerEvents = 'none'
        }
    });

    settings.addEventListener('click', () => {
        settingPopup.style.pointerEvents = 'none'
        settingPopup.style.opacity = '0';
    });


    document.addEventListener('click', (e) => {

        const popup = document.querySelector('.news-action-popup');
        const newsItem = e.target.closest('.admin-news-item');
        
        // === ADD NEWS ===
        if (e.target && e.target.classList.contains('add-news-btn')) {

            popup.innerHTML = `
                <form class="news-action-form add-form" action="../../ADMIN_CONTROLS/news_add.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="headline-image"> 
                    <input type="text" name="headline" placeholder="Headline" required>
                    <textarea name="headline-description" placeholder="Description" required></textarea>
                        <div class="section-wrapper">
                            <label>
                                <input class="section-buttons" type="checkbox" value="topnews" name="top_news">Top news
                            </label>

                            <label class="note-wrapper">
                                <input class="section-buttons" type="checkbox" value="featured" name="featured">Featured
                                <p class="section-note">This will overwrite the current featured news</p>
                            </label>
                        </div>

                    
                    
                    <button id="actionBtn" type="submit">Add</button>
                    <button type="button" id="closePopup">Cancel</button>
                </form>
            `;

            // bindNewsFormSubmit();

            popup.style.display = 'block';
            popup.style.pointerEvents = 'all';

            document.getElementById('closePopup').addEventListener('click', () => {
                popup.style.display = 'none';
                popup.style.pointerEvents = 'none';
            });
        }

        
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
                        <div class="section-wrapper">
                            <label>
                                <input class="section-buttons" type="checkbox" value="topnews"  name="news_section[]">Top news
                            </label>

                            <label class="note-wrapper">
                                <input class="section-buttons" type="checkbox" value="featured"  name="news_section[]">Featured
                                <p class="section-note">This will overwrite the current featured news</p>
                            </label>
                        </div>
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
                <form class="news-action-form a-add-form" action="../../ADMIN_CONTROLS/announce_handler.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <label>What: <input type="text" name="a_what" placeholder="What" required></label>
                    <label>When: <input type="date" name="a_date"></label>
                    <label>Where: <input type="text" name="a_loc" placeholder="Where"></label>
                    <label>Why: <input type="text" name="a_why" placeholder="Why" required></label>
                    <button id="actionBtn" type="submit">Add</button>
                    <button type="button" id="closePopup">Cancel</button>
                </form>
            `;

            bindNewsFormSubmit();

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
                        <select name="d_dept" required>
                            <option value="CivilRegistry">Civil Registry</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Health Office">HealthOffice</option>
                            <option value="Treasury">Treasury</option>
                            <option value="BusinessPermits">BusinessPermits</option>
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
                            <option value="CivilRegistry">Civil Registry</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Health Office">HealthOffice</option>
                            <option value="Treasury">Treasury</option>
                            <option value="BusinessPermits">BusinessPermits</option>
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


          // ADD
    if (e.target && e.target.closest('.admin-add-wrapper')) {
        popup.innerHTML = `
            <form class="news-action-form" action="../../ADMIN_CONTROLS/tourismHandler.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">

                <label>Image: <input type="file" name="t_image" accept="image/*" required></label>

                <label>Title: <input type="text" name="t_title" required></label>
                
                <label>Description: <textarea name="t_desc" required></textarea></label>
                
                <label>Section: 
                    <select name="t_tag" required>
                        <option value="localDeli">localDeli</option>
                        <option value="sites">sites</option>
                        <option value="attractions">attractions</option>
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

    // EDIT
    if (e.target && e.target.classList.contains('t-edit')) {
        const row = e.target.closest('.t_row');
        const id = row.dataset.t_id;
        const name = row.dataset.t_name;
        const desc = row.dataset.t_desc;
        const tag = row.dataset.t_tag;
        const image = row.dataset.t_image;

        popup.innerHTML = `
            <form class="news-action-form" action="../../ADMIN_CONTROLS/tourismHandler.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="t_id" value="${id}">

                <label>Title: <input type="text" name="t_title" value="${name}" required></label>
                <label>Description: <textarea name="t_desc" required>${desc}</textarea></label>
                <label>Section: 
                    <select name="t_tag" required>
                        <option value="localDeli" ${tag === 'localDeli' ? 'selected' : ''}>localDeli</option>
                        <option value="sites" ${tag === 'sites' ? 'selected' : ''}>sites</option>
                        <option value="attractions" ${tag === 'attractions' ? 'selected' : ''}>attractions</option>
                    </select>
                </label>

                <label>Replace Image: 
                    <input type="file" name="t_image" accept="image/*">
                    ${image ? `<small>Current: <em>${image}</em></small>` : ''}
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

    // VIEW
    if (e.target && e.target.classList.contains('t-view')) {
        const row = e.target.closest('.t_row');
        const name = row.dataset.t_name;
        const desc = row.dataset.t_desc;
        const tag = row.dataset.t_tag;
        const image = row.dataset.t_image;
        popup.innerHTML = `
            <div class="news-action-form t-view-form">
                <p>Filename: ${name}</p>
                <p>Description: ${desc}</p>
                <p>Tag: ${tag}</p>
                ${image ? `<img class="t-image" id="tImage" src="../../ADMIN_CONTROLS/tourism_uploads/${image}" alt="${name}" style="max-width: 200px;">` : '<p>No image uploaded.</p>'}
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

    // DELETE
    if (e.target && e.target.classList.contains('t-delete')) {
        const row = e.target.closest('.t_row');
        const id = row.dataset.t_id;
        const name = row.dataset.t_name;

        popup.innerHTML = `
            <form class="news-action-form" action="../../ADMIN_CONTROLS/tourismHandler.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="t_id" value="${id}">
                <p>Are you sure you want to delete:</p>
                <h3>${name}</h3>
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


    