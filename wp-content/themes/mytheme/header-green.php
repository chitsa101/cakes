<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php the_title(); ?>
    </title>

    <?php wp_head(); ?>
</head>

<body>
    <div class="page">
        <div class="header ">
            <header class="p-header p-header--green">
                <nav class="p-header__nav c-nav c-nav--left">
                    <?php
                    $args = array(
                        'theme_location' => 'top_1',
                        'container' => false,
                        'menu_id' => '',
                        'menu_class'      => 'c-nav__list', // css-класс меню
                        'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить                    
                    );
                    wp_nav_menu( $args );
                    ?>
                </nav>
                <a href="<?php echo site_url(); ?>" class="p-header__logo" aria-label="Cake">
                    <img src="<?php the_field('logo_one', 'option');?>" alt="" class="e-logo">
                </a>
                <nav class="p-header__nav c-nav">

                    <?php
                    $args = array(
                        'theme_location' => 'top_2',
                        'container' => false,
                        'menu_id' => '',
                        'menu_class'      => 'c-nav__list', // css-класс меню
                        'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить                    
                    );
                    wp_nav_menu( $args );
                    ?>
                </nav>
                <div class="p-header__social c-social">
                    <a href="<?php the_field('insta', 'option'); ?>" class="c-social__link" aria-label="insta" target="_blank">
                        <svg width="25" height="25" fill="#06d6a0">
                            <use xlink:href="#insta"></use>
                        </svg>
                    </a>
                    <a href="<?php the_field('vk', 'option');?>" class="c-social__link" aria-label="vk" target="_blank">
                        <svg width="25" height="25" fill="#06d6a0">
                            <use xlink:href="#vk" />
                        </svg>
                    </a>
                </div>
            </header>
            <header class="p-header-mobile container">
                <div class="p-header-mobile__btn e-btn-mobile e-btn-mobile--primary"></div>
                <a href="<?php echo get_home_url(); ?>" class="p-header-mobile__logo" aria-label="Cake">
                    <img src="<?php the_field('logo', 'option');?>" alt="" class="e-logo">
                </a>
                <nav class="p-header-mobile__nav p-header-mobile__nav--closed c-nav c-nav--mobile">
                    <?php
                    $args = array(
                        'theme_location' => 'mobile',
                        'container' => false,
                        'menu_id' => '',
                        'menu_class'      => 'c-nav__list c-nav__list--mobile', // css-класс меню
                        'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить                    
                    );
                    wp_nav_menu( $args );
                    ?>
                    <div class="p-header-mobile__social c-social">
                        <a href="<?php the_field('insta', 'option'); ?>" class="c-social__link c-social__link--insta"
                            aria-label="vk" target="_blank">
                        </a>
                        <a href="<?php the_field('vk', 'option'); ?>" class="c-social__link c-social__link--vk"
                            aria-label="insta" target="_blank">
                        </a>
                    </div>
                </nav>

            </header>
        </div>