// Smooth Scrolling
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Form Validation Feedback
document.querySelector('form').addEventListener('submit', function(e) {
    const name = document.getElementById('name').value.trim();
    const contact = document.getElementById('contact').value.trim();
    const message = document.getElementById('message').value.trim();

    if (!name || !contact || !message) {
        alert('Please fill out all fields before submitting.');
        e.preventDefault(); // Prevent form submission
    }
});

// Back to Top Button
const backToTop = document.createElement('button');
backToTop.textContent = '↑ Top';
backToTop.style.position = 'fixed';
backToTop.style.bottom = '20px';
backToTop.style.right = '20px';
backToTop.style.padding = '10px';
backToTop.style.border = 'none';
backToTop.style.borderRadius = '5px';
backToTop.style.backgroundColor = 'lightseagreen';
backToTop.style.color = 'white';
backToTop.style.cursor = 'pointer';
backToTop.style.display = 'none';
document.body.appendChild(backToTop);

window.addEventListener('scroll', () => {
    backToTop.style.display = window.scrollY > 300 ? 'block' : 'none';
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Hero Text Animation
const heroText = document.querySelector('.hero h2');
let isGrowing = true;
setInterval(() => {
    heroText.style.transform = isGrowing ? 'scale(1.05)' : 'scale(1)';
    heroText.style.transition = 'transform 0.5s ease';
    isGrowing = !isGrowing;
}, 1000);
