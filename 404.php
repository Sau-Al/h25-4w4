<!-- Customizers -->
<!-- Couleur, image arriere plan, titre, texte -->
 <!-- Creer un sass pour la page 404 -->

<?php get_header(); ?>
<?php $error_background = get_theme_mod('error_background', ''); ?>
    <section class="section_404" style="background-image: url('<?php echo esc_url(get_theme_mod('error_background')); ?>');">
        <div class="texte_erreur">
            <div class="titre_404">
                <h1>Oops, vous avez échoué sur l'île 404 !</h1>
            </div>
            <div class="para_404"><p>Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !</p></div>
            <button class="bouton_pg_error">Retour à la page d'accueil</button>
        </div>
        <!-- Menu -->
        <?php wp_nav_menu(array(
                "menu" => "404",
                "container" => "nav",
                "menu_class" => "erreur__menu"
            )); ?>
    </section>
    <?php get_footer(); ?>
   
</body>
</html>