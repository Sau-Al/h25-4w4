/**
 * Script JS permettant d'extraire des destinations de voyage (VERSION EN CLASSE + search/categorie)
 */

class DestinationFetcher {
  constructor() {
    this.domaine = document.querySelector('base')?.href || '/';
    this.defaultCategoryId = 3; // ID par défaut, modifie si besoin
    this.destinationList = document.querySelector('.destination__list');
    this.buttons = document.querySelectorAll('.country-btn');

    this.init();
  }

  init() {
    // Chargement par défaut
    this.fetchArticlesByCategory(this.defaultCategoryId);

    // Initialisation des boutons
    this.initCategoryButtons();
  }

  fetchArticlesByCategory(categoryId) {
    const apiUrl = `${this.domaine}wp-json/wp/v2/posts?categories=${encodeURIComponent(categoryId)}`;
    console.log("Fetching by category:", apiUrl);
    this.fetchAndDisplay(apiUrl);
  }

  fetchArticlesBySearch(searchTerm) {
    const apiUrl = `${this.domaine}wp-json/wp/v2/posts?search=${encodeURIComponent(searchTerm)}`;
    console.log("Fetching by search:", apiUrl);
    this.fetchAndDisplay(apiUrl);
  }

  fetchAndDisplay(apiUrl) {
    if (!this.destinationList) {
      console.warn("Zone d'affichage non trouvée.");
      return;
    }

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        this.destinationList.innerHTML = '';

        if (data.length === 0) {
          this.destinationList.innerHTML = '<p>Aucune destination trouvée.</p>';
          return;
        }

        data.forEach((article, index) => {
          const articleElement = document.createElement('div');
          articleElement.classList.add('fade-in');
          articleElement.style.animationDelay = `${index * 100}ms`;
          articleElement.innerHTML = `
            <div class="article">
              <h3>${article.title.rendered}</h3>
              <p>${article.excerpt.rendered}</p>
              <a href="${article.link}">Lire plus</a>
            </div>
          `;
          this.destinationList.appendChild(articleElement);
        });
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des articles :', error);
        this.destinationList.innerHTML = '<p>Erreur lors du chargement des destinations.</p>';
      });
  }

  initCategoryButtons() {
    if (this.buttons.length === 0) {
      console.warn("Aucun bouton de pays trouvé.");
      return;
    }

    this.buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        e.preventDefault();

        // Gestion des classes actives
        this.buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const categoryId = button.dataset.categoryId;
        const countryName = button.dataset.country;

        if (categoryId && categoryId !== '0') {
          this.fetchArticlesByCategory(categoryId);
        } else if (countryName) {
          this.fetchArticlesBySearch(countryName);
        } else {
          console.warn("Aucune donnée valide (catégorie ou pays) trouvée sur ce bouton.");
          this.destinationList.innerHTML = '<p>Aucune destination trouvée.</p>';
        }
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new DestinationFetcher();
});
