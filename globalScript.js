
window.addEventListener('DOMContentLoaded', () => {

    const slider = document.querySelector('.slider');
    const toggleBtn = document.querySelector('.toggle');

    toggleBtn.addEventListener('click', () => {

        if (slider.style.transform == 'translateX(50%)') { //if slider is in the right side
            slider.style.transform = 'translateX(-50%)';
            toggleBtn.textContent = 'Register';
        }
        else {
            slider.style.transform = 'translateX(50%)'; //if slider is in the left side
            toggleBtn.textContent = 'Login';
        }
        
    });


});
