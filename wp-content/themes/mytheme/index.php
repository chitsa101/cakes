<?php get_header(); ?>
<main class="main">
    <h1 class="u-hidden">Главная</h1>
    <?php $value = get_field('main_image', 7);?>
    <section class="p-image" style="background-image: url('<?php echo $value['m_image']; ?>');
             background-size: auto;">
        <div class="p-image__wrapper container">
            <div class="p-image__title u-text-upper">
                <?php echo $value['m_title']; ?>
            </div>
            <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/static/union.png" alt="thumb" class="p-image__logo">
        </div>
    </section>
    <section class="p-info container">
        <?php $pin = get_field('p_info', 7);?>
        <div class="p-info__excerpt c-excerpt">
            <p class="c-excerpt__text">
                <?php echo $pin['p_text'];?>
            </p>
            <a href="<?php echo $pin['p_link'];?>" class="c-excerpt__link e-btn e-btn--sm e-btn--round e-btn--primary">читать
                далее</a>
        </div>
        <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/static/donuts.png" alt="donats" class="p-info__donats">
        <h2 class="u-hidden">Торты</h2>
        <?php 
        // подключим файл c тортами
        set_query_var( 'post_id', 7 );
        get_template_part( 'templates/t', 'cakes' ); 
        ?>
    </section>
    <section class="p-menu container">
        <h2 class="u-hidden">Меню</h2>
        <?php 
        // подключим файл с меню
        set_query_var( 'post_id', 7 );
        get_template_part( 'templates/t', 'menu' ); 
        ?>
    </section>
    <!-- Swiper -->
    <?php 
    // подключим файл слайдер
    set_query_var( 'post_id', 7 );
    get_template_part( 'templates/t', 'swiper' ); 
    ?>
    <section class="p-contacts">
        <h2 class="p-contacts__title">контакты</h2>
        <div class="p-contacts__adress">
            <div class="p-contacts__wrapper">

                <div class="p-contacts__details c-details">
                    <span class="c-details__text">
                    <?php the_field('adress', 'option');?>
                    </span>
                </div>
                <div class="p-contacts__details c-details">
                    <h3 class="c-details__title">телефон:</h3>
                    <a href="" class="c-details__value">
                        <?php the_field('phone', 'option');?>
                    </a>
                </div>
                <div class="p-contacts__details c-details">
                    <h3 class="c-details__title">e-mail:</h3>
                    <a href="" class="c-details__value">
                        <?php the_field('e-mail', 'option');?>
                    </a>
                </div>
                <div class="p-contacts__details c-details">
                    <h3 class="c-details__title">Мы в социальных сетях:</h3>
                    <div class="c-details__social c-social">
                        <a href="<?php the_field('insta', 'option'); ?>" class="c-social__link"  aria-label="insta"  target="_blank">
                            <svg width="20" height="20" fill="#06d6a0">
                                <use xlink:href="#insta" />
                            </svg>
                        </a>
                        <a href="<?php the_field('vk', 'option'); ?>" class="c-social__link"  aria-label="vk"  target="_blank">
                            <svg width="20" height="20" fill="#06d6a0">
                                <use xlink:href="#vk" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <iframe src="<?php the_field('map', 'option'); ?>" title="ул.Карла Маркса, 26А" frameborder="0" allowfullscreen="true" class="p-contacts__frame c-iframe"></iframe>
    </section>
</main>
<?php get_footer(); ?>