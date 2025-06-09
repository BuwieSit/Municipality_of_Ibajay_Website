
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

   
        form.addEventListener('submit', function(e) {
        
            // if (!docname.value.trim() || !docfor.value.trim() || !exp.value.trim() || !fee.value.trim() ) {
            //     e.preventDefault();
            //     alert("Fields cannot be empty.");
            //     return;
            // }

            const confirmUpdate = confirm("Are you sure you want to apply these updates?");
            if (!confirmUpdate) {
                e.preventDefault();
            } else {
                isDirty = false; 
            }
        });


        window.addEventListener("beforeunload", function(e) {
            if (isDirty) {
                e.preventDefault();
                e.returnValue = "You have unsaved changes. Are you sure you want to leave?";
            }
        });
   