const barangays = document.querySelectorAll('.barangay-list li');

if (barangays.length > 0) {
    barangays.forEach((li) => {
        li.addEventListener('click', () => {
            const text = li.textContent.trim();
            window.location.href = `./baranggay/barangayContent.html?bname=${encodeURIComponent(text)}`;
        });
    });
}

