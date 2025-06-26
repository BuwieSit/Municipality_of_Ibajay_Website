
window.addEventListener('DOMContentLoaded', () => {
  const deptNav = document.querySelectorAll('.department');
  const deptContent = document.getElementById('serviceContent');

  const baseFolder = 'dept_pages/';

  const deptMap = {
    'civilregistry': 'civil_reg.html',
    'engineering': 'eng_dept.html',
    'healthoffice': 'health_dept.html',
    'treasury': 'treasury.html',
    'businesspermits&licensingoffice': 'business_dept.html'
  };

  function normalize(str) {
    return str.trim().toLowerCase().replace(/\s+/g, '');
  }

  function loadContent(deptKey, updateURL = true) {
    const key = normalize(deptKey);
    const file = deptMap[key];

    if (!file) {
      deptContent.innerHTML = `<p>Content not available for "${key}"</p>`;
      return;
    }

    const path = baseFolder + file;

    fetch(path)
      .then(response => {
        if (!response.ok) throw new Error('Page not found');
        return response.text();
      })
      .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const inner = doc.querySelector('.services-contents');
        deptContent.innerHTML = inner ? inner.outerHTML : html;

        if (updateURL) {
          history.pushState(null, '', `?content=${encodeURIComponent(key)}`);
        }


        fetchDocuments(key);
      })
      .catch(err => {
        deptContent.innerHTML = `<p>Error loading content: ${err.message}</p>`;
      });
  }

function fetchDocuments(dept) {
  fetch('./documentHandler.php?content=' + encodeURIComponent(dept))
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById('serviceDocuments');
      if (!container) return;

      container.innerHTML = '';

      if (!Array.isArray(data) || data.length === 0) {
        container.innerHTML = '<p>No documents available at the moment</p>';
        return;
      }

      data.forEach(docu => {
        const docElem = document.createElement('div');
        docElem.className = 'document';
        docElem.setAttribute('data-filepath', `../../ADMIN_CONTROLS/documents/${docu.document}`);
        docElem.innerHTML = `
          <img id="docu-icon" src="../../z-resources/file.png" alt="file icon">
          <p class="docu-name">${docu.filename}</p>
        `;
        container.appendChild(docElem);
      });

      container.querySelectorAll('.document').forEach(doc => {
        doc.addEventListener('click', () => {
          const filePath = doc.getAttribute('data-filepath');
          const link = document.createElement('a');
          link.href = filePath;
          link.download = ''; 
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
        });
      });
    })
    .catch(err => {
      console.error('Error fetching data:', err);
    });
}

  deptNav.forEach(dnav => {
    dnav.addEventListener('click', () => {
      const deptText = dnav.querySelector('p')?.textContent;
      if (!deptText) return;
      loadContent(deptText);
    });
  });


  const params = new URLSearchParams(window.location.search);
  const initialContent = params.get('content');
  if (initialContent && deptMap[normalize(initialContent)]) {
    loadContent(initialContent, false);
  }
});


function changeText(clickedElement) {
  const permit = clickedElement.querySelector('.permit-text');
  const popup_text = document.querySelector('.popup-text');
  const hiddenPermitInput = document.getElementById('permitTypeInput'); 

  if (permit && popup_text) {
    const text = permit.textContent.trim();
    popup_text.textContent = text;
    if (hiddenPermitInput) {
      hiddenPermitInput.value = text; 
    }
  }
}


function openPopup(idToOpen, idToClose = null, clickedElement = null) {
  if (idToClose) {
    document.getElementById(idToClose).classList.remove("open-popup");
    // popup_text.textContent = "";
  }

  document.getElementById(idToOpen).classList.add("open-popup");

  if (clickedElement) {
    changeText(clickedElement);
  }

}

function closePopup(idToClose) {
  document.getElementById(idToClose).classList.remove("open-popup");

}


  var qrcode = new QRCode(document.querySelector('.qrcode'), {
      text: 'https://new.gcash.com/',
      width: 128,
      height: 128,
      colorDark : '#000',
      colorLight : '#fff',
      correctLevel : QRCode.CorrectLevel.H
  });


