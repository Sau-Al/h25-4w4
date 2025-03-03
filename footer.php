<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe"></div>
        <?php wp_nav_menu(array(
            "menu" => "externe",
            "container" => "nav",
        )); ?>
        <div class="piedpage__s1__adresse">
        <div class="piedpage__s1__adresse_coord">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt unde molestias magni hic praesentium sint ab doloremque? Ullam culpa quaerat in anim.
        </div>
        <div class="piedpage__s1__adresse_recherche"></div>
        </div>
    
    <div class="piedpage__s1__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quod exercitationem quae ea incidunt quaerat provident alias voluptas sapiente eos dolores, reprehenderit iusto maiores odit commodi, eius cumque odio? Tenetur?
    </div>
</section>
<section class="piedpage__s2"></section>
<section class="piedpage__s3"></section>
    <?php get_search_form(); ?>
    </div>
</footer>
<?php wp_footer() ?>