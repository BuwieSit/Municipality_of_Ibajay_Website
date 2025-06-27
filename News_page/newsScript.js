fetch('./newsHandler.php')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('mainWrapper');

    if (!Array.isArray(data) || data.length === 0) {
      container.innerHTML = '<p>No news available at the moment.</p>';
      return;
    }

    data.forEach(row => {
      const formattedDate = new Date(row.created_at).toLocaleString('en-US', {
        month: 'long', day: 'numeric', year: 'numeric',
        hour: 'numeric', minute: '2-digit', hour12: true
      });

      const newsItem = document.createElement('div');
      newsItem.className = 'main-item';

      newsItem.setAttribute('data-headline', row.headline);
      newsItem.setAttribute('data-desc', row.description);
      newsItem.setAttribute('data-date', row.created_at);
      newsItem.setAttribute('data-nImg', row.news_image);
      newsItem.innerHTML = `
                <div class="main-item">
                      <img class="main-img" id="mainImg" src="../../ADMIN_CONTROLS/news_thumbnails/${row.news_image}">
                      <p class="main-title">${row.headline}</p>
                      <p id="date" class="date">${formattedDate}</p>
                </div>
      `;

      container.appendChild(newsItem);
    });
  })
  .catch(err => {
    console.error('Error fetching news:', err);
    document.getElementById('newsCont').innerHTML = '<p>Failed to load news.</p>';
  });
