<?php
/*
Template Name: Les plus beaux pays
*/
get_header();
?>

<h1 class="titre__pays" >Les plus beaux pays</h1>

<p class="description__pays">Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! 
    Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. 
    Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et 
    de modernité, ou de rencontres culturelles authentiques, 
    il y a un pays fait pour vous.</p>

<!-- Galerie Wordpress -->
<section class="galerie__photos">
    <div class="photos__conteneur">
        <?php
        $photos_query = new WP_Query([
            'category_name' => 'photos',
            'posts_per_page' => -1
        ]);

        if ($photos_query->have_posts()) :
            while ($photos_query->have_posts()) : $photos_query->the_post();
                // Récupérer toutes les images insérées dans le contenu de l’article
                $content = apply_filters('the_content', get_the_content());
                // Extraire les balises <img> uniquement
                preg_match_all('/<img[^>]+>/i', $content, $matches);
                if (!empty($matches[0])) :
        ?>
            <article class="photo__item">
                <div class="photo__gallery">
                    <?php foreach ($matches[0] as $img_tag) {
                        echo $img_tag;
                    } ?>
                </div>
            </article>
            <?php
                endif;
            endwhile;
            wp_reset_postdata();
        else :
            echo "<p>Aucune photo trouvée pour le moment.</p>";
        endif;
        ?>
    </div>
</section>

<?php
// Appel de la vague animée (la deuxième vague + la première en avant-plan)
genere_vague();
?>

<!-- Boutons des pays -->
<div class="destination__categories">
    <?php
    $countries = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];
    foreach ($countries as $country) {
        $slug = sanitize_title($country);
        $category = get_category_by_slug($slug);
        if ($category) {
            echo "<button class='country-btn' data-category-id='{$category->term_id}'>{$country}</button>";
        } else {
            // Pas de catégorie => on garde les data, mais sans texte supplémentaire visible
            echo "<button class='country-btn' data-category-id='0' data-country='{$country}'>{$country}</button>";
        }
    }
    ?>
</div>

<!-- Zone d'affichage des destinations -->
 <div class="liste">
    <div class="destination__list"></div>
 </div>


<!-- Seconde vague décorative (arrière-plan) -->
<div class="wave-separator" style="width: 100%; overflow: hidden; line-height: 0;">
    <svg viewBox="0 0 1440 150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display: block; width: 100%; height: 150px;">
        <path d="M0,96 C360,32 1080,160 1440,96 L1440,0 L0,0 Z" fill="#f0f4f8" />
    </svg>
</div>

<?php get_footer(); ?>
