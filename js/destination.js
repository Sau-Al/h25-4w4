class DestinationFetcher {
  constructor() {
    this.domaine = document.querySelector('base')?.href || '/';
    this.destinationList = document.querySelector('.destination__list');
    this.buttons = document.querySelectorAll('.country-btn, .categorie__ul__li'); // les deux types de boutons

    this.init();
  }

  init() {
    // Par défaut, charger soit par catégorie France, soit par recherche "France"
    // Chercher un bouton avec category-id correspondant à France
    let defaultBtn = Array.from(this.buttons).find(btn => {
      const catId = btn.dataset.categoryId;
      const text = btn.dataset.searchTerm || btn.textContent.trim();
      return (catId && catId !== '0' && text.toLowerCase() === 'france') || text.toLowerCase() === 'france';
    });

    if (defaultBtn) {
      this.activateButton(defaultBtn);
      this.loadByButton(defaultBtn);
    } else if (this.buttons.length > 0) {
      // fallback : active premier bouton
      this.activateButton(this.buttons[0]);
      this.loadByButton(this.buttons[0]);
    }

    this.initCategoryButtons();
  }

  activateButton(button) {
    this.buttons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
  }

  loadByButton(button) {
    // Si data-category-id présent et valide → fetch par catégorie
    const categoryId = button.dataset.categoryId;
    // Sinon, si data-search-term ou texte → fetch par recherche
    const searchTerm = button.dataset.searchTerm || button.textContent.trim();

    // Forcer recherche par mot-clé si le texte est 'France' (insensible à la casse)
    if (searchTerm && searchTerm.toLowerCase() === 'france') {
      this.fetchArticlesBySearch(searchTerm);
    } else if (categoryId && categoryId !== '0') {
      this.fetchArticlesByCategory(categoryId);
    } else if (searchTerm && searchTerm.length > 0) {
      this.fetchArticlesBySearch(searchTerm);
    } else {
      this.destinationList.innerHTML = '<p>Aucune destination trouvée.</p>';
    }
  }

  fetchArticlesByCategory(categoryId) {
    const apiUrl = `${this.domaine}wp-json/wp/v2/posts?categories=${encodeURIComponent(categoryId)}&per_page=100`;
    console.log("Recherche catégorie :", apiUrl);
    this.fetchAndDisplay(apiUrl);
  }

  fetchArticlesBySearch(searchTerm) {
    const apiUrl = `${this.domaine}wp-json/wp/v2/posts?search=${encodeURIComponent(searchTerm)}&per_page=100`;
    console.log("Recherche par mot-clé :", apiUrl);
    this.fetchAndDisplay(apiUrl);
  }

  fetchAndDisplay(apiUrl) {
    if (!this.destinationList) return;

    fetch(apiUrl)
      .then(response => {
        if (!response.ok) throw new Error('Erreur HTTP ' + response.status);
        return response.json();
      })
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

          const titleContainer = document.createElement('div');
          titleContainer.style.display = 'flex';
          titleContainer.style.alignItems = 'center';
          titleContainer.style.cursor = 'pointer';
          titleContainer.style.gap = '5px';

          const titleElement = document.createElement('h3');
          titleElement.textContent = article.title.rendered;
          titleElement.style.margin = '0';

          const dots = document.createElement('span');
          dots.textContent = '...';
          dots.style.color = '#666';
          dots.style.fontWeight = 'bold';

          const detailsElement = document.createElement('div');
          detailsElement.classList.add('details');
          detailsElement.style.maxHeight = '0';
          detailsElement.style.overflow = 'hidden';
          detailsElement.style.transition = 'max-height 0.3s ease, padding 0.3s ease';
          detailsElement.style.padding = '0 0';

          detailsElement.innerHTML = `
            <p>${article.excerpt.rendered}</p>
            <a href="${article.link}">Lire plus</a>
          `;

          titleContainer.addEventListener('click', () => {
            if (detailsElement.style.maxHeight === '0px' || detailsElement.style.maxHeight === '') {
              detailsElement.style.maxHeight = detailsElement.scrollHeight + 'px';
              detailsElement.style.padding = '10px 0';
            } else {
              detailsElement.style.maxHeight = '0';
              detailsElement.style.padding = '0 0';
            }
          });

          titleContainer.appendChild(titleElement);
          titleContainer.appendChild(dots);

          articleElement.appendChild(titleContainer);
          articleElement.appendChild(detailsElement);

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
        this.activateButton(button);
        this.loadByButton(button);
      });
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new DestinationFetcher();
});
