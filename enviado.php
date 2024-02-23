<?php

    require 'init.php';
    

    if ( empty($_SESSION['carrito']) && empty($_SESSION['totales']) && empty($_SESSION['web-rest']) && !isset($_POST['payment_type']) ){
        redirect_to('index.php');
    }

    envio_pedido();
    envio_prod_pedido();
    
    $_SESSION['carrito'] = [];
    $_SESSION['totales'] = [];
    $_SESSION['web-rest'] = '';

?>
<?php require 'template/header.php';?>

<div class='header-account'></div>
<main class='content'>
    <div class='content-menu-rest' style='justify-content: center'>
        <img src="assets/img/people/woman-delivery3-600.png" class='img-enviado'>
        <div class='cont-tit mensaje-enviado'>
            <h3 class='tit-enviado'>¡Gracias!</h3>
            <h3 class='tit-enviado'>Tu pedido está de camino.</h3>
        </div>
    </div>
    
</main>
<?php require('template/footer.php'); ?>