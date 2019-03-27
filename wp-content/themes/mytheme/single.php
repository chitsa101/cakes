<?php
/*
Template Name: Меню
*/
?>
<?php get_header('green'); 
    the_post();?>

        <div class="page-menu container">
            <section class="p-description  c-desc">
                <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
                ?>
                <div class="p-description__link c-back">
                    <a href="<?php echo get_home_url(); ?>" class="c-back__link c-back__link--arrow"> Назад на главную</a>
                </div>
            </section>
            <section class="p-sidebar">
                <div class="p-sidebar__mobile">
                    <h2 class="p-sidebar__title u-text-upper">Меню кафе</h2>
                    <div class="p-sidebar__btn e-btn-side"></div>
                </div>
                <?php 
                // подключим файл меню
                get_template_part( 'templates/t', 'side_menu'); 
                ?>
            </section>
            <section class="p-content grid m-container">
                <div class="p-content__item p-content__item--main c-dish">
                    <div class="с-dish__pic">
                        <?php the_post_thumbnail('full'); ?>
                        <!-- <img src="assets/images/static/omlette.jpg" alt="" class="с-dish__image"> -->
                    </div>
                    <div class="с-dish__aside">
                        <div class="с-dish__text">
                            <?php the_content(); ?>
                       </div>
                        <div class="с-dish__price"><?php the_field('weight');?> <?php the_field('price');?> ₽</div>
                    </div>
                </div>
                <h2 class="p-content__title u-text-upper">Рекомендуем</h2>

            <?php
                $args = array(
                    'category_name' => 'recomend',
                    'orderby' => 'rand',
                    'posts_per_page' => 4
                );

                $query = new WP_Query( $args );

                // Цикл
                if ( $query->have_posts() ) :?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="p-content__item c-cakes-mini">
                <a class="c-cakes-mini__link" href="<?php the_permalink( ); ?>"></a>
                    <div class="c-cakes-mini__pic">
                        <!-- <img src="" alt="" class="c-swiper-mini__image"> -->
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="c-cakes-mini__aside">
                        <h3 class="c-cakes-mini__title"><?php the_title(); ?></h3>
                        <div class="c-cakes-mini__hit u-text-upper"></div>
                        <span class="c-cakes-mini__text">
                            <?php the_field('mini_desc'); ?>
                        </span>
                        <div class="c-cakes-mini__price"><?php the_field('weight');?> <?php the_field('price');?> ₽</div>
                    </div>
                </div>

            <?php endwhile;

            endif; ?>
            <!-- /* Возвращаем оригинальные данные поста. Сбрасываем $post. */ -->
            <?php 
            wp_reset_postdata();
            ?>
            </section>
        </div>

<?php get_footer(); ?>