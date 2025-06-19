window.addEventListener('DOMContentLoaded', () => {

    const navbars = document.querySelectorAll('.admin-sidenav');
    const contentDiv = document.getElementById('adminContent');

    const pageMap = {
        'dashboard': { folder: 'Super_admin', file: 'super_admin.html' }, 
        'announcements': { folder: 'Content_manager', file: 'content.php' },
        'services': { folder: 'Services_manager', file: 'services.html' },
        'tourism': { folder: 'Tourism_coor', file: 'tourism.html' },
        'healthcare': { folder: 'Health_officer', file: 'health.html' },
        'transparency': { folder: 'Transp_officer', file: 'transparency.html' },
        'inquiries': { folder: 'Helpdesk_officer', file: 'helpdesk.html' }, 
        'online application': { folder: 'Appoint_officer', file: 'appoint.html' },
        'employees': { folder: 'Employees', file: 'employees.html' } 
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
        });
    });

    
    const params = new URLSearchParams(window.location.search);
    const initialContent = params.get('content');
    if (initialContent && pageMap[normalize(initialContent)]) {
        loadContent(initialContent, false);
    }
});
