<?php
/*
Template Name: Événement
*/
get_header();
?>

<section class="evenement">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="evenement__content">
                <h1><?php the_title(); ?></h1>
                <div class="evenement__texte">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>

        <section class="evenement__acf">
            <?php if (get_field('titre_evenement')) : ?>
                <h2><?php the_field('titre_evenement'); ?></h2>
            <?php endif; ?>

            <?php if (get_field('date_evenement')) : ?>
                <p><strong>Date de l'événement :</strong> <?php the_field('date_evenement'); ?></p>
            <?php endif; ?>

            <?php if (get_field('description_evenement')) : ?>
                <h3>Description de l'événement</h3>
                <p><?php the_field('description_evenement'); ?></p>
            <?php endif; ?>
        </section>

        <!-- Section REST API -->
        <section class="destination">
            <?php if (function_exists('categories_liste')) : ?>
                <?php categories_liste("destination"); ?>
            <?php endif; ?>

            <h2 class="destination__titre">Articles de la catégorie</h2>
            <div class="destination__list"></div>
        </section>
    </div>
</section>

<?php get_footer(); ?>
