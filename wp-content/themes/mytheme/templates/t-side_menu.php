<nav class="p-sidebar__nav c-nav-side">

    <?php
        $args = array(
            'theme_location' => 'side',
            'container' => false,
            'menu_id' => '',
            'menu_class'      => 'c-nav-side__list u-text-upper', // css-класс меню
            'walker'=> new True_Walker_Side_Menu() // этот параметр нужно добавить                    
        );
        wp_nav_menu( $args );
    ?>
</nav>