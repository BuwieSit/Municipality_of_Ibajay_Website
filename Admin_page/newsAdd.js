//admin tab

const addNews = document.querySelector('.add');
const addButton = document.querySelector('.add-btn');
const popup = document.querySelector('.add-popup');
const headline = document.getElementById('headline');
const description = document.getElementById('headline-description');
const admin_close = document.getElementById('closeBtn');
const card = document.querySelector('.card-popup');

    admin_close.addEventListener('click', () => {
        popup.style.opacity = '0';
        popup.style.pointerEvents = 'none';
      

    });

 


    addNews.addEventListener('click', () => {
        popup.style.opacity = '1';
        popup.style.pointerEvents = 'all';
    });

 
function confirmDelete() {
    return confirm("Are you sure you want to delete this announcement?");
}
