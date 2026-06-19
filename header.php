<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Marpogi — Rapper, Artist, Producer. Listen to the latest tracks and connect.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="nav-container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
            MAR<span>POGI</span>
        </a>

        <button class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav" id="main-nav">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                ) );
                ?>
            <?php else : ?>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#music">Music</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#visuals">Visuals</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main id="main-content">
