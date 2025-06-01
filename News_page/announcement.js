document.querySelectorAll('.add-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        
        alert('Add new announcement');
    });
});

document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        
        alert('Edit this announcement');
    });
});

document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        if (confirm('Delete this announcement?')) {
            btn.closest('.event-item, .main-announcement').remove();
        }
    });
});

document.querySelectorAll('.pin-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        alert('Pinned to top');
        
    });
});
