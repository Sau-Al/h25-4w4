<?php 
$hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
$hero_background = get_theme_mod('hero_background', ''); 
$hero_cta_text = get_theme_mod('hero_cta_text', '');
$hero_cta_link = get_theme_mod('hero_cta_link', '#');

$main_color = get_theme_mod('main_color', '#ff0000');
$contact_address = get_theme_mod('contact_address', '5800 Sherbrooke-est - Montréal (Québec) H1X 2A2');
$contact_phone = get_theme_mod('contact_phone', '514-254-7131');
?>

<section class="hero" style="background-image: url(<?php echo esc_url($hero_background); ?>);">
    <div class="hero__contenu global">
        <h1 class="hero__titre"><?php bloginfo('name'); ?></h1>
        <p class="hero__description"><?php bloginfo('description'); ?></p>
        <p class="hero__courriel">
            <a href="mailto:<?php bloginfo('admin_email'); ?>"><?php bloginfo('admin_email'); ?></a>
        </p>
        <p class="hero__adresse"><?php echo esc_html($contact_address); ?></p>
        <p class="hero__numero"><?php echo esc_html($contact_phone); ?></p>
        <p class="hero_auteur">Auteur: <?php echo esc_html($hero_auteur); ?></p>
        <a href="<?php echo esc_url($hero_cta_link); ?>" class="hero__button">
            <?php echo esc_html($hero_cta_text); ?>
        </a>
        <?php get_template_part('gabarits/sociaux'); ?>
    </div>
</section>
