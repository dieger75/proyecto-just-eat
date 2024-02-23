<?php
/**
 * 
 * @ return devuelve como array asosiactivo todas las filas de la tabla
 */
function get_all_rest(){
    global $app_db;
    $array_rest_obj = [];

     //ejecuto la query mysqli parra llamar a todos los restaurantes de la BBDD
    $consulta = $app_db->query("SELECT * FROM restaurantes");
    $rest_found = $app_db->fetch_all( $consulta );

    foreach ( $rest_found as $rest) {

        $rest_obj = new Rest($rest['id_rest'], $rest['name_rest'], $rest['dir_rest'], $rest['tel_rest'], $rest['mail_rest'], $rest['web_rest'], $rest['logo_rest'], $rest['type_eat']);

        $array_rest_obj[] = $rest_obj;
    }
    
    return $array_rest_obj;
}

/**
 * @ param $type (tipo de comida a vender)
 * @ return devuelve como array asosiactivo todas las filas de la tabla
 */
function get_type_rest($type){
    global $app_db;
    $array_rest_obj = [];

    $query = "SELECT * FROM restaurantes WHERE type_eat = '{$type}'";
    $consulta = $app_db->query($query);
    $rest_found = $app_db->fetch_all( $consulta );

    foreach ( $rest_found as $rest) {

        $rest_obj = new Rest($rest['id_rest'], $rest['name_rest'], $rest['dir_rest'], $rest['tel_rest'], $rest['mail_rest'], $rest['web_rest'], $rest['logo_rest'], $rest['type_eat']);

        $array_rest_obj[] = $rest_obj;
    }
    
    return $array_rest_obj;
}


//------------------- FUNCION QUE BUSCA RESTARURANTES Y TIPOS DE RESTAURANTES ------------------------------//
/**
 * @param $found (id del restaurante a buscar)
 */
function get_rest($id_found){
    global $app_db;

    if(is_numeric($id_found)){
        $id_found = intval($id_found);
        $query = "SELECT * FROM restaurantes WHERE id_rest =" . $id_found;
        
    }else{
        $query = "SELECT * FROM restaurantes WHERE type_eat = '{$id_found}'";

    }
    
    $consulta = $app_db->query($query);
    $rest = $app_db->fetch_assoc($consulta);
    $rest_obj = new Rest($rest['id_rest'], $rest['name_rest'], $rest['dir_rest'], $rest['tel_rest'], $rest['mail_rest'], $rest['web_rest'], $rest['logo_rest'], $rest['type_eat']);

    return $rest_obj;
}
//------------------------- fin funcion que busca restaurante --------------------------------------//


//----------------------    FUNCION QUE MUESTRA CARTAS Y PRECIO SEGUN RESTAURANTE   ---------//
/**
 * @param $found
 * @return array asociativo de platos y precios del restaurante
 */
function get_carta($id_found){
    global $app_db;
    
    $id_found = intval($id_found);

    $query = "SELECT Re.id_rest,
                     Re.name_rest,
                     Pr.id_producto,
                     Pr.producto,
                     Pr.descripcion,
                     Pr.img_product,
                     Pr.precio,
                     Pr.rest_id
                FROM restaurantes Re
                INNER JOIN productos Pr ON Re.id_rest = Pr.rest_id
                WHERE Re.id_rest =". $id_found;

    $consulta = $app_db->query($query);
    $prod_found = $app_db->fetch_all($consulta);

    if($prod_found == null){
        return false;
    }

    foreach ( $prod_found as $prod){
        $prod_obj = new Product($prod['id_producto'], $prod['producto'], $prod['descripcion'], $prod['img_product'], $prod['precio'], $prod['rest_id'], $prod['name_rest']);
        $array_prod_obj [] = $prod_obj;
    }

    return $array_prod_obj;
}
//-------------------------------------- fin de funcion carta_rest() ------------------------------------------//


//---------------------     FUNCION DE BUSQUEDA DE PRODUCTO POR SU ID    --------------------------------//
/**
 * @param $id_found
 * @return array asociativo del producto encontrado
 */
function product_found($id_found){
    global $app_db;
    $id_found = intval($id_found);
    $query = "SELECT Re.id_rest,
                     Re.name_rest,
                     Pr.id_producto,
                     Pr.producto,
                     Pr.descripcion,
                     Pr.img_product,
                     Pr.precio
                FROM restaurantes Re
                INNER JOIN productos Pr ON Re.id_rest = Pr.rest_id
                WHERE Pr.id_producto =". $id_found;

    $consulta = $app_db->query($query);
    $prod = $app_db->fetch_assoc($consulta);

    if($prod == null){
        return false;
    }

    $prod_obj = new Product($prod['id_producto'], $prod['producto'], $prod['descripcion'], $prod['img_product'], $prod['precio'], $prod['id_rest'], $prod['name_rest']);

    return $prod_obj;
}
//------------------------------ fin de funcion carta_rest() --------------------------------//



