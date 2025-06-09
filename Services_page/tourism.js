// TOURISM PANEL 
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
    const description = box.getAttribute('data-description') || `More information about ${title} will go here.`; // fallback

    updatePanelImage(imgSrc);
    panelTitle.innerText = title;
    panelDesc.innerText = description;

    panel.classList.add('open');
  });
});


closeBtn.addEventListener('click', () => {
  panel.classList.remove('open');
});

// "SEE MORE" BUTTON 
const seeMoreBtn = document.querySelector('.see-more-btn');
const targetSection = document.getElementById('moreTourism');

seeMoreBtn.addEventListener('click', () => {
  targetSection.scrollIntoView({
    behavior: 'smooth'
  });
});

// FOOD SECTION 
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

// TOURISM HIGHLIGHT IMAGE SLIDER 
const highlightData = [
  {
    src: "../z-resources/Tourism/Place/church.png",
    title: "St. Peter the Apostle Parish (Ibajay Church)",
    description: "A Spanish-era church built in the 1800s. Its structure and design reflect the rich Catholic heritage of the town."
  },
  {
    src: "../z-resources/Tourism/Place/ati.jpg",
    title: "Ati-Atihan Festival",
    description: "An annual celebration every January honoring the Santo Niño with street dancing, indigenous music, and tribal costumes."
  },
  {
    src: "../z-resources/Tourism/Place/heritage.jpg",
    title: "Ibajay Heritage Museum",
    description: "Home to historical artifacts and displays about Ibajay's cultural legacy, ancestral families, and local heroes."
  },
  {
    src: "../z-resources/Tourism/Place/santo.jpg",
    title: "Santo Niño Shrine (Shrine of the Holy Child)",
    description: "Located in the heart of Ibajay, the Santo Niño Shrine is a sacred space dedicated to the Holy Child. It serves as a spiritual center during the annual Ati-Atihan Festival, where devotees gather in worship and thanksgiving. The shrine stands as a symbol of faith, unity, and the enduring devotion of the Ibajaynons to the Santo Niño"
  },
  {
    src: "../z-resources/Tourism/Place/rita.jpg",
    title: "St. Rita of Cascia Church",
    description: "St. Rita of Cascia Church is a serene place of worship nestled in one of Ibajay’s barangays. Dedicated to the patroness of impossible causes, this church holds special meaning for locals who seek spiritual solace and healing. Its modest architecture, tranquil atmosphere, and community-centered celebrations reflect the deep-rooted Catholic devotion present throughout Ibajay."
  }
];

const highlightImage = document.getElementById('highlightImage');
const leftPanel = document.querySelector('.highlight-box.left');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');
const highlightListItems = document.querySelectorAll('#highlightList li');

let currentHighlightIndex = 0;

function updateHighlight(index) {
  const item = highlightData[index];
  highlightImage.src = item.src;
  leftPanel.innerHTML = `<strong>${item.title}</strong><p>${item.description}</p>`;

  highlightListItems.forEach(li => li.classList.remove('active'));
  const activeLi = document.querySelector(`#highlightList li[data-index="${index}"]`);
  if (activeLi) activeLi.classList.add('active');
}

// Initial display
updateHighlight(currentHighlightIndex);

// Arrow button handlers
leftArrow.addEventListener('click', () => {
  currentHighlightIndex = (currentHighlightIndex - 1 + highlightData.length) % highlightData.length;
  updateHighlight(currentHighlightIndex);
});

rightArrow.addEventListener('click', () => {
  currentHighlightIndex = (currentHighlightIndex + 1) % highlightData.length;
  updateHighlight(currentHighlightIndex);
});


highlightListItems.forEach(li => {
  li.addEventListener('click', () => {
    const index = parseInt(li.dataset.index);
    if (!isNaN(index)) {
      currentHighlightIndex = index;
      updateHighlight(index);
    }
  });
});
