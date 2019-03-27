<?php $post_id = isset($post_id) ? $post_id : get_the_ID(); ?>

<?php foreach (get_field('e-menu', $post_id) as $key => $menu): ?>
<div class="p-menu__item c-item">
    <img src="<?= $menu['menu-icon'] ?>" alt="" class="c-item__icon">
    <h3 class="c-item__title u-text-upper">
        <?= $menu['menu-title'] ?>
    </h3>
    <p class="c-item__text">
        <?= $menu['menu-text'] ?>
    </p>
</div>
<?php endforeach; ?>
