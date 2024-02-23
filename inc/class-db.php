<?php
class DB {
    private $app_db = false;

    public function __construct( $hot, $user, $pass, $database, $port ){
    //------------ CONCEXXION A LA BASE DE DATOS(BBDD) con constantes creadas en config.php   -------------------//
 
        $this->app_db = mysqli_connect( $hot, $user, $pass, $database, $port);
        if( !$this->app_db){ // esto es igual a $app_db == false
    
            //si la conexion a la bbdd ha ido mal. deevuelve falso
            die('Error al conectar la base de datos');
        }
     // -------------------------fin de parte de la coneccion ---------------------------//
    }

    //metodo para hacer cualquier tipo de query
    public function query( $query ){

        $result = mysqli_query($this->app_db, $query);

        if(!$result){ //$result == false
            die($this->get_last_error());
        }
        return $result;
    }


    //metodo para sacar el último error en la bbdd en el caso de que lo haya habido
    public function get_last_error(){
        return myqli_error( $this->app_db );
    }

    //metodo para sacar una serie de resultados
    //devuelve todas las filas o registros de una tabla de mi BBDD en forma de array asosiativo
    public function fetch_all( $result ) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    //otro método que ya usaba antes y que ahpra tb lo meto en la clase
    //devuelve una fila o registro de una tabla de mi BBDD en forma de array asosiativo
    public function fetch_assoc( $result ){
        return mysqli_fetch_assoc( $result );
    }

    //otro método que va a escapar los caracteres especiales de la BBDD
    //----------------saneamiento ante INYECCIONES SQL ----------------------------//
    public function real_escape_string( $string ){
        return mysqli_real_escape_string($this->app_db, $string);
    }
}