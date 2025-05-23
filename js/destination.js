class DestinationFetcher {
  constructor() {
    this.domaine = document.querySelector('base')?.href || '/';
    this.destinationList = document.querySelector('.destination__list');
    this.buttons = document.querySelectorAll('.country-btn');

    this.init();
  }

  init() {
    // Chargement par défaut : recherche "France"
    this.fetchArticlesBySearch("France");
    this.initCategoryButtons();
  }

  fetchArticlesBySearch(searchTerm) {
    const apiUrl = `${this.domaine}wp-json/wp/v2/posts?search=${encodeURIComponent(searchTerm)}`;
    console.log("Recherche :", apiUrl);
    this.fetchAndDisplay(apiUrl);
  }

  fetchAndDisplay(apiUrl) {
    if (!this.destinationList) return;

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
        console.error('Erreur de chargement :', error);
        this.destinationList.innerHTML = '<p>Erreur lors du chargement des destinations.</p>';
      });
  }

  initCategoryButtons() {
    this.buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        e.preventDefault();
        this.buttons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const countryName = button.dataset.country || button.textContent.trim();
        if (countryName) {
          this.fetchArticlesBySearch(countryName);
        } else {
          this.destinationList.innerHTML = '<p>Aucune destination trouvée.</p>';
        }
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new DestinationFetcher();
});
