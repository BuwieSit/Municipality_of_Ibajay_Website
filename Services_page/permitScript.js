

function changeText(clickedElement) {
  const permit = clickedElement.querySelector('.permit-text');
  const popup_text = document.querySelector('.popup-text');

  if (permit && popup_text) {
    popup_text.textContent = permit.textContent.trim();
  }
}


function openPopup(idToOpen, idToClose = null, clickedElement = null) {
  if (idToClose) {
    document.getElementById(idToClose).classList.remove("open-popup");
    // popup_text.textContent = "";
  }

  document.getElementById(idToOpen).classList.add("open-popup");

  if (clickedElement) {
    changeText(clickedElement);
  }

}

function closePopup(idToClose) {
  document.getElementById(idToClose).classList.remove("open-popup");

}


  var qrcode = new QRCode(document.querySelector('.qrcode'), {
      text: 'https://new.gcash.com/',
      width: 128,
      height: 128,
      colorDark : '#000',
      colorLight : '#fff',
      correctLevel : QRCode.CorrectLevel.H
  });


