const boxes = document.querySelectorAll('.tourism-box');
const panel = document.getElementById('tourismPanel');
const closeBtn = document.getElementById('closePanel');
const panelImage = document.getElementById('panelImage');
const panelTitle = document.getElementById('panelTitle');
const panelDesc = document.getElementById('panelDescription');

function updatePanelImage(src) {
  panelImage.classList.remove('visible'); 

  const tempImg = new Image();
  tempImg.onload = () => {
    panelImage.src = src;               
    panelImage.classList.add('visible'); 
  };
  tempImg.src = src;
}


boxes.forEach(box => {
  box.addEventListener('click', () => {
    const imgSrc = box.querySelector('img').src;
    const title = box.querySelector('h1').innerText;

    updatePanelImage(imgSrc); 
    panelTitle.innerText = title;
    panelDesc.innerText = `More information about ${title} will go here. You can customize this text.`; 

    panel.classList.add('open');
  });
});

closeBtn.addEventListener('click', () => {
  panel.classList.remove('open');
});

const seeMoreBtn = document.querySelector('.see-more-btn');
const targetSection = document.getElementById('moreTourism');

seeMoreBtn.addEventListener('click', () => {
  targetSection.scrollIntoView({
    behavior: 'smooth'
  });
});

const foodContainer = document.getElementById('food-container');
const foodBoxes = foodContainer.querySelectorAll('.image-row .box');
const foodTitle = foodContainer.querySelector('h3.left-text');
const foodDesc = foodContainer.querySelector('.left-text p');

foodBoxes.forEach(box => {
  box.addEventListener('click', () => {
    const newTitle = box.getAttribute('data-title');
    const newDesc = box.getAttribute('data-description');

    foodTitle.textContent = newTitle;
    foodDesc.textContent = newDesc;
  });
});
