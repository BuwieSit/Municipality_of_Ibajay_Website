//POPUP FUNCTIONALITY
const permit_text = document.querySelector('.permit-text');
const container = document.querySelector('.sys-container');
const popup_text = document.querySelector('.popup-text');

function changeText() {
  let text = permit_text.textContent.trim();
  popup_text.textContent = text;
}



function openPopup(idToOpen, idToClose = null) {
  if (idToClose) {
    document.getElementById(idToClose).classList.remove("open-popup");
    popup_text.textContent = "";
  }
  
  document.getElementById(idToOpen).classList.add("open-popup");
  changeText();
}

function closePopup(idToClose) {
  document.getElementById(idToClose).classList.remove("open-popup");
  popup_text.textContent = "";
}



