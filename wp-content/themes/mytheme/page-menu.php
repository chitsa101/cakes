<?php
/*
Template Name: Меню
*/
?>
<?php get_header('green'); ?>

        <div class="page-menu container">
            <section class="p-description  c-desc">
                <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
                ?>
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
            
            <?php
                // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                // задаем нужные нам критерии выборки данных из БД
                $args = array(
                    // 'paged' => $paged,
                    'cat' => get_field('cat'),
                    'orderby' => 'date',
                    'posts_per_page' => 99,
                );

                $query = new WP_Query( $args);

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
                        <div class="c-cakes-mini__hit u-text-upper"><?php the_field('hit');?></div>
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
            // kama_pagenavi(array(), $query); 
            wp_reset_postdata();
            ?>
            </section>
        </div>

<?php get_footer(); ?>