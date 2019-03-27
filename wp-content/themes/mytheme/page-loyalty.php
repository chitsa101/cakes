<?php get_header('green'); ?>

        <div class="main ">
            <section class="p-loyal c-desc container">
                <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
                ?>
                <div class="p-loyal__link c-back">
                    <a href="<?php echo get_home_url(); ?>" class="c-back__link c-back__link--arrow"> Назад на главную</a>
                </div>
                <div class="p-loyal__image">
                     <picture>
                        <source media="(min-width: 800px)" srcset="<?php the_field('main_image', 95);?>,
                                            <?php the_field('main_image_retina', 95);?>">
                        <source media="(min-width: 640px)" srcset="<?php the_field('tablet_image', 95);?>">
                        <img src="<?php the_field('main_image_mobile', 95);?>" alt="Loyal">
                     </picture> 
                </div>
            </section>
            <section class="p-program m-container">
            <?php $pin = get_field('p_info', 95);?>
                <div class="p-program__excerpt c-excerpt c-excerpt--program">
                    <p class="c-excerpt__text">
                    <?php echo $pin['p_text'];?>
                    </p>
                </div>
                <div class="p-program__desc  c-desc">
                    <p class="c-desc__text">
                        <?php echo wpautop( get_field('desc', 95));?>
                    </p>
                </div>
                <div class="p-program__bonus">
                    <?php 
                    // подключим файл c бонусами
                        get_template_part( 'templates/t', 'bonus' ); 
                    ?>
                </div>
                <div class="p-program__card c-card">
                    <h4 class="c-card__title"><?php the_field('c-title', 95);?></h4>
                    <span class="c-card__text">
                        <?php the_field('c-text', 95);?>
                    </span>
                    <p> <a href="<?php the_field('pdf', 95);?>" target="_blank" class="c-card__link">Правила участия в программе лояльности</a></p>
                </div>
                <div class="p-program__form">
                    <form   class="p-program__profile c-form" data-target="feedback">
                     <input type="hidden" name="subject" value="Анкета программы лояльности">
                        <h2 class="c-form__title u-text-upper">Анкета программы лояльности</h2>
                        <div class="c-form__group c-form__group--cake">
                            <input type="radio" name="sale" id="radio" class="c-form__radio radio" value="Хочу скидку на тортики" required>
                            <label for="radio" class="c-form__span">Хочу скидку на тортики</label>
                        </div>
                        <div class="c-form__group c-form__group--coffee">
                            <input type="radio" name="sale" id="radio" class="c-form__radio radio" value="Очень люблю кофе, хочу скидку" required>
                            <label for="radio" class="c-form__span">Очень люблю кофе, хочу скидку</label>
                        </div>
                        <div class="c-form__loyal">
                            <input type="text" class="c-form__input reset" id="" name="surname" placeholder="" required>
                            <div class="c-form__placeholder">Ваша фамилия <span class="red">*</span></div>
                        </div>
                        <div class="c-form__loyal">
                            <input type="text" class="c-form__input reset" id="" name="name" placeholder="" required>
                            <div class="c-form__placeholder">Ваше имя <span class="red">*</span></div>
                        </div>
                        <div class="c-form__loyal">
                            <input type="text" class="c-form__input reset" id="" name="patronymic" placeholder="" required>
                            <div class="c-form__placeholder">Ваше отчество <span class="red">*</span></div>
                        </div>
                        <div class="c-form__loyal">
                            <input type="text" class="c-form__input reset" id="" name="phone" placeholder="" data-mask="+7 000 000 00 00" required> 
                            <div class="c-form__placeholder">Ваш мобильный телефон <span class="red">*</span></div>
                        </div>
                        <div class="c-form__loyal">
                            <input type="text" class="c-form__input reset"  name="email" placeholder="" required>
                            <div class="c-form__placeholder">E-mail <span class="red">*</span></div>
                        </div>
                        <span class="c-form__aside"> <span class="c-form__aside red">*</span> Звездочкой отмечены поля,
                            обязательные для заполнения</span>
                        <div class="c-form__group c-form__group--data">
                            <input type="checkbox" name="data" id="checkbox" class="c-form__radio checkbox reset" required>
                            <label for="checkbox" class="c-form__span c-form__span--check"> Согласен(на) на обработку
                            моих персональных данных</label>
                        </div>
                        <button class="e-btn e-btn--round e-btn--primary c-form__btn u-opacity" type="submit" disabled="disabled">Отправить
                            анкету</button>
                        <input type="hidden" name="echo" value="Спасибо за заполнение анкеты!">
                    </form>
                </div>
            </section>
        </div>

<?php get_footer(); ?>