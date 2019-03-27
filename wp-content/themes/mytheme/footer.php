        <div class="footer">
            <footer class="p-footer">
                <div class="p-footer__wrapper">
                    <nav class="p-footer__nav c-nav c-nav--left">
                    <?php
                    $args = array(
                        'theme_location' => 'bottom_1',
                        'container' => false,
                        'menu_id' => '',
                        'menu_class'      => 'c-nav__list', // css-класс меню
                        'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить                    
                    );
                    wp_nav_menu( $args ); ?>
                    </nav>
                    <div class="p-footer__social p-footer__social--left c-social">
                        <a href="<?php the_field('vk', 'option'); ?>" class="c-social__link" aria-label="vk"  target="_blank">
                            <svg width="25" height="25" fill="#ffffff">
                                <use xlink:href="#vk" />
                            </svg>
                        </a>
                    </div>
                    <a href="<?php echo get_home_url(); ?>" class="p-footer__logo" aria-label="Cake">
                        <img src="<?php $variable = get_field('logo_neg', 'option');
                            echo $variable; ?>" alt="" class="e-logo">
                    </a>
                    <div class="p-footer__social p-footer__social--right c-social">
                        <a href="<?php the_field('insta', 'option'); ?>" class="c-social__link" target="_blank" aria-label="insta">
                            <svg width="25" height="25" fill="#ffffff">
                                <use xlink:href="#insta" />
                            </svg>
                        </a>
                    </div>
                    <nav class="p-footer__nav c-nav">
                    <?php
                        $args = array(
                            'theme_location' => 'bottom_2',
                            'container' => false,
                            'menu_id' => '',
                            'menu_class'      => 'c-nav__list', // css-класс меню
                            'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить                    
                        );
                        wp_nav_menu( $args ); ?>
                    </nav>
                </div>
                <a href="//t-code.ru/" target="_blank" class="p-footer__link">
                    разработка
                    <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/static/true.png" alt="" class="e-true-code">
                </a>
            </footer>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="vk" viewBox="0 0 94 94">
            <title>vkontakte</title>
            <path d="M89,0H5C2.238,0,0,2.239,0,5v84c0,2.761,2.238,5,5,5h84c2.762,0,5-2.239,
                5-5V5C94,2.239,91.762,0,89,0z M74.869,52.943 c2.562,2.5,5.271,4.854,7.572,
                7.617c1.018,1.22,1.978,2.48,2.709,3.899c1.041,2.024,0.101,4.247-1.713,
                4.366l-11.256-0.003 c-2.906,0.239-5.22-0.931-7.172-2.918c-1.555-1.585-3.001-3.277-4.5-4.914c-0.611-0.673-1.259-1.306-2.025-1.806
                c-1.534-0.996-2.867-0.692-3.748,0.909c-0.896,1.63-1.103,3.438-1.185,5.255c-0.125,2.655-0.925,3.348-3.588,
                3.471 c-5.69,0.268-11.091-0.596-16.108-3.463c-4.429-2.53-7.854-6.104-10.838-10.146c-5.816-7.883-10.27-16.536-14.27-25.437
                c-0.901-2.005-0.242-3.078,1.967-3.119c3.676-0.073,7.351-0.063,11.022-0.004c1.496,
                0.023,2.485,0.879,3.058,2.289 c1.985,4.885,4.421,9.533,7.471,13.843c0.813,1.147,
                1.643,2.292,2.823,3.103c1.304,0.896,2.298,0.601,2.913-0.854 c0.393-0.928,0.563-1.914,
                0.647-2.906c0.292-3.396,0.327-6.792-0.177-10.175c-0.315-2.116-1.507-3.483-3.617-3.883 c-1.074-0.204-0.917-0.602-0.395-1.215c0.906-1.062,
                1.76-1.718,3.456-1.718l12.721-0.002c2.006,0.392,2.452,1.292,2.725,3.311 l0.012,
                14.133c-0.021,0.782,0.391,3.098,1.795,3.61c1.123,0.371,1.868-0.53,2.54-1.244c3.048-3.235,
                5.22-7.056,7.167-11.009 c0.857-1.743,1.6-3.549,2.32-5.356c0.533-1.337,1.367-1.995,2.875-1.971l12.246,
                0.013c0.36,0,0.729,0.004,1.086,0.063 c2.062,0.355,2.627,1.243,1.99,3.257c-1.004,3.163-2.959,5.799-4.871,
                8.441c-2.043,2.825-4.224,5.557-6.252,8.396 C72.411,49.38,72.561,50.688,74.869,52.943z" />
        </symbol>
        <symbol id="insta" viewBox="0 0 512 512">
            <g>
                <path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160
                    C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48
                    h192c61.76,0,112,50.24,112,112V352z" />
            </g>
            <g>
                <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336
                    c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z" />
            </g>

            <g>
                <circle cx="393.6" cy="118.4" r="17.056" />
            </g>
        </symbol>
    </svg>

<?php wp_footer(); ?>
</body>

</html>