<?php

function theme_tp_customize_register($wp_customize) {
  // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
  // Création d'une nouvelle section dans le customizer
  $wp_customize->add_section('hero_section', array(
    'title' => __('Section Hero', 'theme_tp'),
    'priority' => 30,
));
/////////////////////////////// ajout de la donnée
$wp_customize->add_setting('hero_auteur', array(
  'default' => __('Alicia Sau', 'theme_tp'),
  'sanitize_callback' => 'sanitize_text_field'
));
/////////////////////////////// ajout du contrôle de la donnée
$wp_customize->add_control('hero_auteur', array(
  'label' => __('Auteur', 'theme_tp'),
  'section' => 'hero_section',
  'type' => 'text',
));
/////////////////////////////// ajout de la donnée image en background
$wp_customize->add_setting('hero_background', array(
  'default' => '',
  'sanitize_callback' => 'esc_url_raw',
));
/////////////////////////////// ajout du contrôle de la donnée
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
  'label' => __('Image en arrière plan', 'theme_tp'),
  'section' => 'hero_section',
)));
/////////////////////////////// ajout de la donnée du bouton CTA
$wp_customize->add_setting('hero_cta_text', array(
  'default' => __('Learn More', 'theme_tp'),
  'sanitize_callback' => 'sanitize_text_field',
));
/////////////////////////////// ajout du contrôle de la donnée
$wp_customize->add_control('hero_cta_text', array(
  'label' => __('CTA Button Text', 'theme_tp'),
  'section' => 'hero_section',
  'type' => 'text',
));
/////////////////////////////// Lien du bouton CTA
$wp_customize->add_setting('hero_cta_link', array(
  'default' => '#',
  'sanitize_callback' => 'esc_url_raw',
));
/////////////////////////////// ajout du contrôle de la donnée
$wp_customize->add_control('hero_cta_link', array(
  'label' => __('CTA Button Link', 'theme_tp'),
  'section' => 'hero_section',
  'type' => 'url',
));
// Couleur principale
$wp_customize->add_setting('main_color', array(
  'default'           => '#ff0000', // Valeur par défaut : rouge
  'sanitize_callback' => 'sanitize_hex_color',
));
/////////////////////////////// ajout du contrôle de la donnée
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
  'label'   => __('Couleur principale', 'theme_tp'),
  'section' => 'contact_section',
)));

// Nouvelle section pour les contacts
$wp_customize->add_section('contact_section', array(
  'title'    => __('Informations de contact', 'theme_tp'),
  'priority' => 35,
));

// ✅ Couleur principale
$wp_customize->add_setting('main_color', array(
  'default'           => '#ff0000', // Rouge par défaut
  'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
  'label'   => __('Couleur principale', 'theme_tp'),
  'section' => 'contact_section',
)));

// ✅ Mission
$wp_customize->add_setting('mission_text', array(
  'default'           => __('Notre mission est de...', 'theme_tp'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('mission_text', array(
  'label'   => __('Mission', 'theme_tp'),
  'section' => 'contact_section',
  'type'    => 'textarea',
));

// ✅ Adresse
$wp_customize->add_setting('contact_address', array(
  'default'           => __('5800 Sherbrooke-est - Montréal (Québec) H1X 2A2', 'theme_tp'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('contact_address', array(
  'label'   => __('Adresse', 'theme_tp'),
  'section' => 'contact_section',
  'type'    => 'text',
));

// ✅ Téléphone
$wp_customize->add_setting('contact_phone', array(
  'default'           => __('514-254-7131', 'theme_tp'),
  'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('contact_phone', array(
  'label'   => __('Téléphone', 'theme_tp'),
  'section' => 'contact_section',
  'type'    => 'text',
));
}

add_action('customize_register', 'theme_tp_customize_register');

function mon_theme_supports() {

  add_theme_support('title-tag');
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
));

}
add_action( 'after_setup_theme', 'mon_theme_supports' );


function theme_4w4_enqueue_styles() { 
wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');  
wp_enqueue_style('mon-style-style', get_stylesheet_uri()); 
} 
/* 
*/
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');

/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */


function modifie_requete_principal( $query ) {
    if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
      $query->set( 'category_name', 'populaire' );
      $query->set( 'orderby', 'title' );
      $query->set( 'order', 'ASC' );
      }
     }
     add_action( 'pre_get_posts', 'modifie_requete_principal' );


?>