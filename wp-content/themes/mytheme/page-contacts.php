<?php get_header('green'); ?>

    <div class="main ">
        <section class="p-cont__wrapper c-desc container">
            <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
            ?>
            <div class="p-cont__link c-back">
                <a href="<?php echo get_home_url(); ?>" class="c-back__link c-back__link--arrow"> Назад на главную</a>
            </div>
            <div class="p-cont__about c-contacts">
                <h2 class="c-contacts__adress u-text-upper">
                    <?php
                        $variable = get_field('adress', 'option');
                        echo $variable;
                    ?>
                </h2>
                <a href="tel:<?php the_field('phone', 'option'); ?>" class="c-contacts__link p-404__link--tel">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/nofollow/tel.png" alt="404">
                    <?php the_field('phone', 'option'); ?>
                </a>
                <div class="c-contacts__social">
                    <a href="<?php the_field('facebook', 'option'); ?>" class="c-contacts__link"  target="_blank">
                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/nofollow/facebook.png" alt="404">
                    </a>
                    <a href="<?php the_field('insta', 'option'); ?>" class="c-contacts__link"  target="_blank">
                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/nofollow/insta.png" alt="404">
                    </a>
                    <a href="<?php the_field('vk', 'option'); ?>" class="c-contacts__link"  target="_blank">
                        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/nofollow/vk.png" alt="404">
                    </a>
                </div>
            </div>
        </section>
        <iframe src="<?php the_field('map', 'option'); ?>" frameborder="0" allowfullscreen="true" class="p-cont__frame c-iframe"></iframe>
    </div>

<?php get_footer(); ?>