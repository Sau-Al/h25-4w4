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
  // ===============================
    // ➡️ SECTION MISSION (NOUVELLE)
    // ===============================
    $wp_customize->add_section('mission_section', array(
      'title'    => __('Section Mission', 'theme_tp'),
      'priority' => 32,
  ));

  // Image en arrière-plan Mission
  $wp_customize->add_setting('mission_background', array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mission_background', array(
      'label'   => __('Image en arrière-plan', 'theme_tp'),
      'section' => 'mission_section',
  )));

  // Texte Mission
  $wp_customize->add_setting('mission_text', array(
      'default'           => __('Notre mission est de...', 'theme_tp'),
      'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('mission_text', array(
      'label'   => __('Texte de la mission', 'theme_tp'),
      'section' => 'mission_section',
      'type'    => 'textarea',
  ));
  
  // Nouvelle section pour les contacts
  $wp_customize->add_section('contact_section', array(
    'title'    => __('Informations de contact', 'theme_tp'),
    'priority' => 35,
  ));
  
  // Mission
  $wp_customize->add_setting('mission_text', array(
    'default'           => __('Notre mission est de...', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('mission_text', array(
    'label'   => __('Mission', 'theme_tp'),
    'section' => 'contact_section',
    'type'    => 'textarea',
  ));
  
  // Adresse
  $wp_customize->add_setting('contact_address', array(
    'default'           => __('5800 Sherbrooke-est - Montréal (Québec) H1X 2A2', 'theme_tp'),
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('contact_address', array(
    'label'   => __('Adresse', 'theme_tp'),
    'section' => 'contact_section',
    'type'    => 'text',
  ));
  
  // Téléphone
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

// Ajout de l'action dans le hook `customize_register`
add_action('customize_register', 'theme_tp_customize_register');