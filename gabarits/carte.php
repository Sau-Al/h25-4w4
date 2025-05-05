<article class="carte">
  <div class="carte__contenu"> 
    <?php if (has_post_thumbnail()) : ?>
      <div class="carte__image">
        <?php the_post_thumbnail('thumbnail'); ?>
      </div>
    <?php endif; ?>

    <h4 class="carte__titre"><?php the_title(); ?></h4>

    <!-- Afficher les catégories sans "Populaire" -->
    <div class="carte__categories">
      <?php categorie_par_destination('Populaire'); ?>
    </div>

    <p class="carte__description">
      <?php echo wp_trim_words(get_the_content(), 10, " ... "); ?>
    </p>

    <?php if (get_field('temperature_maximum')) : ?>
      <p class="carte__info">
        🌡️ Température max : <strong><?php the_field('temperature_maximum'); ?>°C</strong>
      </p>
    <?php endif; ?>

    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">
      Pour en savoir plus
    </a>
  </div>
</article>
