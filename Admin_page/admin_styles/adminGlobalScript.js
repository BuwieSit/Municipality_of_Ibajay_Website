window.addEventListener('DOMContentLoaded', () => {

    const settings = document.getElementById('admSettings');
    const popup = document.querySelector('.settings-popup');


    settings.addEventListener('mouseover', () => {
        if (popup.style.opacity = '0') {
            popup.style.opacity = '1' 
        }
        else {
            popup.style.opacity = '0';
        }
    });

    settings.addEventListener('click', () => {

        popup.style.opacity = '0';
    });


});