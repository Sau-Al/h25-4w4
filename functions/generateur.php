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
    if (!empty($sous_categories)) {
        echo '<ul class="categorie__ul">';
        foreach ($sous_categories as $categorie) {
            // Afficher le nom de chaque sous-catégorie
            echo '<li data-category-id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
        }
        echo '</ul>';
    }
}

/**
 * Affiche les catégories d’un article sous forme de boutons,
 * en excluant une catégorie spécifique.
 *
 * @param string $cat_a_retirer Le nom de la catégorie à exclure (ex: 'Populaire')
 */
/**
 * Affiche les catégories d’un article sous forme de boutons,
 * en excluant une catégorie spécifique, uniquement si c'est la page d'accueil.
 *
 * @param string $cat_a_retirer Le nom de la catégorie à exclure (ex: 'Populaire')
 */
function categorie_par_destination($cat_a_retirer) {
    // Vérifier si on est sur la page d'accueil (front-page.php)
    if (is_front_page()) {
        $categories = get_the_category();

        if (!empty($categories)) {
            foreach ($categories as $cat) {
                // Exclure la catégorie "Populaire" uniquement sur la page d'accueil
                if (strtolower($cat->name) !== strtolower($cat_a_retirer)) {
                    echo '<a class="carte__bouton" href="' . esc_url(get_category_link($cat->term_id)) . '">';
                    echo esc_html($cat->name);
                    echo '</a> ';
                }
            }
        }
    } else {
        // Si ce n'est pas la page d'accueil, afficher toutes les catégories
        the_category(' ');
    }
}


// Génère une ou plusieurs vagues SVG animées
function genere_vague() {
    // Génère une forme de vague selon amplitude, fréquence et décalage
    function generate_wave_path($amplitude, $frequency, $offset = 0) {
        $points = [];
        $width = 1440;
        $height = 320;
        $step = 60; // Plus petit = animation plus fluide

        for ($x = 0; $x <= $width; $x += $step) {
            // Calcul de l'ordonnée selon une sinusoïde
            $y = $amplitude * sin(deg2rad(($x + $offset) * $frequency)) + 200;
            $points[] = "$x,$y";
        }

        // Fermeture du chemin vers le bas du SVG
        $points[] = "$width,$height";
        $points[] = "0,$height";
        $points[] = "0," . explode(',', $points[0])[1]; // refermer avec le premier y

        return "M" . implode(" L", $points) . " Z";
    }

    // Création de plusieurs états de vague pour l'animation
    $wave1 = generate_wave_path(40, 0.3, 0);
    $wave2 = generate_wave_path(40, 0.3, 45);
    $wave3 = generate_wave_path(40, 0.3, 90);
    $wave4 = generate_wave_path(40, 0.3, 135);
    ?>

    <svg style="position: relative; display: block; width: 100%; height: 320px;" class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#0099ff" fill-opacity="1">
            <animate attributeName="d" dur="5s" repeatCount="indefinite"
                values="<?php echo $wave1; ?>;
                        <?php echo $wave2; ?>;
                        <?php echo $wave3; ?>;
                        <?php echo $wave4; ?>;
                        <?php echo $wave1; ?>" />
        </path>
    </svg>

<?php
}

