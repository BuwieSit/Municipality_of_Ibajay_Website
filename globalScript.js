window.addEventListener('load', function() {
  loadingScreen.style.display = 'none';
})

window.addEventListener('DOMContentLoaded', () => {

    const slider = document.querySelector('.slider');
    const toggleBtn = document.querySelector('.toggle');
    const accountBtn = document.getElementById('accButton');
    const popup = document.querySelector('.acc-popup');

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
        }
        else {
            slider.style.transform = 'translateX(50%)'; //if slider is in the left side
            toggleBtn.textContent = 'Login';
            slider.style.boxShadow = '-10px 0px 10px black';
        }
        
    });


});
