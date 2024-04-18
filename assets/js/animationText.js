// Sélectionnez les éléments à animer
const h1 = document.querySelector('#secondPart h1');
const span = document.querySelector('#secondPart .qui-suis-je');

const halfWidthH1 = h1.offsetWidth / 2;
const halfWidthSpan = span.offsetWidth / 2;

// Variable pour stocker l'état actuel de l'animation
let animationInProgress = false;

// Fonction pour animer les éléments
function animateElements() {
    // Définir animationInProgress sur true pour indiquer que l'animation est en cours
    animationInProgress = true;

    h1.style.transform = `translateX(calc(50vw - ${halfWidthH1}px))`;
    h1.style.transition = 'transform 3s ease'; // Animation de 1 seconde avec une transition de type ease

    span.style.transform = `translateX(calc(-50vw + ${halfWidthSpan}px))`;
    span.style.transition = 'transform 3s ease'; // Animation de 1 seconde avec une transition de type ease
}

// Fonction pour annuler l'animation
function resetAnimation() {
    // h1.style.transform = ''; // Réinitialiser la transformation
    // span.style.transform = ''; // Réinitialiser la transformation
    h1.style.transform = `translateX(calc(-50vw + ${halfWidthH1}px))`;
    h1.style.transition = 'transform 3s ease'; // Animation de 1 seconde avec une transition de type ease

    span.style.transform = `translateX(calc(50vw - ${halfWidthSpan}px))`;
    span.style.transition = 'transform 3s ease'; // Animation de 1 seconde avec une transition de type ease


    animationInProgress = false; // Animation terminée
}

// Fonction pour détecter le défilement
window.addEventListener('scroll', () => {
    const secondPart = document.querySelector('#secondPart');
    const rect = secondPart.getBoundingClientRect();

    // Si le haut de la seconde partie est visible dans la fenêtre
    if (rect.top <= window.innerHeight * 0.90 && !animationInProgress) {
        animateElements();
    } else if (window.scrollY < 101 && animationInProgress) { // Si l'utilisateur fait défiler vers le haut et que l'animation est en cours
        resetAnimation(); // Réinitialiser l'animation
    }
});

// Exécutez la fonction une fois lors du chargement de la page (au cas où la seconde partie soit déjà visible au chargement)
window.addEventListener('load', animateElements);

