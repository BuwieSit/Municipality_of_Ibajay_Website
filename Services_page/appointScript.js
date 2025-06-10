window.addEventListener('DOMContentLoaded', () => {
        
    const bookButtons = document.querySelectorAll('.appoint-btn');
    const bookPopup = document.querySelector('.doctor-popup');

    bookButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (bookPopup.style.opacity === '0') {
                bookPopup.style.opacity = '1';
                bookPopup.style.pointerEvents = 'all'; 
            }


        });
    });

    const back = document.querySelector('.backBtn');

        back.addEventListener('click', () => {
            if (bookPopup.style.opacity === '1') {
                bookPopup.style.opacity = '0';
                bookPopup.style.pointerEvents = 'none'; 
            }

        });


            const dateInput = document.getElementById("appointment_date");
            const today = new Date().toISOString().split("T")[0];
            dateInput.min = today;

            const popupDocName = document.getElementById('popup-docname');
            const bookedDocInput = document.getElementById('booked_doc');

            bookButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const docName = button.dataset.docname;


                    popupDocName.textContent = docName;
                    bookedDocInput.value = docName;

            
                    bookPopup.style.opacity = '1';
                    bookPopup.style.pointerEvents = 'auto';
                });
            });
             const timeSelect = document.getElementById("appointment_time");
             const timeOptions = Array.from(timeSelect.options).filter(opt => opt.value);

            function updateTimeOptions() {
                const selectedDate = dateInput.value;
                const now = new Date();
                const threeHoursLater = new Date(now.getTime() + 3 * 60 * 60 * 1000);

                timeOptions.forEach(option => {
                option.disabled = false;

                if (selectedDate === today) {
                    const [hour, minute] = option.value.split(":").map(Number);
                    const optionTime = new Date();
                    optionTime.setHours(hour, minute, 0, 0);

                    if (optionTime < threeHoursLater || optionTime.getHours() > 17) {
                    option.disabled = true;
                    }
                }
                });

                timeSelect.value = ""; 
            }

            dateInput.addEventListener("change", updateTimeOptions);

              const contactNumber = document.getElementById('contact_number');

            contactNumber.addEventListener('input', function () {
                // Remove any non-numeric characters immediately
                this.value = this.value.replace(/\D/g, '');
            });
});


