const popup_news = document.getElementById('newsPopup');
const close = document.getElementById('popup-close');

document.addEventListener('click', e => {
  // Delegate to .sub-box since they are dynamically added
  const box = e.target.closest('.sub-box');
  if (box) {
    const headline = box.dataset.headline;
    const date = new Date(box.dataset.date).toLocaleString('en-US', {
      month: 'long', day: 'numeric', year: 'numeric',
      hour: 'numeric', minute: '2-digit', hour12: true
    });
    const desc = box.dataset.desc;

    document.getElementById('popupHeadline').textContent = headline;
    document.getElementById('popupDate').textContent = date;
    document.getElementById('popupDesc').textContent = desc;

    popup_news.classList.add('active');
  }
});

close.addEventListener('click', () => {
  popup_news.classList.remove('active');
});




          fetch('./newsHandler.php')
              .then(response => response.json())
              .then(data => {
                const container = document.getElementById('newsCont');

                data.forEach(row => {

                  const formattedDate = new Date(row.created_at).toLocaleString('en-US', {
                    month: 'long', day: 'numeric', year: 'numeric',
                    hour: 'numeric', minute: '2-digit', hour12: true
                  });

                  const newsItem = document.createElement('div');
                  newsItem.className = 'sub-box';

                  newsItem.setAttribute('data-headline', row.headline);
                  newsItem.setAttribute('data-desc', row.description);
                  newsItem.setAttribute('data-date', row.created_at);

                  newsItem.innerHTML = `
                    <div class="news2">
                      <img class="news-image2" src="../z-resources/news_thumb.png" alt="news2">
                    </div>

                    <div class="sub-headline">
                      <strong>${row.headline}</strong>
                    </div>

                    <div class="date">
                      ${formattedDate}
                    </div>

                    </div>
                  `;

                  container.appendChild(newsItem);
                });
              })
              .catch(err => {
                console.error('Error fetching news:', err);
              });