<?php $post_id = isset($post_id) ? $post_id : get_the_ID(); ?>

<div class="p-info__wrapper" id="hh">
    <?php foreach (get_field('c-cakes', $post_id) as $key => $cake): ?>
    <?php switch ($cake['position']) {
        case 'up':
        echo '<div class="p-info__cake c-cake p-info__cake--up">';
        break;
        case 'center':
        echo '<div class="p-info__cake c-cake p-info__cake--center">';
        break;
        default:
        echo '<div class="p-info__cake p-info__cake--down c-cake">';
         break;
    }?>
        <?php switch ($cake['info_position']) {
        case 'left':
        echo '<div class="c-cake__info c-cake__info--left">';
        break;
        case 'right':
        echo '<div class="c-cake__info c-cake__info--right">';
        break;
        default:
        echo '<div class="c-cake__info c-cake__info--center">';
         break;
    }?>
            <a class="c-cakes-mini__link" href="http://cake.local/wholecakes/" aria-label="wholecakes"></a>
            <h3 class="c-cake__title">
                <?= $cake['title'] ?>
            </h3>
            <span class="c-cake__text">
                <?= $cake['text'] ?> </span> <br>
            <div class="c-cake__price">
                <?= $cake['price'] ?>
            </div>
        </div>
        <picture>
            <img src="<?= $cake['image'] ?>" alt="" class="c-cake__image">
        </picture>
    </div>
    <?php endforeach; ?>