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
                    <img class="logo__img" src="images/logo.png" alt="logo">
                </figure>
            </div>
            <div class="entete__nav">
                <input type="checkbox" id="chk__burger">
                <label for="chk__burger" id="burger">
                    <img src="https://s2.svgbox.net/hero-outline.svg?ic=menu&amp;color=000" width="32" height="32">
                </label>
                <div class="entete__menu">
                    <ul class="menu">
                        <li class="menu__li">
                        <a href="#">sport</a>
                        <a href="#">pleine nature</a>
                        <a href="#">croisière</a>
                        <a href="#">aventure</a>
                        <a href="#">culturel</a>
                        <a href="#">repos</a>
                        <a href="#">zen</a>
                        <a href="#">économique</a>
                        <a href="#">favorite</a>
                        <a href="#">pays</a>
                        </li>
                    </ul>
                </div>
                <form class="recherche">
                    <input type="search" class="recherche__input" placeholder="Recherche...">
                    <img class="recherche__img" src="https://s2.svgbox.net/hero-outline.svg?ic=search" width="20" alt="">
                </form>
            </div>
        </div>
    </header>