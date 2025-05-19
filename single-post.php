<?php get_header(); ?>

<section class="single__post populaire">
    <div class="global">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>

                <?php
                // Image mise en avant ou image par défaut
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                } else {
                    // Remplace par le chemin de ton image par défaut dans ton thème
                    echo '<img src="' . get_template_directory_uri() . '/images/maldives.jpg" alt="Image par défaut">';
                }
                ?>

                <h2><?php the_title(); ?></h2>

                <p><strong>Auteur :</strong> <?php the_author(); ?></p>
                <p><strong>Date de publication :</strong> <?php echo get_the_date(); ?></p>

                <p><strong>Catégories :</strong> 
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        $cat_links = array();
                        foreach ($categories as $category) {
                            $cat_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                        }
                        echo implode(', ', $cat_links);
                    } else {
                        echo 'Aucune catégorie';
                    }
                    ?>
                </p>

                <div class="description">
                    <?php the_content(); ?>
                </div>

                <div class="temperatures">
                    <p><strong>Température maximale :</strong> <?php the_field('temperature_maximum'); ?> °C</p>
                    <p><strong>Température moyenne :</strong> <?php the_field('temperature_moyenne'); ?> °C</p>
                    <p><strong>Température minimale :</strong> <?php the_field('temperature_minimum'); ?> °C</p>
                </div>

            </article>
        <?php endwhile; else : ?>
            <p>Aucun contenu trouvé.</p>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
