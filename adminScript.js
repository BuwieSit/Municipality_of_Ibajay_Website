  window.addEventListener('DOMContentLoaded', () => {
    
    // const uniqueErr = document.getElementById('uniqueErr');
    // const passErr = document.getElementById('passErr');
    // const login_unique = document.getElementById('login-unique');
    // const login_pass = document.getElementById('login-password');

    // if (uniqueErr.textContent.trim() === '') {
    //     login_unique.classList.remove('inp-correct');
    //     login_unique.classList.add('inp-error');
    // }
    // else {
    //     login_unique.classList.remove('inp-error');
    //     login_unique.classList.add('inp-correct');
    // }

    // if (passErr.textContent.trim() === '') {
    //     login_unique.classList.remove('inp-correct');
    //     login_pass.classList.add('inp-error');
    // }
    // else {
    //     login_unique.classList.remove('inp-error');
    //     login_unique.classList.add('inp-correct');
    // }
   
    const login_unique = document.getElementById('login-unique');
    const login_pass = document.getElementById('login-password');
    const uniqueErr = document.getElementById('uniqueErr');
    const passErr = document.getElementById('passErr');


    login_unique.addEventListener('input', () => {
        if (login_unique.value.trim() === '') {
            uniqueErr.textContent = 'Unique ID is required.';
            login_unique.classList.add('inp-error');
            login_unique.classList.remove('inp-correct');
        } else {
            uniqueErr.textContent = '';
            login_unique.classList.add('inp-correct');
            login_unique.classList.remove('inp-error');
        }
    });

    login_pass.addEventListener('input', () => {
        if (login_pass.value.trim() === '') {
            passErr.textContent = 'Password is required.';
            login_pass.classList.add('inp-error');
            login_pass.classList.remove('inp-correct');
        } else {
            passErr.textContent = '';
            login_pass.classList.add('inp-correct');
            login_pass.classList.remove('inp-error');
        }
    });


    document.getElementById('loginForm').addEventListener('submit', function (e) {
        if (login_unique.value.trim() === '' || login_pass.value.trim() === '') {
            e.preventDefault(); 
        }
    });


});


