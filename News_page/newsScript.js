fetch('./newsHandler.php')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('newsCont');

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
      `;

      container.appendChild(newsItem);
    });
  })
  .catch(err => {
    console.error('Error fetching news:', err);
    document.getElementById('newsCont').innerHTML = '<p>Failed to load news.</p>';
  });
