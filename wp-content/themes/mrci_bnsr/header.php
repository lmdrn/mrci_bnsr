<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header id="top-header">
    <nav id="navbar_top" class="header black-bg navbar navbar-expand-lg navbar-light el__section-dark">
        <a href="<?= get_home_url(); ?>/contact" class="contact-mobile">
            <p style="color:white;"><?php _e('Contact', 'mrci_bnsr')?></p>
            </a>

        <div class="el__nav-bar">
            <?php
            wp_nav_menu([
                'theme_location' => 'top',
                'container' => 'div',
                'container_id' => 'mainNavbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id' => false,
                'menu_class' => 'navbar-nav',
                'depth' => 2,
                'fallback_cb' => 'bs4navwalker::fallback',
                'walker' => new bs4navwalker()
            ]);
            ?>
        </div>
    </nav>
</header>
