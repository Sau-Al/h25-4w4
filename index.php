    <?php get_header(); ?>
    <section class="hero">
        <div class="hero__contenu  global">
            <h1 class="hero__titre">Voyager autremement avec Fly High!</h1>
            <p class="hero__description">Découvrez des destinations uniques et inoubliables avec Air Miles. Nous vous offrons des expériences authentiques,
                des paysages à couper le souffle eet des aventures sur mesure. Partez à la découverte du monde avec nous et créez des souvenirs impérissables.
            </p>
            <p class="hero__courriel">
                <a href="#">info@cmaisonneuve.qc.ca</a>
            </p>
            <p class="hero__adresse">5800 Sherbrooke-est - Montréal (Québec) h1X 2A2</p>
            <p class="hero__numero">514-254-7131</p>
            <button class="hero__button">
                S'inscrire
            </button>
            <div class="hero__sociaux">
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
            <div class="galerie__images">
                <figure class="galerie__figure">
                <img src="images/france.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/japon.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/kayak.avif" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/malta.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/plage_nuit.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/chine.png" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/plage.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/vietnam.jpg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/montagnes.jpeg" alt="" class="galerie__img">
                </figure>
                <figure class="galerie__figure">
                <img src="images/japon.jpeg" alt="" class="galerie__img">
                </figure>
            </div>
            
        </div>
</section>
<section class="populaire">
<div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <div><?php echo wp_trim_words(get_the_content(), 10, " ... "); ?></div>
                </article>
            <?php endwhile; endif; ?>
        </div>
</section>

    <footer>
    </footer>
    <?php wp_footer() ?>
</body>
</html>