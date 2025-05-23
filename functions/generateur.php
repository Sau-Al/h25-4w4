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

        // Récupérer les sous-catégories de cette catégorie parente
        $sous_categories = get_categories(array(
            'parent' => $parent_id,
            'hide_empty' => false, // Afficher même les catégories sans articles
        ));

        // Afficher les sous-catégories
        if (!empty($sous_categories)) {
            echo '<ul class="categorie__ul">';
            foreach ($sous_categories as $categorie) {
                echo '<li data-category-id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
            }
            echo '</ul>';
        }
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


// Affiche les icônes des réseaux sociaux dans le footer
if (!function_exists('afficher_icones_sociaux')) {
    function afficher_icones_sociaux() {
        $reseaux = [
            'facebook' => 'https://s2.svgbox.net/materialui.svg?ic=facebook',
            'linkedin' => 'https://s2.svgbox.net/social.svg?ic=linkedin',
            'discord'  => 'https://s2.svgbox.net/social.svg?ic=discord',
            'github'   => 'https://s2.svgbox.net/social.svg?ic=github',
        ];

        echo '<div class="footer__social">';
        foreach ($reseaux as $nom => $icone_url) {
            $lien = get_theme_mod("lien_$nom");
            if (!empty($lien)) {
                echo '<a href="' . esc_url($lien) . '" class="social-icon ' . esc_attr($nom) . '" target="_blank" rel="noopener noreferrer">';
                echo '<img src="' . esc_url($icone_url) . '" alt="' . esc_attr(ucfirst($nom)) . '">';
                echo '</a>';
            }
        }
        echo '</div>';
    }
}

// Vague d'arrière-plan
// Affiche une vague d'arrière-plan animée
// Déclare une seule fois la fonction generate_wave_path
if (!function_exists('generate_wave_path')) {
    function generate_wave_path($amplitude, $frequency, $offset = 0) {
        $points = [];
        $width = 1440;
        $height = 320;
        $step = 60; // plus petit = plus fluide

        for ($x = 0; $x <= $width; $x += $step) {
            $y = $amplitude * sin(deg2rad(($x + $offset) * $frequency)) + 200;
            $points[] = "$x,$y";
        }

        $points[] = "$width,$height";
        $points[] = "0,$height";
        $points[] = "0," . explode(',', $points[0])[1];

        return "M" . implode(" L", $points) . " Z";
    }
}

// Ta fonction principale
function genere_vague() {
    $wave1_1 = generate_wave_path(40, 0.3, 0);
    $wave1_2 = generate_wave_path(40, 0.3, 45);
    $wave1_3 = generate_wave_path(40, 0.3, 90);
    $wave1_4 = generate_wave_path(40, 0.3, 135);

    $wave2_1 = generate_wave_path(30, 0.28, 20);
    $wave2_2 = generate_wave_path(30, 0.28, 65);
    $wave2_3 = generate_wave_path(30, 0.28, 110);
    $wave2_4 = generate_wave_path(30, 0.28, 155);

    ?>
    <div class="vague-container">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#66b3ff" fill-opacity="0.4">
                <animate attributeName="d" dur="6s" repeatCount="indefinite"
                    values="<?php echo $wave2_1; ?>;
                            <?php echo $wave2_2; ?>;
                            <?php echo $wave2_3; ?>;
                            <?php echo $wave2_4; ?>;
                            <?php echo $wave2_1; ?>" />
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="vague">
            <path fill="#0099ff" fill-opacity="1">
                <animate attributeName="d" dur="5s" repeatCount="indefinite"
                    values="<?php echo $wave1_1; ?>;
                            <?php echo $wave1_2; ?>;
                            <?php echo $wave1_3; ?>;
                            <?php echo $wave1_4; ?>;
                            <?php echo $wave1_1; ?>" />
            </path>
        </svg>
    </div>
    <?php
}



