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

<!-- Menu de pays -->
<select id="countrySelector">
    <?php
    $countries = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];
    foreach ($countries as $country) {
        $slug = sanitize_title($country); // ex: États-Unis => etats-unis
        echo "<option value='{$slug}'>$country</option>";
    }
    ?>
</select>

<!-- Bouton d'action -->
<button id="loadDestinations">Afficher les destinations</button>

<!-- Zone de contenu -->
<div id="destinations"></div>

<!-- Accordéon CSS -->
<style>
.accordion { cursor: pointer; padding: 10px; background: #f1f1f1; border: none; outline: none; transition: 0.3s; width: 100%; text-align: left; font-size: 1.1rem; }
.accordion:hover { background-color: #ddd; }
.panel { padding: 0 10px; display: none; background-color: white; overflow: hidden; border: 1px solid #ddd; margin-bottom: 10px; }
</style>

<script src="<?php echo get_template_directory_uri(); ?>/js/destination.js"></script>

<?php get_footer(); ?>
