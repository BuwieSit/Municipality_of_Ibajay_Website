// window.addEventListener('load', function() {
//   loadingScreen.style.display = 'none';
// })

window.addEventListener('DOMContentLoaded', () => {

        const screenWidth = window.innerWidth;
        const slider = document.querySelector('.slider');
        const toggleBtn = document.querySelector('.toggle');
        const accountBtn = document.querySelectorAll('.accButton');
        const popup = document.querySelector('.acc-popup');
        const pleft = document.querySelector('.pleft');
        const pright = document.querySelector('.pright');

    if (screenWidth <= '1000') {
        console.log('screen');
        const mobileIcon = document.querySelectorAll('.listIcon');
        const mobileNav = document.querySelector('.mobile-nav');

        mobileIcon.forEach(icon => {
            icon.addEventListener('click', () => {
                console.log('clicking');
                if (mobileNav.style.opacity == '0') {
                    mobileNav.style.opacity = '1';
                    mobileNav.style.pointerEvents = 'all';
                }
                else {
                    mobileNav.style.opacity = '0';
                    mobileNav.style.pointerEvents = 'none';
                }
            });
        });

    }
    
    const accessibilityTrigger = document.getElementById('accessTrigger');
    const access_dropdown = document.getElementById('accessDrop');

    accessibilityTrigger.addEventListener('mouseenter', () => {
        access_dropdown.style.opacity = '1';
    });

    accessibilityTrigger.addEventListener('click', () => {
        access_dropdown.style.opacity = '0';
    });

    access_dropdown.addEventListener('mouseleave', () => {
        access_dropdown.style.opacity = '0';
    });
            

        accountBtn.forEach(btn => {
            console.log('clicked');

            btn.addEventListener('click', () => {
                if (popup.style.opacity == '0') {
                    popup.style.opacity = '1';
                    popup.style.pointerEvents = 'all';
                }
                else {
                    popup.style.opacity = '0';
                    popup.style.pointerEvents = 'none';
                }

            });

        });


    const number = document.querySelectorAll('.cont-number');

    number.forEach(num => {
        num.addEventListener('click', () => {
            const textToCopy = num.textContent;

            navigator.clipboard.writeText(textToCopy).then(() => {

                const div = document.createElement('div');
                const p = document.createElement('p');

                div.classList.add('toast');
                p.id = 'toastText';
                p.textContent = 'Copied text';

                div.appendChild(p);
                document.body.appendChild(div);

                div.style.opacity = '1';

                setTimeout(() => {
                    div.style.opacity = '0';
                    setTimeout(() => {
                        div.remove();
                    }, 500); 
                }, 3000);
            }).catch(err => {
                alert("Failed to copy text: " + err);
            });
        });
    });

    let count = 0; 

    const admin_acc = document.querySelector('.admin-access');

    admin_acc.addEventListener('click', () => {
        count += 1; 
        console.log(count);

        if (count > 5) {
            alert('admin login accessed');
            window.location.href = './admin.php';
            count = 0;
        }
    });



});
