<?php
//------------------------------ funcion insertar un restaurante ------------------------------------//
/**
 * @param $name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat
 */
function insert_rest( $name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat ){
    global $app_db;

    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $name_rest = $app_db->real_escape_string($name_rest);
    $dir_rest = $app_db->real_escape_string($dir_rest);
    $tel_rest = $app_db->real_escape_string($tel_rest);
    $mail_rest = $app_db->real_escape_string($mail_rest);
    $web_rest = $app_db->real_escape_string($web_rest);
    $logo_rest = $app_db->real_escape_string($logo_rest);
    $type_eat = $app_db->real_escape_string($type_eat);

    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//

    $query = "INSERT INTO restaurantes
    ( name_rest, dir_rest, tel_rest, mail_rest, web_rest, logo_rest, type_eat ) VALUES
    ( '$name_rest', '$dir_rest', '$tel_rest', '$mail_rest', '$web_rest', '$logo_rest', '$type_eat' )";
    $result = $app_db->query($query);
    if(!$result){
        die( mysqli_error( $app_db) );
    }
}
//-----------------------------------------------fin de funcion insertar un post ---------------------------------------//

//-------------------------------------FUNCION BORRAR RESTAURANTE ------------------------------------------//
/**
 * @param $id_rest (id del restaurante)
 */
function delete_rest($id_rest){
    global $app_db;
    //----saneamiento de inyeccion SQL con inval() para converntir en número el valor de la variable -----------//
    $id_rest = intval($id_rest);
    //----------------------------------------------fin de saneamiento ----------------------------------//

    $result = $app_db->query("DELETE FROM restaurantes WHERE id_rest = {$id_rest}");

    if(!$result){
        die( mysqli_error( $app_db) ); //carga ultimo el error dado de la BBDD
    }

    delete_all_carta($id_rest);

    
}
//--------------------------fin funcion borrar restaurante -------------------------//


//----------------------FUNCION MODIFICAR RESTAURANTE --------------------------------------------//
/**
 * @ param $producto, $descripcion, $img_product, $precio, $id_rest
 */
function modify_rest( $id_rest, $name_rest, $dir_rest, $tel_rest, $mail_rest, $web_rest, $logo_rest, $type_eat ){
    global $app_db;

    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $name_rest = $app_db->real_escape_string($name_rest);
    $dir_rest = $app_db->real_escape_string($dir_rest);
    $tel_rest = $app_db->real_escape_string($tel_rest);
    $mail_rest = $app_db->real_escape_string($mail_rest);
    $web_rest = $app_db->real_escape_string($web_rest);
    $logo_rest = $app_db->real_escape_string($logo_rest);
    $type_eat = $app_db->real_escape_string($type_eat);
    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//

    
    $query = "UPDATE restaurantes SET
            name_rest = '$name_rest',
            dir_rest = '$dir_rest',
            tel_rest = '$tel_rest',
            mail_rest = '$mail_rest',
            web_rest = '$web_rest',
            logo_rest = '$logo_rest',
            type_eat = '$type_eat'
            WHERE id_rest = {$id_rest}";

    $actualizar = $app_db->query($query);
}
//---------------------- fin funcion modificar restaurante ------------------------------------//

//---------------------------------------- funcion insertar un producto a carta -----------------------//

function insert_carta($producto, $descripcion, $img_product, $precio, $rest_id){
    global $app_db;

    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $producto = $app_db->real_escape_string($producto);
    $descripcion = $app_db->real_escape_string($descripcion);
    $img_product = $app_db->real_escape_string($img_product);
    $precio = $app_db->real_escape_string($precio);
    $rest_id = $app_db->real_escape_string($rest_id);
    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//

    $query = "INSERT INTO productos
    (producto, descripcion, img_product, precio, rest_id ) VALUES
    ( '$producto', '$descripcion', '$img_product', $precio, $rest_id )";
    $result = $app_db->query( $query);
    var_dump($result);
    
}

//------------- BORRADO DE TODA LA CARTA DEL RESTAURANTE ------------------------//
/**
 * @param $id_rest (id del restaurante)
 */
function delete_all_carta($id_rest){
    global $app_db;
    
    $result = $app_db->query("DELETE FROM productos WHERE rest_id = {$id_rest}");

    if(!$result){
        die( mysqli_error( $app_db) ); //carga ultimo el error dado de la BBDD
    }

}
//------------- fin de funcion borrado de toda la carta -------------------------------//


//----------------------FUNCION MODIFICAR PRODUCTO --------------------------------------------//
/**
 * @ param $producto, $descripcion, $img_product, $precio, $id_rest
 */
function modify_product($id_producto,$producto, $descripcion, $img_product, $precio){
    global $app_db;
    
    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $id_producto = $app_db->real_escape_string( $id_producto );
    $producto = $app_db->real_escape_string($producto);
    $descripcion = $app_db->real_escape_string($descripcion);
    $img_product = $app_db->real_escape_string($img_product);
    //$precio = $app_db->real_escape_string($precio);
    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//

    $query = "UPDATE productos SET
            producto = '$producto',
            descripcion = '$descripcion',
            img_product = '$img_product',
            precio= {$precio}
            WHERE id_producto = {$id_producto}";

    $actualizar = $app_db->query($query);
}
//---------------------- fin funcion modificar producto ------------------------------------//


//----------------------------  FUNCION BORRAR PRODUCTO  ------------------------------------------//
/**
 * @param $id_rest (id del restaurante)
 */
function delete_product($id_producto){
    global $app_db;
    //----saneamiento de inyeccion SQL con inval() para converntir en número el valor de la variable -----------//
    $id_producto = intval($id_producto);
    //----------------------------------------------fin de saneamiento ----------------------------------//

    $result = $app_db->query("DELETE FROM productos WHERE id_producto = {$id_producto}");
    if(!$result){
        die( mysqli_error( $app_db) ); //carga ultimo el error dado de la BBDD
    }
}
//--------------------------fin funcion borrar producto ----------------------------//

/**---------------------    FUNCION DE COMPROBACION DE IMAGEN PARA INSERTAR   --------------- */
/**
 * @ param $image ($_FILES['file'])
 * @ param $path  (carpeta de la imagen)
 * @ return true or false ( false si la operación es satisfactoria)
 */
function check_image($image, $path) { 

    $directorio = DIR_SITE . 'assets/img/'. $path;    
    $archivo = $directorio . basename( $image['name']); // basename devuelve el último componente de nombre de una ruta => logos_rest/archivo_subido
    $tipoArchivo = strtolower( pathinfo($archivo, PATHINFO_EXTENSION) ); //devuelve la extension en minusculas del archivo subido
    $dimensionImagen = getimagesize( $image['tmp_name'] ); //devuelve las dimensiones del archvio de imagen (width y heigth)

    if ( file_exists($archivo) ){
        return true;
    }

    if ( ( $dimensionImagen != false ) && ( $dimensionImagen[0] == 165 ) && ( $dimensionImagen[1] == 165 ) ){
        $size = $image['size'];
        if ( $size > 100000 ){
            return true;
        } else {
            if ( $tipoArchivo =='jpg' || $tipoArchivo =='jpeg' || $tipoArchivo =='png') {
                move_uploaded_file( $image['tmp_name'],  $archivo);
                return false;
            } else {
                return true;
            }
        }
    } else {
        return true;
    }
}
