<?php

require '../init.php';

/**--------------------------CONTROLADOR DE ACCESO A LA ZONA DE ADMINISTRADOR------------------- */
if( ! is_logged_in() ){
    redirect_to( 'login.php' );
}elseif( is_logged_in() === 'public'){
        redirect_to( 'index.php' );
}

/**------------------------------ fin de controlador de acceso --------------------------------- */


/**--------------------------CONTROLADOR PARA LAS ACCIONES A SEGUIR ---------------------------- */
$action = isset($_GET['action']) ? $_GET['action'] : ''; //if ternario
switch ($action){
    /**------------------------     opción para craer nuevo restaurante     --------------------------*/
    case 'new-rest' : {
        $error = false;
        $mensaje = false;

        $name_rest = '';
        $dir_rest = '';
        $tel_rest = '';
        $logo_rest = '';
        $mail_rest = '';
        $web_rest = '';

        if( isset( $_POST['submit-new-rest'] ) ){

            $name_rest = filter_input( INPUT_POST, 'name_rest', FILTER_SANITIZE_STRING);
            $dir_rest = filter_input( INPUT_POST, 'dir_rest', FILTER_SANITIZE_STRING);
            $tel_rest = filter_input( INPUT_POST, 'tel_rest', FILTER_SANITIZE_STRING);
            $mail_rest = filter_input( INPUT_POST, 'mail_rest', FILTER_SANITIZE_EMAIL);
            $web_rest = filter_input( INPUT_POST, 'web_rest', FILTER_SANITIZE_URL);
            $type_eat = filter_input( INPUT_POST, 'type_eat', FILTER_SANITIZE_STRING);
            $logo_rest = htmlspecialchars($logo_rest, ENT_QUOTES);


            if(empty($name_rest) || empty($dir_rest) || empty($tel_rest) || empty($mail_rest) || empty($type_eat)){
                $error = true;

            } else {

                if ( isset ( $_FILES['logo_rest'] ) && ( $_FILES['logo_rest']['size'] != 0) ){
                    $image = $_FILES['logo_rest'];
                    $path = 'logos_rest/';
                    $mensaje = check_image( $image, $path ); //se llama a la funcion para la comprobación de la imagen
                    $logo_rest = basename( $image['name']); //nombre de la imagen
                }

                if ($mensaje == false) {
                    insert_rest($name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat);
                    redirect_to('admin?action=list-rest&exito=true');
                }
            }
        }

        require 'templates/new_rest.php';
        break;
    }
    /**-----------------------  opción de lista de restaurantes y opcion a eliminar    ------------- */
    case 'list-rest' : {

        $result = false;

        if(isset($_GET['delete-rest'])){
            $id_rest = $_GET['delete-rest'];
            
            if( ! check_hash('delete-rest-'.$id_rest, $_GET['hash'])){
                die('Me estas hackeando');
            }

            $rest = get_rest($id_rest);
            $logo = $rest->get_logo_rest();

            $path = '../assets/img/logos_rest/'. $logo; //ruta de la imagen en la carpeta de logos de restaurante

            if ( file_exists($path) ) { //comprobar si la imagen existe en directorio
                unlink($path);
            }

            delete_rest($id_rest);
            redirect_to('admin?action=list-rest&exito-delete=true');
            
        }

        $all_rest = get_all_rest();  
        require 'templates/list_rest.php';
        break;
    }
    /**-----------------------     opción de modificar restaurante  -------------------------------- */
    case 'mod-rest' : {
        if(isset($_GET['modify-rest'])){
            $id_rest = $_GET['modify-rest'];
            if( ! check_hash('modify-rest-'.$id_rest, $_GET['hash'])){
                die('Me estas hackeando');
            }
        }

        $mensaje = false;
        $error = false;

        $found = get_rest($id_rest);
        $logo_rest = $found->get_logo_rest();

        if ( isset( $_POST['submit-mod-rest'] ) ){            

            if ( isset ( $_FILES['logo_rest'] ) && ( $_FILES['logo_rest']['size'] != 0) ){

                $image = $_FILES['logo_rest'];
                $path = 'logos_rest/';
                $mensaje = check_image( $image, $path ); //se llama a la funcion para la comprobación de la imagen
                $logo_rest = basename( $image['name']); //nombre de la imagen
            }

            if ($mensaje == false) {

                $path = '../assets/img/logos_rest/'. $found->get_logo_rest(); //ruta de la imagen en la carpeta de logos de restaurante
                if ( file_exists($path) ) { //comprobar si la imagen existe en directorio
                    unlink($path);
                }
                
                $name_rest = filter_input( INPUT_POST, 'name_rest', FILTER_SANITIZE_STRING);
                $dir_rest = filter_input( INPUT_POST, 'dir_rest', FILTER_SANITIZE_STRING);
                $tel_rest = filter_input( INPUT_POST, 'tel_rest', FILTER_SANITIZE_NUMBER_INT);
                $mail_rest = filter_input( INPUT_POST, 'mail_rest', FILTER_SANITIZE_EMAIL);
                $web_rest = filter_input( INPUT_POST, 'web_rest', FILTER_SANITIZE_URL);
                $type_eat = filter_input( INPUT_POST, 'type_eat', FILTER_SANITIZE_STRING);
                
                modify_rest( $id_rest, $name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat );
                redirect_to('admin?action=list-rest&exito=true');
            }
        }
        
        require 'templates/modify_rest.php';
        break;
    }

    //---------------------     opción de crear nuevos productos para la carta      --------------------------//
    case 'new-carta' : {
        $error = false;
        $mensaje = false;

        $rest_id = '';
        $producto = '';
        $descripcion = '';
        $precio = 0;
        $img_product = '';

        if( isset($_POST['submit-new-carta']) ){

            $rest_id = filter_input( INPUT_POST, 'rest_id', FILTER_SANITIZE_NUMBER_INT);
            $producto = filter_input( INPUT_POST, 'producto', FILTER_SANITIZE_STRING);
            $descripcion = strip_tags($_POST['descripcion'], '<br><p><a><img><div>');
            $precio = filter_input( INPUT_POST, 'precio', FILTER_SANITIZE_NUMBER_INT);   

            if(empty($producto) || empty($descripcion) || empty($precio)){
                $error = true;

            }else{

                if ( isset ( $_FILES['img_product'] ) && ( $_FILES['img_product']['size'] != 0) ){
                    $image = $_FILES['img_product'];
                    $path = 'productos/';
                    $mensaje = check_image( $image, $path ); //se llama a la funcion para la comprobación de la imagen
                    $img_product = basename( $image['name']); //nombre de la imagen
                    var_dump($mensaje);
                }
                 
                if ( $mensaje == false) {
                    insert_carta($producto, $descripcion, $img_product, $precio, $rest_id);
                    redirect_to('admin?action=list-carta&exito=true');
                }
            }
        }

        $all_rest = get_all_rest();
        require 'templates/new_carta.php';
        break;
    }
    /**-------------------------    opción de listar productos rest y opcion eliminar   ------------- */
    case 'list-carta' : {
        $error = false;

        if(isset($_POST['submit-found-rest'])) { 
            
            if(!empty($_POST['id_rest'])){
                $error = true;
            }
        }
    
        if(isset($_GET['delete-product'])){
            $id_producto = $_GET['delete-product'];
            
            if( ! check_hash('delete-product-'.$id_producto, $_GET['hash'])){
                die('Me estas hackeando');
            }

            $prod = product_found($id_producto);
            $img_product = $prod->get_img_product();

            $path = '../assets/img/productos/'. $img_product; //ruta de la imagen en la carpeta de logos de restaurante

            if ( file_exists($path) ) { //comprobar si la imagen existe en directorio
                unlink($path);
            }

            delete_product($id_producto);
            redirect_to('admin?action=list-carta&exito-delete=true');
        }
        
        $all_rest = get_all_rest();
        
        require 'templates/list_carta.php';
        break;
    }
    /**-----------------------      opción de modificar productos       -------------------------- */
    case 'mod-product' : {
        if(isset($_GET['modify-product'])){
            $id_producto = $_GET['modify-product'];
            if( ! check_hash('modify-product-'. $id_producto, $_GET['hash'])){
                die('Me estas hackeando');
            }
        }

        $error = false;
        $mensaje = false;

        $prod = product_found($id_producto);
        $img_product = $prod->get_img_product();

        if( isset($_POST['submit-mod-product']) ){

            if ( isset ( $_FILES['img_product'] ) && ( $_FILES['img_product']['size'] != 0) ){

                $image = $_FILES['img_product'];
                $path = 'productos/';
                $mensaje = check_image( $image, $path ); //se llama a la funcion para la comprobación de la imagen
                $img_product = basename( $image['name']); //nombre de la imagen
            }

            if ($mensaje == false) {

                $path = '../assets/img/productos/'. $prod->get_img_product(); //ruta de la imagen en la carpeta de logos de restaurante
                if ( file_exists($path) ) { //comprobar si la imagen anterior existe en directorio para borrala
                    unlink($path);
                }

                $id_producto = filter_input( INPUT_POST, 'id_producto', FILTER_SANITIZE_NUMBER_INT);
                $producto = filter_input( INPUT_POST, 'producto', FILTER_SANITIZE_STRING);
                $descripcion = strip_tags($_POST['descripcion'], '<br><p><a><img><div>');
                $precio = filter_input( INPUT_POST, 'precio', FILTER_SANITIZE_STRING);
                    
                modify_product($id_producto,$producto, $descripcion, $img_product, $precio);
                redirect_to('admin?action=list-carta&exito=true');
            }
        }
        
        require 'templates/modify_product.php';
        break;
    }

    //---------------------     opciones de crear usuario       ----------------------//
    case 'new-user' : {
        $error = false;
        $name_user = '';
        $dir_user = '';
        $tel_user = '';
        $mail_user = '';
        $password_user = '';
        $type_user = '';

        if(isset($_POST['submit-new-user'])){

            $name_user = filter_input( INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
            $dir_user = filter_input( INPUT_POST, 'dir_user', FILTER_SANITIZE_STRING);
            $tel_user = filter_input( INPUT_POST, 'tel_user', FILTER_SANITIZE_NUMBER_INT);
            $mail_user = filter_input( INPUT_POST, 'mail_user', FILTER_SANITIZE_EMAIL);
            $password_user = filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING);
            $type_user = filter_input( INPUT_POST, 'type_user', FILTER_SANITIZE_STRING);

            if(empty($type_user) || empty($dir_user) || empty($tel_user) || empty($mail_user) ||  empty($type_user) ||  empty($password_user)){

                $error = true;

            }else{

                insert_user($name_user, $dir_user, $tel_user, $mail_user, $password_user, $type_user);
                redirect_to('admin?action=list-user&exito=true');
            }            

        }
        require 'templates/new_user.php';
        break;
    }
    /**---------------------------      opciones de listar usuario y eliminarlos    ----------------- */
    case 'list-user' : {
        if(isset($_GET['delete-user'])){
            $id_user = $_GET['delete-user'];
            
            if( ! check_hash('delete-user-'.$id_user, $_GET['hash'])){
                die('Me estas intentando hackear');
            }
    
            delete_user($id_user);
            redirect_to('admin?action=list-user&exito-delete=true');
        }
        
        $all_users = get_all_user();
        require 'templates/list_user.php';
        break;
    }
    /**---------------------------      opción de modificar usuario     ------------------------------- */
    case 'mod-user' : {
        
        $error = false;

        if(isset($_GET['modify-user'])){
            $id_user = $_GET['modify-user'];
            if( ! check_hash('modify-user-'.$id_user, $_GET['hash'])){
                die('Me estas hackeando');
            }
        }

        if( isset($_POST['submit-mod-user']) ){
            $id_user = filter_input( INPUT_POST, 'id_user', FILTER_SANITIZE_NUMBER_INT);
            $name_user = filter_input( INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
            $dir_user = filter_input( INPUT_POST, 'dir_user', FILTER_SANITIZE_STRING);
            $tel_user = filter_input( INPUT_POST, 'tel_user', FILTER_SANITIZE_NUMBER_INT);
            $mail_user = filter_input( INPUT_POST, 'mail_user', FILTER_SANITIZE_STRING);
            $password_user = filter_input( INPUT_POST, 'password_user', FILTER_SANITIZE_STRING);
            $type_user = filter_input( INPUT_POST, 'type_user', FILTER_SANITIZE_STRING);

            modify_user( $id_user, $name_user, $dir_user, $tel_user, $password_user, $mail_user, $type_user );
            redirect_to('admin?action=list-user&exito=true');
        }

        $user_obj = user_found($id_user);
        require 'templates/modify_user.php';
        break;
    }
    
    default : {
        require 'templates/admin.php';
    }
}

?>
