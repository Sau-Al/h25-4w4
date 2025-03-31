<?php

// Couleur principale
function theme_tp_customize_options($wp_customize) {
    // Ajout de la couleur principale dans la section "contact_section"
    $wp_customize->add_setting('main_color', array(
        'default'           => '#ff0000', // Valeur par défaut : rouge
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
        'label'   => __('Couleur principale', 'theme_tp'),
        'section' => 'section_404',
    )));
}

// Ajout de l'action dans le hook `customize_register`
add_action('customize_register', 'theme_tp_customize_options');



function mytheme_customizer_css() {
    ?>
    <style type="text/css">
        .texte_erreur {
            color: <?php echo get_theme_mod('main_color', '#000000'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'mytheme_customizer_css');

