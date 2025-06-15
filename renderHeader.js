const head = document.querySelector('header');

function routing() {
  const path = window.location.pathname;
  const depth = path.split('/').filter(Boolean).length;

  // Define link prefixes depending on the depth
  let prefix = './';
  if (depth === 2) prefix = '../';
  if (depth >= 3) prefix = '../../';

  const headContents = `
    <div class="header-logo-cont">
      <a href="${prefix}index.html">
        <div class="left-wrapper">
          <h1 id="headerTitle">IBAJAY</h1>
        </div>
      </a>
    </div>
    <img class="listIcon" src="${prefix}z-resources/list.png">
    
    <div class="mobile-nav">
      <ul>
        <a href="${prefix}About_page/about.html"><li>About</li></a>
        <a href="${prefix}Services_page/services.html"><li>Services</li></a>
        <a href="${prefix}News_page/news.html"><li>News</li></a>
        <a href="${prefix}Contacts_page/contact.html"><li>Contacts</li></a>
        <button class="accButton">Account</button>
      </ul>
    </div>

    <div class="nav-list">
      <ul>
        <a href="${prefix}About_page/about.html"><li>About</li></a>
        <a href="${prefix}Services_page/services.html"><li>Services</li></a>
        <a href="${prefix}News_page/news.html"><li>News</li></a>
        <a href="${prefix}Contacts_page/contact.html"><li>Contacts</li></a>
        <button class="accButton">Account</button>
      </ul>
    </div>
  `;

  if (head) {
    head.innerHTML = headContents;
  } else {
    console.error("No <header> element found on the page.");
  }
}

routing();
