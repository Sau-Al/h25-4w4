<?php
 /**
  * Génére une liste de sous-catégories
  * @param string $parent_slug Le slug de la catégorie parente
  */
 function categories_liste($parent_slug){
// Récupérer la catégorie parente à partir de son slug
$parent_category = get_category_by_slug($parent_slug);
// Vérifier si la catégorie parente existe
if ($parent_category) {
    $parent_id = $parent_category->term_id;
}
// Récupérer les sous-catégories de "destination"
$sous_categories = get_categories(array(
    'parent' => $parent_id, // Filtrer par le parent "destination"
    'hide_empty' => true, // Ne pas afficher les catégories vides
));
// Vérifier s'il y a des sous-catégories
if (!empty($sous_categories)) {echo '<ul class="categorie__ul">';
    foreach ($sous_categories as $categorie) {
        // Afficher le nom de chaque sous-catégorie
        echo '<li  data-category-id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
    }
    echo '</ul>';
 }
}
// Génère une ou plusieurs vagues svg
function genere_vague(){?>
<svg style="top:200px" class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L48,266.7C96,245,192,203,288,181.3C384,160,480,160,576,170.7C672,181,768,203,864,202.7C960,203,1056,181,1152,197.3C1248,213,1344,267,1392,293.3L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
<?php
}