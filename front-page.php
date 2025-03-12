    <?php get_header(); ?>
    <!-- Zone Hero -->
    <?php get_template_part('gabarits/hero'); ?>
    
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