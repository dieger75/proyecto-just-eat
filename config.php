<?php
//DEPURANDO ERRORES
error_reporting(E_ALL); //funcion definida para reportar todos los errores si los hubiera
ini_set('display_errors', 1); //funcion definida que muestra los errores en tiempo de ejecucion de los errores

//DECLARACION DE CONSTANTES
define('SITE_URL', 'http://localhost/proyecto-just-eat/'); //En producción sería otra url
define('SITE_TIMEZONE', 'Europe/Madrid'); //constante con valor de zona horaria
define('SITE_LANG', ['es', 'spa', 'es_Es'] ); //contante con los valores del idioma
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'just-eat');
define('DB_PORT', '3306');

define('SITE_URL_PLATOS', 'http://localhost/proyecto-just-eat/assets/img/productos/');
define('SITE_URL_REST', 'http://localhost/proyecto-just-eat/assets/img/logos_rest/');
define('DIR_SITE', 'C:/MAMP/htdocs/proyecto-just-eat/');
define('T_USER', 'public');
define('_ENVIO', 3);