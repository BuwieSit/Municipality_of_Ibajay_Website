const barangays = document.querySelectorAll('.barangay-list li');

barangays.forEach((li) => {
    li.addEventListener('click', () => {
        const text = li.textContent.trim();
        
        
        window.location.href = './baranggay/barangayContent.html';
        console.log('You clicked:', text);
    });
});
