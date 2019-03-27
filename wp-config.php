<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cake');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tRxF^l]g^R`LWyS$zQdyeB5:qIDuEQ&ITF8`^U::^/N;tjk9a(Rd-PAfFbAd&!<c');
define('SECURE_AUTH_KEY',  'gogw2CNisDVK3fdCW<^Dqh]oPdY90Q=NwLP&N>xBW0u#Po)ECTThBn^Q]ajp@Vle');
define('LOGGED_IN_KEY',    'P$X~pMFRGhe`Y8`<we)U4s%Pem/<,La~ALiX*&P7!|<+uUL} u>W>?/=<tp;&DII');
define('NONCE_KEY',        'f~J`Aa@CJYor(m^pf@2$uVM#{ E2:pP_>,K;#rI@p&T[->bgb|b.]2&~W$;uMY@4');
define('AUTH_SALT',        'Wb.^m|x{2ad!Kl_6-%&HeGQw^J41KYOpb@+88mS6<85a{ttk7M8tNUOtGVYa{b)w');
define('SECURE_AUTH_SALT', '.o1KG&]8%z]`vg2Zo W!w]S*9W,e,iK`l`)@Zn:~dCZ[g;1dU^<x 9|;gcI1KJc:');
define('LOGGED_IN_SALT',   '5z}69NLOBr}u5Cwt}d{tj9=b?0RO jo3/pNqZl)b;Xi6*>OS?@orKOjWIR^ZVT@i');
define('NONCE_SALT',       'r0^M;MyMqJ*oOtIuU L/7SXQC=-[AMXH4(]#/qJsXaoXg0J~K$}Sfd/FFq3j(e(2');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
