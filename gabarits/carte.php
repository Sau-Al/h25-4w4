<?php
/**
 * Template-part carte
 */
?>
<!-- <article class="carte carte--grande"> -->
  <div class="carte__contenu"> 
    <h4 class="carte__titre"><?php the_title(); ?></h4>
    <?php
        if (has_post_thumbnail()) {
        the_post_thumbnail('thumbnail'); }
    ?>   
    <?php  the_category();  ?>
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(),10, " ... " ); ?></p>
    <p>Température maximum : <?php the_field('temperature_maximum'); ?> C</p>
    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">Pour en savoir plus</a>
  </div>
</article>