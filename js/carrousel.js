(function () {
    console.log("carrousel.js");
 
    const radios = document.querySelectorAll('.hero__radio__input');
    const slides = document.querySelectorAll('.hero__carrousel');
    let currentIndex = 0;
    let intervalID;
 
    console.log("Nombre d'inputs =", radios.length);
    console.log("Nombre de slides =", slides.length);
 
    // Fonction pour afficher uniquement le slide actif
    function afficherSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
            radios[i].checked = (i === index); // synchronise le bouton radio
        });
        currentIndex = index;
    }
 
    // Initialisation : afficher le premier slide
    afficherSlide(0);
 
    // Ajouter un écouteur à chaque bouton radio
    radios.forEach((radio, index) => {
        radio.addEventListener('change', function () {
            afficherSlide(index);
            restartInterval(); // recommencer l’intervalle après interaction
        });
    });
 
    // Fonction pour passer au slide suivant automatiquement
    function slideSuivant() {
        const prochainIndex = (currentIndex + 1) % slides.length;
        afficherSlide(prochainIndex);
    }
 
    // Démarre l'animation automatique
    function startInterval() {
        intervalID = setInterval(() => {
            slideSuivant();
        }, 5000);
    }
 
    function restartInterval() {
        clearInterval(intervalID);
        startInterval();
    }
 
    // Lancer l’animation au démarrage
    startInterval();
})();