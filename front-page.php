<?php get_header(); ?>
<!-- Zone Hero -->
<?php get_template_part('gabarits/hero');
$mission_background = get_theme_mod('mission_background', ''); 

$mission_text = get_theme_mod('mission_text', 'Notre mission est de...');?>

<section class="form__principale">
    <div class="hero__form">
        <form>
            <div class="form__reponse">
                <label for="lname">Nom:</label><br>
                <input type="text" class="form__input" name="lname" placeholder="Écrivez votre nom"><br>
            </div>
            <div class="form__reponse">
                <label for="fname">Prénom:</label><br>
                <input type="text" class="form__input" name="fname" placeholder="Écrivez votre prénom"><br>
            </div>
            <div class="form__reponse">
                <label for="courriel">Courriel:</label><br>
                <input type="text" class="form__input" name="courriel" placeholder="Écrivez votre courriel"><br>    
            </div>
            <div class="form__reponse">
                <label for="tel">Téléphone:</label><br>
                <input type="text" class="form__input" name="tel" placeholder="Écrivez votre Téléphone"><br>
            </div>
            <button class="form__button">S'inscrire</button>
        </form>
    </div>
</section>

<section class="galerie">
    <div class="galerie global">
        <h2>Les merveilles du monde</h2>
        <p>Nous cherchons à fournir un contenu authentique à tout voyageur du monde entier.</p>
    </div>
</section>

<section class="front__page populaire">
    <div class="global">
        <!-- La galerie -->
        <?php 
        $has_displayed_title = false; // Variable pour vérifier si le titre a été affiché
        if (have_posts()) : while (have_posts()) : the_post();
            if (in_category("galerie")) {
                the_content();
            } else { // Affiche le titre une seule fois avant la première carte
                if (!$has_displayed_title) {
                    echo '<h2>Destinations Populaires</h2>';
                    $has_displayed_title = true; // Empêche l'affichage du titre plusieurs fois
                }
        ?>
        <div class="cartes">
            <!-- Les cartes -->
            <?php get_template_part("gabarits/carte");?>
        <?php } ?>
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="mission" style="background-image: url('<?php echo esc_url(get_theme_mod('mission_background')); ?>');">
    <div class="texte__booking">
        <h2>Ici pour créer les vacances parfaites pour vous!</h2>
        <p><?php echo esc_html($mission_text); ?></p>
        <button class="booking">Réserver maintenant</button>
    </div>
</section>

<!-- Section des destinations, avec la fonction de catégories -->
<section class="destination">
    <h2 class="destination__titre">Explorez nos destinations</h2>
    <!-- Appel de la fonction pour afficher les catégories, en excluant "Populaire" uniquement sur la page d'accueil -->
    <?php categorie_par_destination('Populaire'); ?>  
    <div class="destination__list"></div>
</section>

<footer></footer>
<?php get_footer(); ?>
</body>
</html>
