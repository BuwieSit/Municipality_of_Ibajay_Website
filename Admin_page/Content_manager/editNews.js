
// setTimeout(() => {
//     const form = document.querySelector('.news-action-form');
//     const popupBox = document.getElementById('addedPopup');

//     if (form) {
//         form.addEventListener('submit', async (e) => {
//             e.preventDefault();

//             const formData = new FormData(form);

//             try {
//                 const response = await fetch(form.action, {
//                     method: 'POST',
//                     body: formData,
//                 });

//                 const result = await response.text();
//                 if (result.trim() === "success") {
//                     popupBox.style.display = 'block';

//                     setTimeout(() => {
//                         popupBox.style.display = 'none';
//                         // Optionally reload:
//                         // window.location.reload();
//                     }, 2000);
//                 } else {
//                     alert("Submission failed: " + result);
//                 }
//             } catch (err) {
//                 console.error("AJAX Error:", err);
//                 alert("An error occurred.");
//             }
//         });
//     }
// }, 0);