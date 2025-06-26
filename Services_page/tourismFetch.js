window.addEventListener('DOMContentLoaded', () => {
  fetch('./tourismData.php')
    .then(response => response.json())
    .then(data => {
      if (!Array.isArray(data)) return;

      data.forEach(item => {
        const { t_title, t_desc, t_image, t_tag } = item;

        let sectionContainer;
        switch (t_tag) {
          case 'localDeli':
            sectionContainer = document.querySelector('.local-delicacies');
            break;
          case 'sites':
            sectionContainer = document.querySelector('.tourism-sites');
            break;
          case 'attractions':
            sectionContainer = document.querySelector('.tourism-attractions');
            break;
          default:
            return;
        }

        if (sectionContainer) {
          const newItem = document.createElement('div');
          newItem.className = 'section-item';

          newItem.innerHTML = `
            <img id="delicacyImg" src="../ADMIN_CONTROLS/tourism_uploads/${t_image}" alt="${t_title}">
            <div class="delicacy-name">${t_title}</div>
            <div class="delicacy-desc">${t_desc}</div>
          `;

          sectionContainer.appendChild(newItem);
        }
      });
    })
    .catch(err => {
      console.error('Failed to fetch tourism content:', err);
    });
});
