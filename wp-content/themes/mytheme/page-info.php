<?php get_header('green'); 
    the_post();?>

    <div class="main container">
        <section class="p-cont__wrapper m-container c-desc">
            <?php 
                // подключим файл заголовка
                get_template_part( 'templates/t', 'title' ); 
            ?>
            <h2 class="c-contacts__adress u-text-upper">Концепция</h2>
            <div class="p-info__desc  c-desc">
                <?php the_content(); ?>
            </div>
        </section>
        <?php 
        // подключим файл слайдер
            get_template_part( 'templates/t', 'swiper' ); 
        ?>
        <div class="p-program__form ">
            <form class="p-program__profile p-program__profile--info c-form" data-target="feedback">
                <input type="hidden" name="subject" value="Присоединяйтесь к нам">
                <h3 class="c-form__title u-text-upper">Присоединяйтесь к нам</h3>
                <div class="c-form__loyal">
                    <input type="text" class="c-form__input" id="" name="name" placeholder="" required>
                    <div class="c-form__placeholder">Ваше имя <span class="red">*</span></div>
                </div>
                <div class="c-form__loyal">
                    <input type="text" class="c-form__input" id="" name="phone" placeholder="" data-mask="+7 000 000 00 00" required> 
                    <div class="c-form__placeholder">Ваш мобильный телефон <span class="red">*</span></div>
                </div>
                <span class="c-form__aside"> <span class="c-form__aside red">*</span> Звездочкой отмечены поля,
                    обязательные для заполнения</span>
                <div class="c-form__group c-form__group--data">
                    <input type="checkbox" name="data" id="checkbox" class="c-form__radio checkbox" required>
                    <label for="checkbox" class="c-form__span c-form__span--check"> Согласен(на) на обработку
                    моих персональных данных</label>
                </div>
                <button class="e-btn e-btn--round e-btn--primary c-form__btn u-opacity" type="submit" disabled="disabled">Отправить
                    анкету</button>
                <input type="hidden" name="echo" value="Спасибо за заполнение анкеты!">
            </form>
        </div>
    </div>

<?php get_footer(); ?>