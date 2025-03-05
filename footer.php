<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe">
        <h3>Liste sur les voyages</h3>
        <?php wp_nav_menu(array(
            "menu" => "externe",
            "container" => "nav",
        )); ?>
        </div>
        <div class="piedpage__s1__adresse">
        <h3>Adresse et recherche</h3>
        <div class="piedpage__s1__adresse_coord">
        5800 Sherbrooke-est - Montréal (Québec) h1X 2A2
        514-254-7131
        </div>
        <div class="piedpage__s1__adresse_recherche">
        <?php get_search_form(); ?>
        </div>
        </div>
    
        <div class="piedpage__s1__description">
        <h3>Mission du club</h3>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quod exercitationem quae ea incidunt quaerat provident alias voluptas sapiente eos dolores, reprehenderit iusto maiores odit commodi, eius cumque odio? Tenetur?
    
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