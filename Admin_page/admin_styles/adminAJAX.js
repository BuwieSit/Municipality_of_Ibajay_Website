window.addEventListener('DOMContentLoaded', () => {

    const navbars = document.querySelectorAll('.admin-sidenav');
    const contentDiv = document.getElementById('adminContent');
    const contentTitle = document.getElementById('headTitle');


    const pageMap = {
        'dashboard': { folder: 'Super_admin', file: 'dashboard.php' }, 
        'announcements': { folder: 'Content_manager', file: 'content.php' },
        'services': { folder: 'Services_manager', file: 'services.php' },
        'tourism': { folder: 'Tourism_coor', file: 'tourism.php' },
        'healthcare': { folder: 'Health_officer', file: 'health.php' },
        'transparency': { folder: 'Transp_officer', file: 'transparency.php' },
        'inquiries': { folder: 'Helpdesk_officer', file: 'helpdesk.php' }, 
        'online application': { folder: 'Appoint_officer', file: 'appoint.php' },
        'employees': { folder: 'Employees', file: 'employees.php' } 
    };

    function normalize(str) {
        return str.trim().toLowerCase();
    }

    function loadContent(contentLink, updateURL = true) {
        const key = normalize(contentLink);
        const pageInfo = pageMap[key];

            if (!pageInfo) {
            contentDiv.innerHTML = `<p>Content not available for "${key}"</p>`;
            return;
        }

        const fullPath = `../${pageInfo.folder}/${pageInfo.file}`;

        fetch(fullPath)
            .then(response => {
                if (!response.ok) throw new Error('Page not found');
                return response.text();
            })
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const inner = doc.querySelector('.member-content-container');

                contentDiv.innerHTML = inner ? inner.outerHTML : html;

                if (updateURL) {
                    history.pushState(null, '', `?content=${encodeURIComponent(key)}`);
                }
            
                if (contentTitle) {
                    contentTitle.textContent = contentLink;
                }
            })
            .catch(err => {
                contentDiv.innerHTML = `<p>Error loading content: ${err.message}</p>`;
            });
    }

    navbars.forEach(nav => {
        nav.addEventListener('click', () => {
            const text = nav.querySelector('.nav-text');
            if (!text) return;
            loadContent(text.textContent);
            contentTitle.textContent = text.textContent;
        });
    });

    
    const params = new URLSearchParams(window.location.search);
    const initialContent = params.get('content');
    if (initialContent && pageMap[normalize(initialContent)]) {
        loadContent(initialContent, false);
    }
});
