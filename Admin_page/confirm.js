const admin_close = document.getElementById('closeBtn');
const card = document.querySelector('.card-popup');
const edit = document.querySelectorAll('#editBtn');


function confirmDelete() {
    return confirm("Are you sure you want to remove this doctor?");
}

    edit.forEach(editBtn => {

        editBtn.addEventListener('click', () => {
            card.style.opacity = '1';
            card.style.pointerEvents = 'all';
            console.log('Clicked');
        });
    });


   admin_close.addEventListener('click', () => {
        card.style.opacity = '0';
        card.style.pointerEvents = 'none';

    });


const bookings = document.querySelectorAll('.booking');
const box = document.querySelector('.confirm-box');
const cancel = document.querySelector('.conf-can');

bookings.forEach(book => {
    book.addEventListener('click', () => {
        box.style.opacity = '1';
        box.style.pointerEvents = 'all';
    });
});

cancel.addEventListener('click', () => {
    box.style.opacity = '0';
    box.style.pointerEvents = 'none';
});