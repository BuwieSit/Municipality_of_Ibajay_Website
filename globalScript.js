window.addEventListener('load', function() {
  loadingScreen.style.display = 'none';
})

window.addEventListener('DOMContentLoaded', () => {

    const slider = document.querySelector('.slider');
    const toggleBtn = document.querySelector('.toggle');
    const accountBtn = document.getElementById('accButton');
    const popup = document.querySelector('.acc-popup');
    const pleft = document.querySelector('.pleft');
    const pright = document.querySelector('.pright');


    accountBtn.addEventListener('click', () => {
        if (popup.style.opacity == '0') {
            popup.style.opacity = '1';
        }
        else {
            popup.style.opacity = '0';
        }
        
    });

    toggleBtn.addEventListener('click', () => {

        if (slider.style.transform == 'translateX(50%)') { //if slider is in the right side
            slider.style.transform = 'translateX(-50%)';
            toggleBtn.textContent = 'Register';
            slider.style.boxShadow = '10px 0px 10px black';
            pleft.style.opacity = '0';
            pleft.style.transform = 'scale(0.1)'
            pright.style.transform = 'scale(1)'
            pright.style.opacity = '1';
        }
        else {
            slider.style.transform = 'translateX(50%)'; //if slider is in the left side
            toggleBtn.textContent = 'Login';
            slider.style.boxShadow = '-10px 0px 10px black';
            pright.style.opacity = '0';
            pright.style.transform = 'scale(0.1)'
            pleft.style.transform = 'scale(1)'
            pleft.style.opacity = '1';
        }
        
    });


});
