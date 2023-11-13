<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motaphoto</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="logo">
                <?php if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } ?>
            </div>
            <div class="navigation">
                <?php wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li id="btn-desktop"><a href="http://localhost/motaphoto/contact/">Contact</a></li></ul>',

                ])
                ?>
            </div>
            <div class="mobile-content">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="line first-line"></span>
                    <span class="line second-line"></span>
                    <span class="line third-line"></span>
                </button>
            </div>
        </nav>
        <div class="mobile-links">
            <?php
            wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'menu-mobile',
                'menu_id' => 'menu-mobile-id',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li id="btn-mobile"><a href="http://localhost/motaphoto/contact/">Contact</a></li></ul>',
            ])
            ?>
        </div>

    </header>