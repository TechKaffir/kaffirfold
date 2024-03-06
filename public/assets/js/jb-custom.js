/**
* Framework Name: Kaffirfold v1.3.0
* Framework URL: https://kaffirfold.africa
* Author: Jongi - The Tech Kaffir
* License: GNU General Public License <https://www.gnu.org/licenses/gpl-3.0.en.html>
*/
/* -------------------------------------------------------------------- */


// Variable Declaration
const themeToggler = document.querySelector('.theme-toggler');

// Upload Files
// Images
function display_image(file, e)
{
    let img = e.currentTarget.parentNode.querySelector('img');
    
    img.src = URL.createObjectURL(file);
}

// PDF Docs
function display_pdf(file, e) {
    let pdfViewer = document.getElementById('pdfViewer');
    pdfViewer.setAttribute('data', URL.createObjectURL(file));
}

// Change Theme (Dark/Light Mode)
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    // themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});

// Age Calculation
function calculateAge() {
    var dob = document.getElementById('date_of_birth').value;
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById('Age').value = age;
}

// User greeting, depending on timezone and the time of the day
window.onload = function() {
    var today = new Date();
    var hour = today.getHours();

    var greeting;
    if (hour < 12) {
        greeting = 'Good morning';
    } else if (hour >= 12 && hour < 18) {
        greeting = 'Good afternoon';
    } else {
        greeting = 'Good evening';
    }

    document.getElementById('greeting').innerHTML = greeting;
};





