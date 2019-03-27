<?php foreach (get_field('bonus') as $key => $bonus): ?>
<div class="p-program__item c-item">
    <img src="<?= $bonus['icon'] ?>" alt="" class="c-item__image">
    <p class="c-item__text">
        <?= $bonus['text'] ?>
    </p>
</div>
<?php endforeach; ?>
