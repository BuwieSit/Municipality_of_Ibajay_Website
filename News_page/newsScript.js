
const popup_news = document.getElementById('newsPopup');
const close = document.getElementById('popup-close');

document.querySelectorAll('.sub-box').forEach(box => {

  box.addEventListener('click', () => {
    const headline = box.dataset.headline;
    const date = box.dataset.date;
    const desc = box.dataset.desc;

    document.getElementById('popupHeadline').textContent = headline;
    document.getElementById('popupDate').textContent = date;
    document.getElementById('popupDesc').textContent = desc;

    popup_news.style.opacity = '1';
    popup_news.style.pointerEvents = 'all';
    

    
  });


});

  close.addEventListener('click', () => {
    popup_news.style.opacity = '0';
    popup_news.style.pointerEvents = 'none';
  });
