<?php
    genere_vague();
    $mission_text = get_theme_mod('mission_text', 'Notre mission est de...');
    $contact_address = get_theme_mod('contact_address', '5800 Sherbrooke-est - Montréal (Québec) H1X 2A2');
    $contact_phone = get_theme_mod('contact_phone', '514-254-7131'); 
?>
    <footer class="footer">
    <div class="footer__content global">
        <!-- Liens externes -->
        <section class="footer__section">
            <h3>Liste sur les voyages</h3>
            <?php wp_nav_menu(array(
                "menu" => "externe",
                "container" => "nav",
                "menu_class" => "footer__menu"
            )); ?>
        </section>

        <!-- Adresse et recherche -->
        <section class="footer__section">
            <h3>Adresse et recherche</h3>
            <div class="footer__address">
                <p><?php echo esc_html($contact_address); ?></p>
                <p><?php echo esc_html($contact_phone); ?></p>
                <a href="mailto:<?php bloginfo('admin_email'); ?>"><?php bloginfo('admin_email'); ?></a>
            </div>
            <div class="footer__search">
                <?php get_search_form(); ?>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="footer__section">
            <h3>Abonnez-vous à notre newsletter</h3>
            <p>Recevez les dernières offres et mises à jour directement dans votre boîte de réception.</p>
            <form action="newsletter_signup.php" method="post">
            <input type="email" name="email" placeholder="Votre adresse e-mail" required>
            <button class="abonner" type="submit">S'abonner</button>
            </form>
        </section>
    </div>

    <div class="footer__bottom">
        <!-- Réseaux sociaux -->
        <div class="footer__social">
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

        <!-- Menu footer -->
        <div class="footer__menu">
            <?php wp_nav_menu(array(
                "menu" => "principal",
                "container" => "nav",
                "menu_class" => "footer__nav"
            )); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
