<?php get_header(); ?>
<?php $mission_background = get_theme_mod('error_background', ''); ?>
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
    </section>
    <?php get_footer(); ?>
   
</body>
</html>