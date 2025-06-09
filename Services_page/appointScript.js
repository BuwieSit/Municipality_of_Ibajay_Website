const bookBtn = document.getElementById('appoint-btn');
const bookPopup = document.querySelector('.doctor-popup');


bookBtn.addEventListener('click', () => {

    if (bookPopup.style.opacity == '0') {
         bookPopup.style.opacity = '1';
        
    }
    else {
        bookPopup.style.opacity = '0';
    }
   

});