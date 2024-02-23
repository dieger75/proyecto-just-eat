<?php
    require 'init.php';

    if ( empty($_SESSION['carrito']) && empty($_SESSION['totales']) && empty($_SESSION['web-rest']) ){
        redirect_to('index.php');
    }

    $dir_entrega = $_SESSION['user']['dir_user'];
    $name_user = $_SESSION['user']['name_user'];
    $tel_user = $_SESSION['user']['tel_user'];

?>
<?php require 'template/header.php';?>
<div class='header-pedido'></div>
<main class='content'>
    <div class='cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>CONFIRMAR PEDIDO</h2>
        </div>
    </div>
<div class="content-menu-rest">
    <div class='cont-envio'>
        <div class='tit-pedido'>
            <h3>Dirección de envío</h3>
        </div>
        
        <div class='cont-list-menu lista-product margin-bottom'>
            <div class='info-user-pedido'>
                <p>Nombre: <?php echo $name_user; ?></p>
                <p>Dirección: <?php echo $dir_entrega; ?></p>
                <p>Teléfono: <?php echo $tel_user; ?></p>
            </div>
        </div>
        
        <form action="enviado.php" method="post">
        
            <div class='tit-pedido'><h3>Metodo de pago</h3></div>
            <div class='cont-list-menu lista-product no-display-flex margin-bottom'>
                <p>
                    <input type="radio" name="payment_type" value="mastercard" checked="on"> 
                    <img src="assets/img/otros/mc_hrz_opt_pos_76_3x.png" alt="">
                </p>
                <p>
                    <input type="radio" name="payment_type" value="paypal"> 
                    <img src="assets/img/otros/PP_logo_h_150x38.png" style='margin-left: 20px'>
                </p>
                <p>
                    <input type="radio" name="payment_type" value="domicilio">
                    <label style='margin-left: 20px'>Pago en domicilio</label>
                </p>
            </div>
            <div class='tit-pedido'><h3>Revisar productos</h3></div>
            <div class='cont-list-menu lista-product list-envio margin-bottom'>

                <?php foreach ( $_SESSION['carrito'] as $prod) :?>
                    <div class='cont-list-carrito'>
                        <div class='ped-cant'>
                            <div><?php echo $prod['cant']; ?></div>
                        </div>
                        <div class='ped-prod' style='flex-basis: 72%'>
                            <div><?php echo $prod['prod']; ?></div>
                        </div>
                        <div class='pre-prod'>
                            <div><?php echo $prod['precio']; ?> €</div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class='cont-list-carrito tot-envio-pedido margin-bottom'>
                    <div class='total-total'>Total</div>
                    <div class='pre-total-total'><?php echo $_SESSION['totales']['total']; ?> €</div>    
                </div>
                <a href="<?php echo SITE_URL . $_SESSION['web-rest']; ?>" style='text-align: right'>
                    <button type="button" class='btn-form'>Cambiar</button>
                </a>
            </div> 
            
            

            <div style='text-align: center'>
                <input type="submit" name='submit-enviar' value='Pagar ahora' class='btn-form'>
            </div>
        </form>
    </div>
    <div class='cont-envio'>
        <div class='circle1'>
            <img src="<?php echo SITE_URL . 'assets/img/people/woman-delivery-600.png';?>" alt="">
        </div>
        <div class='circle2'></div>
    </div>
</div>
</main>
<?php require 'template/footer.php'; ?>