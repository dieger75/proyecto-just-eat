<?php

if( isset($_GET['add-item']) ){ 
    $id = $_GET['add-item'];
    if ( $id == ''){

        echo json_encode(['statuscode' => 400, 'response' => 'no hay valor para id']);

    }else{

        if( is_logged_in() ){
            add($id);
            $redirect = 'rest-found.php?get-rest=' . $_GET['get-rest'];
            redirect_to($redirect);
        }else{
            redirect_to('login.php');
        }
    }  
}

if( isset($_GET['remove-item']) ){ 
    $id = $_GET['remove-item'];
    if ( $id == ''){

        echo json_encode(['statuscode' => 400, 'response' => 'no hay valor para id']);

    }else{

        if( is_logged_in() ){
            remove($id);
            $redirect = 'rest-found.php?get-rest=' . $_GET['get-rest'];
            redirect_to($redirect);
        }else{
            redirect_to('login.php');
        }
    }  
}


function mostrar(){
    
    $subtotal = 0;
    $total = 0;
    

    if (!empty($_SESSION['carrito'])) {

        $carrito = $_SESSION['carrito'];
        foreach ( $carrito as $producto) {
            $subtotal = $producto['precio'] + $subtotal;
            $subtotal = number_format($subtotal, 2, '.', ',');
        }
    
        $total = $subtotal + _ENVIO;
        $total = number_format($total, 2, '.', ',');
        $envio = number_format(_ENVIO, 2, '.', ','); //damos formato de valor decimal con 2 posiciones
    }
    
    
    
    $_SESSION['totales'] = ['subtotal' => $subtotal, 'envio' => $envio, 'total' => $total];
   
    return $_SESSION['totales'];
}

function add($id){

    $p_found = product_found($id);
    $name_p = $p_found->get_producto();
    $pre_p = $p_found->get_precio();
    $img_p = $p_found->get_img_product();
    $rest_id = $p_found->get_rest_id();

    if ( !isset( $_SESSION['carrito'] ) ) {
        $items = [];
    } else {

        $items = $_SESSION['carrito'];

        for ( $i = 0; $i < count( $items ); $i++) { 

            if ( $items[$i]['id'] == $id){

                $items[$i]['cant']++;
                $items[$i]['precio'] = $items[$i]['cant'] * $pre_p;
                $_SESSION['carrito'] = $items;
                return $_SESSION['carrito'];

            }
        }
    }
    
    $item = ['id' => $id, 'cant' => 1, 'prod' => $name_p, 'precio' => $pre_p, 'img' => $img_p, 'rest_id' => $rest_id];
    array_push( $items, $item );
    $_SESSION['carrito'] = $items;
    return $_SESSION['carrito'];
    
}


function remove($id){
    $p_found = product_found($id);
    $pre_p = $p_found->get_precio();

    if ( !isset( $_SESSION['carrito'] ) ) {
        $items = [];
    } else {

        $items = $_SESSION['carrito'];

        for ( $i = 0; $i < count( $items ); $i++) {

            if ( $items[$i]['id'] == $id){

                $items[$i]['cant']--;
                $items[$i]['precio'] = $items[$i]['cant'] * $pre_p;

                if ( $items[$i]['cant'] == 0 ) {
                    unset($items[$i]);

                    $items = array_values($items);
                }

                $_SESSION['carrito'] = $items;
                return $_SESSION['carrito'];
            }
            
        }

        
    }
    
}
