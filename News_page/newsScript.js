function escapeHtml(str) {
  if (!str) return 'news_thumb.png'; 
  return str
    .replace(/&/g, "&amp;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;");
}

fetch('./newsHandler.php')
  .then(response => response.json())
  .then(data => {
    const container = document.getElementById('mainWrapper');
    container.innerHTML = '';

    const featuredBox = document.getElementById('featuredNews');
    const topNewsBox = document.getElementById('topNews');
    const announceList = document.getElementById('aContainer');

    // Clear top and featured
    featuredBox.innerHTML = '';
    topNewsBox.innerHTML = '';
    announceList.innerHTML = '';

    // === NEWS SECTION: Grouping ===
    if (Array.isArray(data.news) && data.news.length > 0) {
      const featured = data.news.find(row => row.is_featured == 1);
      const topNews = data.news.filter(row => row.is_topnews == 1);
      const recentNews = data.news.filter(row => row.is_topnews != 1 && row.is_featured != 1);

      // === FEATURED NEWS ===
      if (featured) {
        const safeImage = escapeHtml(featured.news_image || 'news_thumb.png');
        featuredBox.innerHTML = `
          <img id="featuredImg" class="featured-img" src="../../ADMIN_CONTROLS/news_thumbnails/${safeImage}">
          <p class="featured-title" id="featuredTitle">${featured.headline}</p>
        `;
      } else {
        featuredBox.innerHTML = '<p>No featured news available.</p>';
      }

      // === TOP NEWS ===
      if (topNews.length > 0) {
        topNews.forEach(row => {
          const formattedDate = new Date(row.created_at).toLocaleString('en-US', {
            month: 'long', day: 'numeric', year: 'numeric',
            hour: 'numeric', minute: '2-digit', hour12: true
          });

          const topItem = document.createElement('div');
          topItem.className = 'article-item';
          topItem.innerHTML = `
            <p class="article-desc">${row.headline}</p>
            <p class="article-date">${formattedDate}</p>
          `;
          topNewsBox.appendChild(topItem);
        });
      } else {
        topNewsBox.innerHTML = '<p>No top news available.</p>';
      }

      // === RECENT NEWS ===
      recentNews.forEach(row => {
        const formattedDate = new Date(row.created_at).toLocaleString('en-US', {
          month: 'long', day: 'numeric', year: 'numeric',
          hour: 'numeric', minute: '2-digit', hour12: true
        });

        const safeImage = escapeHtml(row.news_image || 'news_thumb.png');

        const newsItem = document.createElement('div');
        newsItem.className = 'main-item';
        newsItem.setAttribute('data-id', row.news_id);
        newsItem.setAttribute('data-headline', row.headline);
        newsItem.setAttribute('data-desc', row.description);
        newsItem.setAttribute('data-date', row.created_at);

        newsItem.innerHTML = `
          <img class="main-img" id="mainImg" src="../../ADMIN_CONTROLS/news_thumbnails/${safeImage}">
          <p class="main-title">${row.headline}</p>
          <p id="date" class="date">${formattedDate}</p>
        `;
        container.appendChild(newsItem);
      });
    } else {
      container.innerHTML = '<p>No news available at the moment.</p>';
    }

    // === ANNOUNCEMENTS SECTION ===
    if (Array.isArray(data.announcements) && data.announcements.length > 0) {
      data.announcements.forEach(ann => {
        const formattedDate = new Date(ann.a_when).toLocaleString('en-US', {
          month: 'long', day: 'numeric', year: 'numeric',
          hour: 'numeric', minute: '2-digit', hour12: true
        });

        const item = document.createElement('div');
        item.className = 'article-item';
        item.setAttribute('data-id', ann.announce_id);
        item.innerHTML = `
          <img class="article-img" src="../../z-resources/speaker.png">
          <div class="article-wrapper">
            <p class="article-desc a-what">${ann.a_what}</p>
            <p class="article-date">${formattedDate}</p>
          </div>
        `;
        announceList.appendChild(item);
      });
    } else {
      announceList.innerHTML = '<p>No announcements available at the moment.</p>';
    }
  })
  .catch(err => {
    console.error('Error fetching news:', err);
    document.getElementById('mainWrapper').innerHTML = '<p>Failed to load news.</p>';
    document.getElementById('aItem').innerHTML = '<p>Failed to load announcements.</p>';
  });
