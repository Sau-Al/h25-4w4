    <?php get_header(); ?>
    <?php 
    $hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
    $hero_background = get_theme_mod('hero_background', ''); 
    $hero_cta_text = get_theme_mod('hero_cta_text', 'Default CTA');
    $hero_cta_link = get_theme_mod('hero_cta_link', '#');
    ?>
    <section class="hero" style="background-image: url(<?php echo $hero_background?>)">
        <div class="hero__contenu  global">
            <h1 class="hero__titre"><?php bloginfo('name'); ?></h1>
            <p class="hero__description"><?php bloginfo('description'); ?>
            </p>
            <p class="hero__courriel">
                <a href="#"><?php bloginfo('admin_email'); ?></a>
            </p>
            <p class="hero__adresse">5800 Sherbrooke-est - Montréal (Québec) h1X 2A2</p>
            <p class="hero__numero">514-254-7131</p>
            <p class="hero_auteur">Auteur: <?php echo $hero_auteur?></p>
            <button class="hero__button">
            <?php echo $hero_cta_text?> 
            </button>
            <div class="hero__sociaux">
                <!-- Les émoticons des réseaux sociaux -->
                <img src="https://s2.svgbox.net/materialui.svg?ic=facebook" width="20" alt="facebook">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin" width="20" alt="linkedin">
                <img src="https://s2.svgbox.net/social.svg?ic=discord" width="20" alt="discord">
            </div>
        </div>
    </section>
    
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
            <h2>Nos destinations préférées</h2>
        </div>
</section>
<section class="populaire">
<div class="global">
    <!-- La galerie -->
            <?php if (have_posts()) : while (have_posts()) : the_post();
            if (in_category("galerie")) {
                the_content();
            } else {
            ?>
            <div class="cartes">
                <!-- Les cartes -->
                <?php get_template_part("gabarits/carte");?>
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
</section>
<footer></footer>
<?php get_footer(); ?>
</body>
</html>