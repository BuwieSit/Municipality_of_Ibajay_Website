const dashboard = document.getElementById('dashboard');
const announce = document.getElementById('announce');
const health = document.getElementById('health');
const permit = document.getElementById('permit');

const isInAdmPages = window.location.pathname.includes("adm_pages");
const basePath = isInAdmPages ? "../" : "./";


if (dashboard) {
    dashboard.addEventListener('click', () => {
        window.location.href = `${basePath}adminControl.php`;
    });
    if (window.location.pathname.endsWith("adminControl.php")) {
        dashboard.classList.add('selected');
    }
}

if (announce) {
    announce.addEventListener('click', () => {
        window.location.href = `${basePath}adm_pages/adm_announce.php`;
    });
    if (window.location.pathname.endsWith("adm_announce.php")) {
        announce.classList.add('selected');
    }
}

if (health) {
    health.addEventListener('click', () => {
        window.location.href = `${basePath}adm_pages/adm_health.php`;
    });
    if (window.location.pathname.endsWith("adm_health.php")) {
        health.classList.add('selected');
    }
}

if (permit) {
    permit.addEventListener('click', () => {
        window.location.href = `${basePath}adm_pages/adm_permits.php`;
    });
    if (window.location.pathname.endsWith("adm_permits.php")) {
        permit.classList.add('selected');
    }
}



