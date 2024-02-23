<?php
require 'init.php';

if( isset($_GET['get-rest']) ){
    $prod_found = get_carta($_GET['get-rest']);
    $rest = get_rest($_GET['get-rest']);
    $_SESSION['web-rest'] = 'rest-found.php?get-rest='. $_GET['get-rest'];
}


if( isset($_POST['submit-pagar']) ){
    redirect_to( 'pedido.php' );
}

?>

<?php require 'carrito.php';?>

<?php require 'template/header.php';?>

<div class='header-rest'></div>
<main class='content'>
    
    <div class='content-menu-rest'>
        <div class='menu-rest'>

            <!----------    EJECUCIONES DE LA CABECERA Y LISTA DE PRODUCTOS DEL RESTAURANTE    ---------->
            <article class='cont-tit'>
                <header class='header-tit'> 
                    <img src='<?php echo SITE_URL_REST . $rest->get_logo_rest(); ?>'>
                    <h2 class='tit-rest'><?php echo $rest->get_name_rest(); ?></h2>
                </header>
                <div class='info-rest'>
                    <a href='<?php echo $rest->get_web_rest();?>' target='_blank'><?php echo $rest->get_web_rest();?></a>
                    <p><?php echo $rest->get_dir_rest();?></p>
                    <p><?php echo $rest->get_tel_rest();?></p>
                </div>
            </article>
            <!----------------------------  LISTA DE PRODUCTOS  -------------------------->
            <?php if( $prod_found ): ?>
                <?php foreach ( $prod_found as $prod): ?>
                    <div class='cont-list-menu'>
                        <article class='lista-product'>
                            <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $prod->get_id_producto();?>">
                            <div class='img-prod-list'>
                                <img src='<?php echo SITE_URL_PLATOS . $prod->get_img_product();?>'>
                            </div> 
                            <div class='name-prod-list'>
                                <h3 class='tit-acount'><?php echo $prod->get_producto();?></h3>
                                <p><?php echo $prod->get_descripcion();?></p>
                            </div>
                            <div class='precio-prod-list'>
                                <p class='tit-acount'><?php echo $prod->get_precio();?>€</p>
                            </div>
                            <div class='btn-prod-list'>
                            <a href=" <?php echo SITE_URL . 'rest-found.php?get-rest=' . $rest->get_id_rest();?>&add-item=<?php echo $prod->get_id_producto();?>"><button class='btn-form'>Añadir</button></a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>        
            <!-------------------   fin de lista de productos   ------------------------->
        </div>
        
        <!--------------------------------------VENTANA DE PEDIDO ---------------------------------------->
        <aside class='aside-pedido'>
            <div id='ancla-aside' class='cont-pedido'>
                <div class='tit-pedido'>
                    <h3>Tu pedido</h3>
                </div>
                
                <?php if( isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])):?>

                    <form action="" method='post' class=''>
                        
                        <?php foreach ( $_SESSION['carrito'] as $value ) : ?>
                            <div class='cont-list-carrito'>
                                <div class='ped-cant'>   
                                    <p><?php echo $value['cant']; ?></p>
                                </div>

                                <div class='ped-prod'>
                                    <p><?php echo $value['prod']; ?></p>
                                </div>
                                    
                                <button class='borrar' type='button'>
                                    <a href=" <?php echo SITE_URL . 'rest-found.php?get-rest=' . $rest->get_id_rest();?>&remove-item=<?php echo $value['id'];?>"><i class="fas fa-trash-alt"></i></a>
                                </button>

                                <div class='pre-prod'>
                                    <p><?php echo $value['precio']; ?> €</p>
                                </div>
                            </div>  
                        <?php endforeach; ?>
                        
                        <?php if (isset($_SESSION['totales']) ) : ?>
                            <?php $mostrar = mostrar(); ?>
                            <div class='cont-list-carrito'>
                                <div class='subtotal'>Subtotal</div>
                                <div class='pre-sub-total'><?php echo $mostrar['subtotal']; ?> €</div>
                            </div>
                            <div class='cont-list-carrito'>
                                <div class='gastos-envio'>Gastos de envio</div>
                                <div class='pre-envio'><?php echo $mostrar['envio']; ?> €</div>
                            </div>
                            <div class='cont-list-carrito'>
                                <div class='total-total'>Total</div>
                                <div class='pre-total-total'><?php echo $mostrar['total']; ?> €</div>    
                            </div>
                            <div class='cont-list-carrito btn-pedido'>
                                <input type="submit" name='submit-pagar' value='Tramitar pedido' class='btn-form'>
                            </div>
                        <?php endif; ?>

                    </form>
                <?php endif; ?>  
            </div>
        </aside>
    </div>

</main>

<?php require('template/footer.php'); ?>