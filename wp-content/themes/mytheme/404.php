<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница не найдена</title>

    <?php wp_head(); ?>
</head>

<body>
<div class="page">
    <div class="container p-404">
        <picture>
            <source media="(min-width: 640px)" srcset="<?php echo get_bloginfo('template_url'); ?>/assets/images/static/404.png">
            <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/static/404mob.png" alt="404">
        </picture>
        <h1 class="p-404__title u-text-upper">Упс страницу кто-то съел</h1>
        <a href="<?php echo get_home_url(); ?>" class="p-404__a p-404__a--arrow"> Назад на главную</a>
        <p class="p-404__text">
            Но вы всегда можете связаться с нами по контактам ниже.
        </p>
        <div class="p-404__contacts c-contacts">
            <h2 class="c-contacts__adress u-text-upper"><?php the_field('adress', 'option'); ?></h2>
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
    </div>

</div>

<?php wp_footer(); ?>
</body>

</html>