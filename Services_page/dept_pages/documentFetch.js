// const params = new URLSearchParams(window.location.search);
// const dept = params.get('content') || 'civilregistry';

// fetch('./documentHandler.php?content=' + dept)

//     .then(response => response.json())
//     .then(data => {
//         const container = document.getElementById('serviceDocuments');

//         if (!Array.isArray(data) || data.length === 0) {
//             container.innerHTML = '<p>No documents available at the moment</p>';
//             return;
//         }

//         data.forEach(docu => {
//             const document = document.createElement('div');
//             document.className = 'document';

//             document.setAttribute('data-filename', docu.filename);

//             document.innerHTML = `
//                 <img id="docu-icon" src="../../z-resources/Permits-icon/birth.png">
//                 <p class="docu-name">${docu.filename}</p>
//             `;

//             container.appendChild(document);
//         });
//     })
//     .catch(err => {
//         console.error('Error fetching data:', err);
//     });
