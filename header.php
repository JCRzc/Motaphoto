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
        </nav>
    </header>