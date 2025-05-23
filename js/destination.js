/**
 * Script JS permettant d'extraire des destinations de voyage (VERSION EN CLASSE + corrigée)
 */

(function () {
    console.log("destination.js");

    const defaultCategoryId = 3; // ID par défaut de la catégorie
    const domaine = document.querySelector('base')?.href || '/';

    // Charger les articles au démarrage
    fetchArticles(defaultCategoryId);
    initCategoryButtons();

    // Fonction pour récupérer les articles selon une catégorie
    function fetchArticles(categoryId) {
        const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${encodeURIComponent(categoryId)}`;
        console.log("Fetching from API:", apiUrl);

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const destinationList = document.querySelector('.destination__list');
                if (!destinationList) return;

                destinationList.innerHTML = ''; // Réinitialise la liste

                data.forEach((article, index) => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('fade-in'); // Pour l'animation CSS
                    articleElement.style.animationDelay = `${index * 100}ms`;

                    articleElement.innerHTML = `
                        <div class="article">
                            <h3>${article.title.rendered}</h3>
                            <p>${article.excerpt.rendered}</p>
                            <a href="${article.link}">Lire plus</a>
                        </div>
                    `;

                    destinationList.appendChild(articleElement);
                });
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des articles :', error);
            });
    }

    // Fonction pour gérer les clics sur les boutons de catégories
    function initCategoryButtons() {
        const buttons = document.querySelectorAll(".categorie__ul__li");

        if (buttons.length === 0) {
            console.warn("Aucun bouton de catégorie trouvé.");
            return;
        }

        buttons.forEach(button => {
            button.addEventListener('mousedown', (e) => {
                e.preventDefault();

                // Gestion des classes actives
                buttons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Récupérer l'ID de catégorie depuis data-category-id
                const categoryId = button.dataset.categoryId;
                if (!categoryId) {
                    console.warn("Aucun ID de catégorie trouvé pour ce bouton.");
                    return;
                }

                console.log(`Catégorie cliquée : ${categoryId}`);
                fetchArticles(categoryId);
            });
        });
    }

})();
