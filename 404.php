<!-- Customizers -->
<!-- Couleur, image arriere plan, titre, texte -->
 <!-- Creer un sass pour la page 404 -->
<?php
    $erreur_text = get_theme_mod('erreur_text', 'OOPS');
    $erreur_parag = get_theme_mod('erreur_parag', '');
    $erreur_cta_text = get_theme_mod('erreur_cta_text', 'Default CTA'); 
?> 


<?php get_header(); ?>
<?php $error_background = get_theme_mod('error_background', ''); ?>
    <section class="section_404" style="background-image: url('<?php echo esc_url(get_theme_mod('error_background')); ?>');">
       <div class="erreur__global">
            <div class="texte_erreur">
                <div class="titre_404">
                    <h1><?php echo esc_html($erreur_text); ?></h1>
                </div>
                <div class="para_404">
                    <p><?php echo esc_html($erreur_parag); ?></p></div>
                    <button class="bouton_pg_error"><?php echo esc_html($erreur_cta_text); ?></button>
                </div>
            <!-- Menu -->
            <?php wp_nav_menu(array(
                "menu" => "404",
                "container" => "nav",
                "menu_class" => "erreur__menu"
            )); ?>
        </div>
    </section>
    <?php get_footer(); ?>
   
</body>
</html>