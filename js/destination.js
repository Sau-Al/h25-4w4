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

// Page Pays
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("btnPaysSearch");
    const select = document.getElementById("searchCountry");
    const container = document.querySelector(".destination__list__search");

    btn.addEventListener("click", () => {
        const country = select.value;
        if (!country) return;

        container.innerHTML = "<p>Chargement...</p>";

        const url = `/wp-json/wp/v2/posts?search=${encodeURIComponent(country)}&per_page=10`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                if (!data.length) {
                    container.innerHTML = `<p>Aucune destination trouvée pour ${country}.</p>`;
                    return;
                }

                let html = "";
                data.forEach(post => {
                    html += `
                        <div class="accordion-container">
                            <button class="accordion">${post.title.rendered}</button>
                            <div class="panel">
                                ${post.excerpt.rendered}
                                <a href="${post.link}">Lire plus</a>
                            </div>
                        </div>`;
                });

                container.innerHTML = html;
                initAccordion();
            })
            .catch(err => {
                console.error(err);
                container.innerHTML = "<p>Erreur lors du chargement.</p>";
            });
    });

    function initAccordion() {
        const acc = document.querySelectorAll(".accordion");
        acc.forEach(btn => {
            btn.addEventListener("click", function () {
                this.classList.toggle("active");
                const panel = this.nextElementSibling;
                panel.style.display = panel.style.display === "block" ? "none" : "block";
            });
        });
    }
});
