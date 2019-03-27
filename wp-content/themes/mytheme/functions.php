<?php
require(ABSPATH.'/mailer/PHPMailerAutoload.php'); 

$email_from = 'nuta.sav@yandex.ru'; 
$name_from = 'krivel'; 
$email_to = 'nuta.sav@yandex.ru';

add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){
    wp_enqueue_style( 'style-name', get_stylesheet_directory_uri() . '/style.min.css');
    wp_enqueue_script( 'my-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', '', '', 'true');
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', '', '', 'true');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', '', '', 'true');
}

register_nav_menus(array(
    'top_1'    => 'Верхнее меню 1',    //Название месторасположения меню в шаблоне
    'top_2'    => 'Верхнее меню 2',    //Название месторасположения меню в шаблоне
    'bottom_1' => 'Нижнее меню 1',     //Название другого месторасположения меню в шаблоне
    'bottom_2' => 'Нижнее меню 2',      //Название другого месторасположения меню в шаблоне
	'mobile' => 'Мобильное меню',      //Название другого месторасположения меню в шаблоне
	'side' => 'Боковое меню'      //Название другого месторасположения меню в шаблоне
));


class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {
		/*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */ 
		$output .= '<ul class="menu_sublist">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'c-nav__item';
		if ( $item->current ) {
			$classes[] = 'c-nav__item--active';
		}
		if ( $args->theme_location == 'mobile' ) {
			$classes[] = 'c-nav__item--mobile';
		}
		if ( $args->theme_location == 'side' ) {
			$classes[] = 'c-nav-side__item';
			if ( $item->current ) {
				$classes[] = 'c-nav-side__item--active';
			}
		}
 
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		/*
		 * Генерируем ID элемента
		 */
		// $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="c-nav__link"';
 
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

class True_Walker_Side_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {
		/*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */ 
		$output .= '<ul class="menu_sublist">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'c-nav-side__item';
		if ( $item->current ) {
			$classes[] = 'c-nav-side__item--active';
		}
 
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		/*
		 * Генерируем ID элемента
		 */
		// $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="c-nav-side__link"';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

# Вложенные пункты меню
// function wp_get_menu_array($current_menu) {

// 	$array_menu = wp_get_nav_menu_items($current_menu);
// 	$menu = array();
// 	$submenu = array();
// 	$subsubmenu = array();

// 	foreach ($array_menu as $m) {
// 		if (empty($m->menu_item_parent)){
// 			$curent_id = $m->object_id;
// 			$menu[$m->object_id] = array();
// 			$menu[$m->object_id]['ID']          =   $m->object_id;
// 			$menu[$m->object_id]['title']       =   $m->title;
// 			$menu[$m->object_id]['url']         =   $m->url;
// 			$menu[$m->object_id]['submenu']     =   array();
// 		}

// 		if ($m->menu_item_parent == $curent_id) {
// 			$curent_sub_id = $m->object_id;
// 			$submenu[$m->object_id] = array();
// 			$submenu[$m->object_id]['ID']       =   $m->object_id;
// 			$submenu[$m->object_id]['title']    =   $m->title;
// 			$submenu[$m->object_id]['url']      =   $m->url;
// 			$submenu[$m->object_id]['subsubmenu']  =   array();
// 			$menu[$curent_id]['submenu'][$m->object_id] = $submenu[$m->object_id];
// 		}

// 		if ($m->menu_item_parent == $curent_sub_id) {
// 			$subsubmenu[$m->object_id] = array();
// 			$subsubmenu[$m->object_id]['ID']       =   $m->object_id;
// 			$subsubmenu[$m->object_id]['title']    =   $m->title;
// 			$subsubmenu[$m->object_id]['url']      =   $m->url;
// 			$menu[$curent_id]['submenu'][$curent_sub_id]['subsubmenu'][$m->object_id] = $subsubmenu[$m->db_id];
// 		}
// 	}

// 	return $menu;   
// }
	
// function my_menu($args) {
// 	global $post;
// 	$default_args = array(
// 		'location' => '',
// 		'echo' => true,
// 		'before' => '<ul class="c-menu">',
// 		'after' => '</ul>',
// 		'herarchical' => true,
// 		'item_before' => '<li class="c-nav__item">',
// 		'item_after' => '</li>',
// 		'link_class' => 'c-nav__link',
// 		'link_class_active' => 'c-nav__link is-active'
// 	);

// 	$default_args = apply_filters('my_menu_args', $default_args );
// 	$args = array_merge($default_args, $args);
// 	extract($args);

// 	$menu_location = get_nav_menu_locations();
// 	$menu_object = wp_get_nav_menu_object($menu_location[$location]);
// 	$menu_items = wp_get_menu_array($menu_object);

// 	$out = '';
// 	$out .= $before;

// 	foreach ( (array) $menu_items as $key => $menu_item ):
// 		if(!empty($menu_item['submenu'])) {
// 			$submenu = $menu_item['submenu'];
// 			$submenu_items = '';
// 			$active = false;

// 			foreach ( (array) $submenu as $key => $submenu_item ): 
// 				$submenu_items .= '<li class="c-menu__item"><a href="'.$submenu_item['url'].'" class="c-menu__link">'.$submenu_item['title'].'</a></li>';

// 				if($post->ID == $submenu_item['ID'] && !$active) {
// 					$active = true;
// 				}
// 			endforeach;

// 			if($herarchical) {
// 				$out .= '
// 					<li class="c-menu__item">
// 						<a href="'.$menu_item['url'].'" class="c-menu__link '.($active ? 'is-active' : '').'">'.$menu_item['title'].'</a>
// 						<ul class="c-menu__dropdown">'.$submenu_items.'</ul>
// 					</li>';
// 			} else {
// 				$out .= '
// 					<li class="c-menu__item">
// 						<a href="'.$menu_item['url'].'" class="c-menu__link '.($active ? 'is-active' : '').'">'.$menu_item['title'].'</a>
// 					</li>'.$submenu_items;
// 			}
// 		}

// 		else {
// 			if($post->ID == $menu_item['ID']) {
// 				$out .= $item_before.'<a href="'.$menu_item['url'].'" class="'.$link_class_active.'">'.$menu_item['title'].'</a>'.$item_after;
// 			} else {
// 				$out .= $item_before.'<a href="'.$menu_item['url'].'" class="'.$link_class.'">'.$menu_item['title'].'</a>'.$item_after;
// 			}
// 		}
// 	endforeach;

// 	$out .= $after;

// 	if( $echo )
// 		return print $out;

// 	return $out;
// }

	/*Подзагрузка AJAX*/ 
add_action( 'wp_enqueue_scripts', 'myajax_data', 99 ); 
function myajax_data(){ 
wp_localize_script('main', 'myajax', 
array( 
'url' => admin_url('admin-ajax.php') 
) 
); 
}

	// Отправка формы 
add_action('wp_ajax_form_otk', 'form_otk'); 
add_action('wp_ajax_nopriv_form_otk', 'form_otk'); 
function form_otk() { 
	global $email_from; 
	global $name_from; 
	global $email_to; 
	$mail = new PHPMailer; 
	$mail->setFrom($email_from , $name_from); 
	$mail->addAddress($email_to); 
	$mail->IsHTML(true); 
	$mail->CharSet = 'UTF-8'; 

	$form = $_POST['form']; 

	$mail->Subject = 'Письмо с сайта'; 
	$echo = "Ваше сообщение отправлено"; 

	$mail->Body = ''; 

	foreach($form as $data){ 
	switch($data['name']){ 
		case 'subject': 
		$mail->Subject = $data['value']; 
		break; 

		case 'sale': 
		$mail->Body .= 'Чекбокс: '.$data['value'].'<br>'; 
		break; 

		case 'surname': 
		$mail->Body .= 'Фамилия: '.$data['value'].'<br>'; 
		break; 

		case 'name': 
		$mail->Body .= 'Имя: '.$data['value'].'<br>'; 
		break;

		case 'patronymic': 
		$mail->Body .= 'Отчество: '.$data['value'].'<br>'; 
		break; 

		case 'phone': 
		$mail->Body .= 'Номер телефона: '.$data['value'].'<br>'; 
		break; 
		
		case 'email': 
		$mail->Body .= 'email: '.$data['value'].'<br>'; 
		break; 

		case 'comment': 
		$mail->Body .= 'Комментарий: '.$data['value'].'<br>'; 
		break; 

		case 'cake': 
		$cake->Body .= 'Заказ торта: '.$data['value'].'<br>'; 
		break; 

		case 'echo': 
		$echo = $data['value']; 
		break; 
		} 
	} 
	$result = $mail->Send(); 

	echo $echo; 

	die(); 
};

/**
 * Альтернатива wp_pagenavi. Создает ссылки пагинации на страницах архивов.
 *
 * @param array  $args      Аргументы функции
 * @param object $wp_query  Объект WP_Query на основе которого строится пагинация. По умолчанию глобальная переменная $wp_query
 *
 * @version 2.6
 * @author  Тимур Камаев
 * @link    Ссылка на страницу функции: http://wp-kama.ru/?p=8
 */
function kama_pagenavi( $args = array(), $wp_query = null ){

	if( ! $wp_query ){
		wp_reset_query();
		global $wp_query;
	}

	// параметры по умолчанию
	$default = array(
		'before'          => '',   // Текст до навигации.
		'after'           => '',   // Текст после навигации.
		'echo'            => true, // Возвращать или выводить результат.

		'text_num_page'   => '',           // Текст перед пагинацией.
										   // {current} - текущая.
										   // {last} - последняя (пр: 'Страница {current} из {last}' получим: "Страница 4 из 60").
		'num_pages'       => 10,           // Сколько ссылок показывать.
		'step_link'       => 10,           // Ссылки с шагом (если 10, то: 1,2,3...10,20,30. Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…',          // Промежуточный текст "до".
		'dotright_text2'  => '…',          // Промежуточный текст "после".
		'back_text'       => '« назад',    // Текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => 'вперед »',   // Текст "перейти на следующую страницу".  Ставим 0, если эта ссылка не нужна.
		'first_page_text' => '« к началу', // Текст "к первой странице".    Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => 'в конец »',  // Текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);

	// Cовместимость с v2.5: kama_pagenavi( $before = '', $after = '', $echo = true, $args = array() )
	if( func_num_args() && is_string( func_get_arg(0) ) ){
		$default['before'] = func_get_arg(0);
		$default['after']  = func_get_arg(1);
		$default['echo']   = func_get_arg(2);
	}

	$default = apply_filters( 'kama_pagenavi_args', $default ); // чтобы можно было установить свои значения по умолчанию

	$rg = (object) array_merge( $default, $args );

	//$posts_per_page = (int) $wp_query->get('posts_per_page');
	$paged          = (int) $wp_query->get('paged');
	$max_page       = $wp_query->max_num_pages;

	// проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;

	if( empty( $paged ) || $paged == 0 )
		$paged = 1;

	$pages_to_show = intval( $rg->num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;

	$half_page_start = floor( $pages_to_show_minus_1/2 ); // сколько ссылок до текущей страницы
	$half_page_end   = ceil(  $pages_to_show_minus_1/2 ); // сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; // первая страница
	$end_page   = $paged + $half_page_end;   // последняя страница (условно)

	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}

	if( $start_page <= 0 )
		$start_page = 1;

	$out = '';

	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );

	$out .= '<div class="wp-pagenavi">'."\n";

		if( $rg->text_num_page ){
			$rg->text_num_page = preg_replace( '!{current}|{last}!', '%s', $rg->text_num_page );
			$out.= sprintf( "<span class='pages'>$rg->text_num_page</span> ", $paged, $max_page );
		}
		// назад
		if ( $rg->back_text && $paged != 1 )
			$out .= '<a class="prev" href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $rg->back_text .'</a> ';
		// в начало
		if ( $start_page >= 2 && $pages_to_show < $max_page ) {
			$out.= '<a class="first" href="'. $first_url .'">'. ( $rg->first_page_text ?: 1 ) .'</a> ';
			if( $rg->dotright_text && $start_page != 2 ) $out .= '<span class="extend">'. $rg->dotright_text .'</span> ';
		}
		// пагинация
		for( $i = $start_page; $i <= $end_page; $i++ ) {
			if( $i == $paged )
				$out .= '<span class="current">'.$i.'</span> ';
			elseif( $i == 1 )
				$out .= '<a href="'. $first_url .'">1</a> ';
			else
				$out .= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
		}

		// ссылки с шагом
		$dd = 0;
		if ( $rg->step_link && $end_page < $max_page ){
			for( $i = $end_page + 1; $i <= $max_page; $i++ ){
				if( $i % $rg->step_link == 0 && $i !== $rg->num_pages ) {
					if ( ++$dd == 1 )
						$out.= '<span class="extend">'. $rg->dotright_text2 .'</span> ';
					$out.= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
				}
			}
		}
		// в конец
		if ( $end_page < $max_page ) {
			if( $rg->dotright_text && $end_page != ($max_page-1) )
				$out.= '<span class="extend">'. $rg->dotright_text2 .'</span> ';
			$out.= '<a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $rg->last_page_text ?: $max_page ) .'</a> ';
		}
		// вперед
		if ( $rg->next_text && $paged != $end_page )
			$out.= '<a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $rg->next_text .'</a> ';

	$out .= '</div>';

	$out = apply_filters( 'kama_pagenavi', $rg->before . $out . $rg->after );

	if( $rg->echo )
		echo $out;
	else
		return $out;
}
/**
 * 2.6 (20-10-2018) - Убрал extract().
 *                  - Перенес параметры $before, $after, $echo в $args (старый вариант будет работать).
 * 2.5 - 2.5.1      - Автоматический сброс основного запроса.
 */