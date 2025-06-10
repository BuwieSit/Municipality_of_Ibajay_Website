

function changeText(clickedElement) {
  const permit = clickedElement.querySelector('.permit-text');
  const popup_text = document.querySelector('.popup-text');
  const hiddenPermitInput = document.getElementById('permitTypeInput'); // Get the hidden input

  if (permit && popup_text) {
    const text = permit.textContent.trim();
    popup_text.textContent = text;
    if (hiddenPermitInput) {
      hiddenPermitInput.value = text; // Store in form for submission
    }
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


