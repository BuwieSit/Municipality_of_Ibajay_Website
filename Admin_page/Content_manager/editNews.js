document.getElementById('newsActionForm').addEventListener('submit', function (e) {
    e.preventDefault(); 

    const formData = new FormData(this);

    fetch('./update_news.php', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest' 
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert("✅ " + data.message);

            document.querySelector('.news-action-popup').style.display = 'none';

            location.reload();
        } else {
            alert("❌ Error: " + data.message);
        }
    })
    .catch(err => {
        alert("❌ AJAX error: " + err.message);
    });
});
