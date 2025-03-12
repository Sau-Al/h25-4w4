<?php
// ✅ Nouvelles données récupérées du Customizer
    $main_color = get_theme_mod('main_color', '#ff0000');
    $mission_text = get_theme_mod('mission_text', 'Notre mission est de...');
    $contact_address = get_theme_mod('contact_address', '5800 Sherbrooke-est - Montréal (Québec) H1X 2A2');
    $contact_phone = get_theme_mod('contact_phone', '514-254-7131'); 
?>
    <footer style="color: <?php echo esc_attr($main_color); ?>;">
    <footer>
    <div class="piedpage global">
        <!-- Liens externes -->
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe">
        <h3>Liste sur les voyages</h3>
        <?php wp_nav_menu(array(
            "menu" => "externe",
            "container" => "nav",
        )); ?>
        </div>
        <div class="piedpage__s1__adresse">
        <!-- L'adresse et la barre de recherche  -->
        <h3>Adresse et recherche</h3>
        <div class="piedpage__s1__adresse_coord">
        <?php echo esc_html($contact_address); ?><br>
        <?php echo esc_html($contact_phone); ?>
        </div>
        <div class="piedpage__s1__adresse_recherche">
        <!-- Barre de recherche -->
        <?php get_search_form(); ?>
        </div>
        </div>
        <div class="piedpage__s1__description">
        <h3>Mission du club</h3>
        <p><?php echo esc_html($mission_text); ?></p>
        </section>
    </div>
    <section class="piedpage__s2">
        <div class="sociaux">
            <!-- Logo des réseaux sociaux -->
        <img src="https://s2.svgbox.net/materialui.svg?ic=facebook" width="20" alt="facebook">
        <img src="https://s2.svgbox.net/social.svg?ic=linkedin" width="20" alt="linkedin">
        <img src="https://s2.svgbox.net/social.svg?ic=discord" width="20" alt="discord">
        </div>
        <div class="menu__footer">
            <!-- Menu des catégories -->
        <?php wp_nav_menu(array(
                    "menu" => "principal",
                    "container" => "div"
                )); ?>
        </div>
        
    </section>
</footer>
<?php wp_footer() ?>