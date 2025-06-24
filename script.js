            fetch('indexHandler.php')
              .then(response => response.json())
              .then(data => {
                const container = document.getElementById('list');

                data.forEach(row => {
                  const item = document.createElement('div');
                  item.className = 'item';
                  item.style.backgroundImage = "url('./z-resources/news_thumb.png')";
                  item.setAttribute('data-headline', row.headline);
                  item.setAttribute('data-desc', row.description);

                  item.innerHTML = `
                    <div class="content">
                      <div class="title">${row.headline}</div>
                      <div class="name">${row.description}</div>
                      <div class="btn">
                        <button><a href="News_page/news.php">See More</a></button>
                      </div>
                    </div>
                  `;

                  container.appendChild(item);
                });
              })
              .catch(err => {
                console.error('Error fetching news:', err);
              });