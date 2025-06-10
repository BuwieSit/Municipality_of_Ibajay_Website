
        const form = document.getElementById('card-popup-form');
        const docname = document.getElementById('docname');
        const docfor = document.getElementById('docfor');
        const exp = document.getElementById('docexp');
        const fee = document.getElementById('docfee');
        let isDirty = false;


        [docname, docfor, exp, fee].forEach(input => {
            input.addEventListener('input', () => {
                isDirty = true;
            });
        });

   
        // form.addEventListener('submit', function(e) {
        
        //     if (!docname.value.trim() || !docfor.value.trim() || !exp.value.trim() || !fee.value.trim() ) {
        //         e.preventDefault();
        //         alert("Fields cannot be empty.");
        //         return;
        //     }

        //     const confirmUpdate = confirm("Are you sure you want to apply these updates?");
        //     if (!confirmUpdate) {
        //         e.preventDefault();
        //     } else {
        //         isDirty = false; 
        //     }
        // });


        // window.addEventListener("beforeunload", function(e) {
        //     if (isDirty) {
        //         e.preventDefault();
        //         e.returnValue = "You have unsaved changes. Are you sure you want to leave?";
        //     }
        // });

    const editButtons = document.querySelectorAll('.editBtn');
    const allPopups = document.querySelectorAll('.card-popup');
    const closeButtons = document.querySelectorAll('.closeBtn');

    editButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const doctorCard = btn.closest('.doc-card');
            const docId = doctorCard.getAttribute('data-docid');

    
            allPopups.forEach(popup => {
                popup.style.opacity = '0';
                popup.style.pointerEvents = 'none';
            });


            const popupToShow = document.querySelector(`.card-popup[data-docid='${docId}']`);
            if (popupToShow) {
                popupToShow.style.opacity = '1';
                popupToShow.style.pointerEvents = 'all';
            }
        });
    });


    closeButtons.forEach(closeBtn => {
        closeBtn.addEventListener('click', () => {
            closeBtn.closest('.card-popup').style.opacity = '0';
            closeBtn.closest('.card-popup').style.pointerEvents = 'none';
        });
    });
