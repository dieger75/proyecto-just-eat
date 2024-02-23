<?php
if(!file_exists( __DIR__ . '/config.php') ){
    die('ERROR: No existe el config.php');
}

session_start();

require('config.php'); 
setlocale (LC_TIME, SITE_LANG);
date_default_timezone_set (SITE_TIMEZONE);

//------------ CONCEXXION A LA BASE DE DATOS(BBDD) con constantes creadas en config.php   ------------//
require('admin/inc/class-user.php');
require('inc/class-db.php');
require('inc/class-rest.php');

$app_db = new DB( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

$session_prod = '';

// ----------------------------------- fin de parte de la coneccion -----------------------------------//

//solicitando files de funciones para operar en el sistema

require('admin/inc/users.php');
require('admin/inc/rest-menu-prod.php');
require('inc/restaurant.php');
require('inc/helpers.php');

/**
 * Logout - cerrar sesión
 */
if( isset( $_GET['logout'] ) ){
    session_unset();
    session_destroy();
    
    redirect_to('index.php');
}
