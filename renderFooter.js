const foot = document.querySelector('footer');

function routing() {
  const path = window.location.pathname;
  const depth = path.split('/').filter(Boolean).length;

  // Define link prefixes depending on the depth
  let prefix = './';
  if (depth === 2) prefix = '../';
  if (depth >= 3) prefix = '../../';

  const footContents = `
       <footer class = "footer">
            
            <section class="logo-text">
                <img src= "${prefix}z-resources/ibajay_logo.png" style = "width: 200px; height: auto;" />
                <h1 id="footerTitle">Municipality of Ibajay</h1>
            </section>

            <section class = "paragraph">
                <p>Ibajay lies in the northwest section of Aklan province on Panay Island. It is 
                bounded on the north by the Sibuyan Sea, east by Tangalan, west by Nabas, and south
                 by Antique. The distance from Kalibo, the capital of Aklan, is 34 kilometres (21 mi) 
                 and takes 45 minutes to one hour by road transport. Its road networks are composed of 
                 16 kilometres (9.9 mi) of National Road, 32.918 kilometres (20.454 mi) of Provincial 
                 Roads, and 75.430 kilometres (46.870 mi) of Barangay Road.
                 </p>
            
            </section>
             
           
        </footer>
  `;

  if (foot) {
    foot.innerHTML = footContents;
  } else {
    console.error("No <footer> element found on the page.");
  }
}

routing();


 