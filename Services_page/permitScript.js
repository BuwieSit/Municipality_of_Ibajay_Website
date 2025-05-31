function openPopup(idToOpen, idToClose = null) {
  if (idToClose) {
    document.getElementById(idToClose).classList.remove("open-popup");
  }
  document.getElementById(idToOpen).classList.add("open-popup");
}

function closePopup(idToClose) {
  document.getElementById(idToClose).classList.remove("open-popup");
}