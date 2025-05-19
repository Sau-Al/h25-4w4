<?php get_header(); ?>
<?php $error_background = get_theme_mod('error_background', ''); ?>
    <section class="error" style="background-image: url('<?php echo esc_url(get_theme_mod('error_background')); ?>');">
        <div class="texte_erreur">
            <h1>Désolé!</h1>
            <h3>La page que vous recherchez ne peut pas être trouvée.</h3>
            <p>Les raisons possibles à ce problème:</p>
            <ul>
                <li>
                    L'adresse n'est pas bien écrite.
                </li>
                <li>
                    Le lien est brisé ou trop vieux.
                </li>
            </ul>
            <button class="bouton_pg_error">Retour à la page d'accueil</button>
            <button class="bouton_pg_error">Aide</button>
        </div>
        <div class="recherche_erreur">
        <div class="texte_erreur_recherche">
            <h1>Rechercher une nouvelle destination!</h1>
            <h3>Découvrez plusieurs endroits formidables pour vos prochains vacances</h3>
            </div>
            <?php get_search_form(); ?>
            <p>Veuiller visiter nos réseaux sociaux pour toute autres infos</p>
            <!-- Réseaux sociaux -->
            <div class="error__social">
            <a href="#" class="social-icon facebook">
                <img src="https://s2.svgbox.net/materialui.svg?ic=facebook" alt="Facebook">
            </a>
            <a href="#" class="social-icon linkedin">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin" alt="LinkedIn">
            </a>
            <a href="#" class="social-icon discord">
                <img src="https://s2.svgbox.net/social.svg?ic=discord" alt="Discord">
            </a>
            </div>
        </div>
        
    </section>
    <?php get_footer(); ?>
   
</body>
</html>