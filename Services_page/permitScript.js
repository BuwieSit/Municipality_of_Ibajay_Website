
window.addEventListener('DOMContentLoaded', () => {

  const deptNav = document.querySelectorAll('.department');
  const deptContent = document.getElementById('servicesContent');

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
        const inner = doc.querySelector('.services-container');
        deptContent.innerHTML = inner ? inner.outerHTML : html;

        if (updateURL) {
          history.pushState(null, '', `?content=${encodeURIComponent(key)}`);
        }
      })
      .catch(err => {
        deptContent.innerHTML = `<p>Error loading content: ${err.message}</p>`;
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
  const hiddenPermitInput = document.getElementById('permitTypeInput'); // Get the hidden input

  if (permit && popup_text) {
    const text = permit.textContent.trim();
    popup_text.textContent = text;
    if (hiddenPermitInput) {
      hiddenPermitInput.value = text; // Store in form for submission
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


