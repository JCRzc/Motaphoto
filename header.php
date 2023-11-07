<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motaphoto</title>
    <!-- font space mono loading via api due to font size bug in local loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="logo">
                <img class="logo" src="http://localhost/motaphoto/wp-content/themes/motaphoto/assets/images/nathalie-mota-logo.svg" alt="Logo">
            </div>
            <div class="navigation">
                <?php wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu',
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
            <?php wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'menu-mobile',
            ])
            ?>
        </div>

    </header>