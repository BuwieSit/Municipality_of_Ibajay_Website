window.addEventListener('DOMContentLoaded', () => {
  fetch('./tourismData.php')
    .then(response => response.json())
    .then(data => {
      if (!Array.isArray(data)) return;

      data.forEach(item => {
        const { t_title, t_desc, t_image, t_tag } = item;

        // Normalize tag to match section class
        let section;
        switch (t_tag) {
          case 'localDeli':
            section = document.querySelector('.local-delicacies .section-item');
            break;
          case 'sites':
            section = document.querySelector('.tourism-sites .section-item');
            break;
          case 'attractions':
            section = document.querySelector('.tourism-attractions .section-item');
            break;
          default:
            return;
        }

        if (section) {
          const nameEl = section.querySelector('.delicacy-name');
          const descEl = section.querySelector('.delicacy-desc');
          const imgEl = section.querySelector('img');

          nameEl.textContent = t_title;
          descEl.textContent = t_desc;
          imgEl.src = `../ADMIN_CONTROLS/tourism_uploads/${t_image}`;
        }
      });
    })
    .catch(err => {
      console.error('Failed to fetch tourism content:', err);
    });
});
