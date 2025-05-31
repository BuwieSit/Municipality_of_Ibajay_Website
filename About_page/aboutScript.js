const barangays = document.querySelectorAll('.barangay-list li');

if (barangays.length > 0) {
    barangays.forEach((li) => {
        li.addEventListener('click', () => {
            const text = li.textContent.trim();
            window.location.href = `./baranggay/barangayContent.html?bname=${encodeURIComponent(text)}`;
        });
    });
}

const dropdownBtn = document.querySelector('.dropdown-button');
const barangay_list = document.querySelector('.barangay-list');

dropdownBtn.addEventListener('click', () => {
    

    if(barangay_list.style.height <= '50px') {
        barangay_list.style.height = '80%';
        barangay_list.style.overflowY = 'scroll';
    }
    else {
        barangay_list.style.height = '50px';
        barangay_list.style.overflowY = 'hidden';
    }
});
