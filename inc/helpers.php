<?php

    //@parametro $path (o ruta en español)
    function redirect_to($path){
        //cabecera HEADER() de redirección de url (ENLACE A LA URL)
        header('Location:' . SITE_URL . $path);
        die();
    }

    //-------------- genera una cadena alfanumérica ------------------------//
    //@@param action
    //@@return string
    function generate_hash( $action ){
        return md5($action); //md5() encripta el valor recibido en la funcion.
    }

    //--------- comprueba si una secuencia alfanumerica es correcta --------------/
    //@@param action
    //@@param hash
    //@@return bool
    function check_hash($action, $hash){
        if( generate_hash($action) == $hash ){
            return true;
        }
        return false;
    }

    //------------------------------------------FUNCIONES PARA LOGIN---------------------------------------//
    /**
     * is_logged_in()
     * Comprueba el logged de tipo de usuario
     * 
     * @@ return bool 
     */
    function is_logged_in(){
        
        if ( isset($_SESSION['user']) ){

            /*$sesion = $_SESSION['user'];

            if ($sesion->get_type_user() == 'admin'){
                return $sesion;
            }
            return 'public';*/

            if ( $_SESSION['user']['type_user'] === 'admin') {
                return 'admin';
            }
            return 'public';
        }
        return false;
    }


    /**
     * login()
     * @@ username
     * @@ password
     * @@ return boolean
     */
    function login( $username, $mail_user, $password){
        global $app_db;

        $md5pass = md5($password);

        $query = "SELECT * FROM usuarios WHERE name_user = '$username' AND password_user = '$md5pass' AND mail_user = '$mail_user'";

        $consulta = $app_db->query($query);
        $user_found = $app_db->fetch_assoc($consulta);
        
        if($user_found){
            $_SESSION['user'] = $user_found;
            return true;
        }

        /*if($user_found){
            
            $user_obj = new User($user_found['id_user'], $user_found['name_user'], $user_found['dir_user'], $user_found['tel_user'], $user_found['mail_user'], $user_found['password_user'], $user_found['type_user']);

            $_SESSION['user'] = $user_obj;
    
            //return true;
            return $_SESSION['user'];
        }*/

        return false;
    }


    /** ----------------------------    función para insertar pedido a la BBDD      ------------------- */
    function envio_pedido() {
        global $app_db;
        
        $metod_pago = $_POST['payment_type'];
        $date_pedido = date( 'Y/m/d');
        $user_id = $_SESSION['user']['id_user'];
        $sub_tot_pedido = $_SESSION['totales']['subtotal'];
        $envio = $_SESSION['totales']['envio'];
        $total_pedido = $_SESSION['totales']['total'];

        $rest_id = 0;
        
        foreach ( $_SESSION['carrito'] as $value ) {
            $rest_id = $value['rest_id'];
        }       

        $query = "INSERT INTO pedidos
                ( date_pedido, sub_tot_pedido, envio, total_pedido, metod_pago, rest_id, user_id )
                VALUES
                ( '$date_pedido',
                '{$sub_tot_pedido}',
                '{$envio}',
                '{$total_pedido}',
                '$metod_pago',
                '{$rest_id}',
                '{$user_id}' )";

        $result = $app_db->query($query);
        
        if(!$result){
            die( mysqli_error( $app_db) );
        }
    
    }
    /** -------------------------------     fin de función para insertar pedido a BBDD  -------------------- */


    /** ---------------------  FUNCION PARA INSERTAR LOS PRODUCTOS DEL PEDIDO A LA BBDD     ----------------- */
    function envio_prod_pedido() {
        global $app_db;
                
        $query_id = "SELECT MAX( id_pedido ) AS id FROM pedidos"; /**selecciona el último registro de pedidos */
        $consulta = $app_db->query($query_id);
        $pedido = $app_db->fetch_assoc($consulta);
        $pedido_id = $pedido['id'];

        foreach ( $_SESSION['carrito'] as $value ) {
            $producto = $value['prod'];
            $precio_product = $value['precio'];
            $cant_product = $value['cant'];

            $query = "INSERT INTO product_pedido ( pedido_id, producto, precio_product, cant_product) VALUES
                ('$pedido_id', '$producto', '$precio_product', '$cant_product')";
            
            $result = $app_db->query($query);

            if(!$result){
                die( mysqli_error( $app_db) );
            }
        }
    }
    /** -------------------     fin de función para ingresar productos a la BBDD        -------------------- */