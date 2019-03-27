<?php $post_id = isset($post_id) ? $post_id : get_the_ID(); ?>

<div class="swiper-container c-slider container">
    <div class="c-slider-wrapper "></div>
    <div class="swiper-wrapper">
        <?php foreach (get_field('slider', $post_id) as $key => $slide): ?>
        <div class="swiper-slide">
            <div class="c-slider__item">
                <picture>
                    <img src="<?= $slide['image'] ?>" alt="" class="c-slider__image">
                </picture>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-next--green"></div>
    <div class="swiper-button-prev swiper-button-prev--green"></div>
    <div class="swiper-pagination"></div>
</div>