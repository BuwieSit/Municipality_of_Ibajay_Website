 fetch('./appointmentHandler.php')
              .then(response => response.json())
              .then(data => {
                const container = document.getElementById('doctors');

                data.forEach(row => {
                  const doctorCont = document.createElement('div');
                  doctorCont.className = 'doctor-cont';
                  doctorCont.setAttribute('data-docname', row.doctor_name);
                  doctorCont.setAttribute('data-docfor', row.doctor_for);
                  doctorCont.setAttribute('data-docexp', row.exp);
                  doctorCont.setAttribute('data-docfee', row.fee);

                  doctorCont.innerHTML = `
                    <div class="docleft-wrapper">
                        <img id="docProfile"
                        src="../ADMIN_CONTROLS/doctor_images/${row.doctor_image || 'default_image.png'}"
                        alt="doctor profile"
                        onerror="this.onerror=null; this.src='../ADMIN_CONTROLS/doctor_images/default_image.png'">


                        <div class="doctor-info">
                        <h4 id="docname" name="docname">${row.doctor_name}</h4>
                        <p id="docpost">${row.doctor_for}</p>
                        <p id="docexp">${row.exp}</p>
                        </div>
                    </div>

                    <div class="docright-wrapper">
                        <div class="schedule-cont">
                            <h4 id="schedtitle">Doctor's Fee</h4>
                            <p id="docfee">₱${row.fee}</p>
                        </div>  
                        
                        <button class="appoint-btn" data-docname="${row.doctor_name}">Book Appointment</button>
                    </div>
                  `;

                  container.appendChild(doctorCont);
                });
              })
              .catch(err => {
                console.error('Error fetching Doctor data:', err);
              });