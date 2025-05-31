
const bname = document.getElementById('bName');
if (bname) {
    const params = new URLSearchParams(window.location.search);
    const name = params.get('bname');
    if (name) {
        bname.innerText = 'Barangay ' + name;

        fetch('./data/barangays.json')
            .then(response => response.json())
            .then(data => {
                if (data[name]) {
                    const bdata = data[name];
                    let chairman = document.getElementById('chairman');
                    let skchairman = document.getElementById('SKchairman');

                    chairman.innerText = bdata.chairman;
                    skchairman.innerText = bdata.skchairman;
                    
                        const ul = document.getElementById('kagawads');
                        const ulsk = document.getElementById('sklist')
                        ul.innerHTML = ''; // Clear old list

                        bdata.Kagawads.forEach(name => {
                            const li = document.createElement('li');
                            li.textContent = name;
                            ul.appendChild(li);
                        });

                        bdata.sk_kagawads.forEach(skname => {
                            const skli = document.createElement('li');
                            skli.textContent = skname;
                            ulsk.appendChild(skli);
                        });
                    }                  
                    else {
                        document.getElementById('bName').innerText = "Barangay Not Found";
                    }   
            });
    }

    
}