const btn = document.getElementById('overlay-button');
  const container = document.getElementById('overlay');

  btn.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent hover from interfering
    container.classList.toggle('open');
  });