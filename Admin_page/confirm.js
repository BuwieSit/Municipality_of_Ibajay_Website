const admin_close = document.getElementById('closeBtn');
const card = document.querySelector('.card-popup');
const edit = document.getElementById('editBtn');


function confirmDelete() {
    return confirm("Are you sure you want to delete this announcement?");
}

    edit.addEventListener('click', () => {
        card.style.opacity = '1';
        card.style.pointerEvents = 'all';
        console.log('Clicked');
    });

   admin_close.addEventListener('click', () => {
        card.style.opacity = '0';
        card.style.pointerEvents = 'none';

    });