<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de voyage</title>
    <!-- <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css"> -->
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="entete">
            <div class="entete__logo">
                <figure>
                    <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();}?>
                </figure>
            </div>
            <div class="entete__nav">
                <input type="checkbox" id="chk__burger">
                <label for="chk__burger" id="burger">
                    <img src="https://s2.svgbox.net/hero-outline.svg?ic=menu&amp;color=000" width="32" height="32">
                </label>
                <?php wp_nav_menu(array(
                    "menu" => "principal",
                    "container" => "div",
                    "container_class" => "entete__menu"
                )); ?>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>