<?php

//--------------------- FUNCION DE BUSQUEDA DE USUARIO --------------------------------//
/**
 * @param $id_found
 * @return array asociativo del producto encontrado
 */
function get_all_user(){
    global $app_db;
    
    $consulta = $app_db->query("SELECT * FROM usuarios");
    $user_found = $app_db->fetch_all($consulta);

    foreach ( $user_found as $user) {
        $user_obj = new User($user['id_user'], $user['name_user'], $user['dir_user'], $user['tel_user'], $user['mail_user'], $user['password_user'], $user['type_user']);
        $array_user_obj[] = $user_obj;
    }

    return $array_user_obj;
}
//------------------------------ fin de funcion carta_rest() -------------------------------------//


//--------------------- FUNCION DE BUSQUEDA DE USUARIO --------------------------------//
/**
 * @param $id_found
 * @return array asociativo del producto encontrado
 */
function user_found($id_found){
    global $app_db;
    $id_found = intval($id_found);
    $query = "SELECT * FROM usuarios WHERE id_user =". $id_found;
    $consulta = $app_db->query($query);
    $user = $app_db->fetch_assoc($consulta);
    
    $user_obj = new User($user['id_user'], $user['name_user'], $user['dir_user'], $user['tel_user'], $user['mail_user'], $user['password_user'], $user['type_user']);

    return $user_obj;

}
//------------------------------ fin de funcion carta_rest() -------------------------------------//


//-------------------------     FUNCION INSERTAR USUARIO    -----------------------------------//
function insert_user( $name_user, $dir_user, $tel_user, $mail_user, $password_user, $type_user ){
    global $app_db;

    $md5pass = md5($password_user);
    
    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $name_user = $app_db->real_escape_string($name_user);
    $dir_user = $app_db->real_escape_string($dir_user);
    $tel_user = $app_db->real_escape_string($tel_user);
    $mail_user = $app_db->real_escape_string($mail_user);
    $password_user = $app_db->real_escape_string($md5pass);
    $type_user = $app_db->real_escape_string($type_user);
    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//
    
    $query = "INSERT INTO usuarios
    (name_user, dir_user, tel_user, password_user, mail_user, type_user) VALUES
    ('$name_user', '$dir_user', '$tel_user', '$password_user', '$mail_user', '$type_user')";
    $result = $app_db->query($query);
    if(!$result){
        die( mysqli_error( $app_db) );
    }
}


//------------------------ FUNCION MODIFICAR USUARIO ----------------------------------------------------//
function modify_user( $id_user, $name_user, $dir_user, $tel_user, $password_user, $mail_user, $type_user ){
    global $app_db;
    $md5pass = md5($password_user);
    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    $id_user = $app_db->real_escape_string($id_user);
    $name_user = $app_db->real_escape_string($name_user);
    $dir_user = $app_db->real_escape_string($dir_user);
    $tel_user = $app_db->real_escape_string($tel_user);
    $mail_user = $app_db->real_escape_string($mail_user);
    $password_user = $app_db->real_escape_string($md5pass);
    $type_user = $app_db->real_escape_string($type_user);
    //----------------fin de saneamiento ante INYECCIONES SQL ----------------------------//
    
    $query = "UPDATE usuarios SET
            name_user = '$name_user',
            dir_user = '$dir_user',
            tel_user = '$tel_user',
            password_user = '$password_user',
            mail_user = '$mail_user',
            type_user = '$type_user'
            WHERE id_user = {$id_user}";

    $actualizar = $app_db->query($query);
    return $actualizar;
}
//------------------------ fin funcion modificar usuario ----------------------------------------------------//


//-------------------------------------FUNCION BORRAR USUARIO ------------------------------------------//
/**
 * @param $id_user (id del usuario)
 */
function delete_user($id_user){
    global $app_db;
    //----saneamiento de inyeccion SQL con inval() para converntir en número el valor de la variable -----------//
    $id_user = intval($id_user);
    //----------------------------------------------fin de saneamiento ----------------------------------//

    $query = "DELETE FROM usuarios WHERE id_user = {$id_user}";
    $result = $app_db->query($query);
}
//--------------------------fin funcion borrar producto ----------------------------//

/**--------------------     FUNCION SI YA EXISTE USUARIO    ------------------------- */
function verify_mail($mail_user) {
    global $app_db;
    $query = "SELECT * FROM usuarios WHERE mail_user = '{$mail_user}'";
    $consulta = $app_db->query($query);
    $user = $app_db->fetch_assoc($consulta);

    if( $user ){
        return true;
    }

    return false;
    
}