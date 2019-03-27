<?php get_header('green'); ?>
<?php     the_post();?>

<div class="main grid m-container">
    <section class="p-description  c-desc">
        <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
            ?>
        <p class="c-desc__text">
            <?php the_content();?>
        </p>
    </section>
    <section class="p-range">

        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'paged' => $paged,
            'category_name' => 'cakes',
            'orderby' => 'date',
            'posts_per_page' => 4
        );

        $query = new WP_Query( $args );

        // Цикл
        if ( $query->have_posts() ) :?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="p-range__item c-cakes-mini">
            <div class="c-cakes-mini__slider c-swiper-mini swiper-container">
                <div class="swiper-wrapper">
                    <!-- Swiper -->
                    <?php foreach (get_field('slider') as $key => $slide): ?>
                    <div class="swiper-slide">
                        <div class="c-swiper-mini__item">
                            <img src="<?php echo $slide['image'];?>" alt="" class="c-swiper-mini__image">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next swiper-button-next--green"></div>
                <div class="swiper-button-prev swiper-button-prev--green"></div>
            </div>
            <div class="c-cakes-mini__desc" data-target="#modal<?php the_ID(); ?>">
                <h3 class="c-cakes-mini__title">
                    <?php the_title(); ?>
                </h3>
                <div class="c-cakes-mini__hit u-text-upper">
                    <?php the_field('hit');?>
                </div>
                <span class="c-cakes-mini__text">
                    <?php the_field('mini_desc'); ?>
                </span>
                <div class="c-cakes-mini__price">
                    <?php the_field('weight');?>
                    <?php the_field('price');?> ₽</div>
            </div>
            <div class="c-cakes-mini__hover">
                <span class="c-cakes-mini__span">Заказать</span>
            </div>
        </div>

        <?php endwhile;
        endif; ?>
        <!-- /* Возвращаем оригинальные данные поста. Сбрасываем $post. */ -->

        <?php 
            kama_pagenavi(array(), $query); 
            wp_reset_postdata();
        ?>

    </section>

</div>
</div>

<?php
    // задаем нужные нам критерии выборки данных из БД
    // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        // 'paged' => $paged,
        'category_name' => 'cakes',
        'orderby' => 'date',
        'posts_per_page' => 999
    );

    $querymodal = new WP_Query( $args );

    // Цикл
    if ( $querymodal->have_posts() ) :?>
<?php while ( $querymodal->have_posts() ) : $querymodal->the_post(); ?>

<div class="p-modal u-hidden" id="modal<?php the_ID(); ?>">
    <div class="p-modal__layout">
        <h2 class="p-modal__title u-text-upper">Онлайн заказ торта</h2>
        <div class="p-modal__info c-cakes-mini">
            <div class="c-cakes-mini__wrapper">
                <div class="c-cakes-mini__picture">
                    <source media="(min-width: 768px)" srcset="assets/images/static/mini-cake2.png">
                    <?php $swip =  get_field('slider');?>
                    <img src="<?php echo $swip[0]['image'];?>" alt="" class="c-cakes-mini__image">
                </div>
                <div class="c-cakes-mini__aside c-cakes-mini__aside--order">
                    <h3 class="c-cakes-mini__title c-cakes-mini__title--order">
                        <?php the_title(); ?>
                    </h3>
                    <div class="c-cakes-mini__hit u-text-upper"></div>
                    <div class="c-cakes-mini__text">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="c-cakes-mini__price c-cakes-mini__price--order">
                    <?php the_field('weight');?>
                    <?php the_field('price');?> ₽</div>
            </div>
        </div>
        <form class="p-modal__form c-form" data-target="feedback">
            <input type="hidden" name="cake" value="<?php the_title()?>">
            <div class="c-form__loyal c-form__loyal--modal">
                <input type="text" class="c-form__input c-form__input--modal reset" name="phone" data-mask="+7 000 000 00 00"
                    placeholder="  Ваш телефон" required="">
            </div>
            <div class="c-form__loyal c-form__loyal--modal">
                <textarea class="c-form__input c-form__input--textarea reset" name="comment" placeholder="  Комментарий к заказу"
                    required=""></textarea>
            </div>
            <div class="c-form__group c-form__group--modal">
                <input id="checkbox1" type="checkbox" name="data" class="c-form__radio checkbox reset" required="">
                <label for="checkbox1" class="c-form__span c-form__span--check "> Согласен(на)
                    на обработку
                    моих персональных данных</label>
            </div>
            <button id="btn1" class="e-btn e-btn--round e-btn--primary c-form__btn u-opacity" type="submit" disabled="disabled">Отправить
                заявку</button>
            <input type="hidden" name="echo" value="Спасибо за заказ! Мы свяжемся с вами в ближайшее время">
        </form>
    </div>
</div>

<?php endwhile;
        endif;
        // kama_pagenavi(array(), $querymodal); 
        /* Возвращаем оригинальные данные поста. Сбрасываем $post. */
        wp_reset_postdata(); ?>


<?php get_footer(); ?>