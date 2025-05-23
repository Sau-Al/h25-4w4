<?php
/*
Template Name: Les plus beaux pays
*/
get_header();
?>

<h1>Les plus beaux pays</h1>

<p>Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! 
    Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. 
    Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et 
    de modernité, ou de rencontres culturelles authentiques, 
    il y a un pays fait pour vous.</p>

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
            // Pas de catégorie => on met data-country pour recherche
            echo "<button class='country-btn' data-category-id='0' data-country='{$country}'>{$country} (catégorie manquante)</button>";
        }
    }
    ?>
</div>

<!-- Zone d'affichage des destinations -->
<div class="destination__list"></div>

<?php get_footer(); ?>
