<?php

require '../init.php';
require '../template/header.php';

$id_user = $_SESSION['user']['id_user'];

function pedidos($id_user) {
    global $app_db;

    $query = "SELECT * FROM pedidos WHERE user_id = $id_user";
    $consulta = $app_db->query($query);
    $result = $app_db->fetch_all($consulta);

    if($result == null){
        return false;
    }

    $ped_array_obj = [];

    foreach ( $result as $ped) {
        $ped_obj = new Pedidos ( $ped['id_pedido'], $ped['date_pedido'], $ped['sub_tot_pedido'], $ped['envio'], $ped['total_pedido'], $ped['metod_pago'], $ped['rest_id'], $ped['user_id'] );

        array_push( $ped_array_obj, $ped_obj );    
    }
    return $ped_array_obj;
}


function prod_pedido($id_pedido) {
    global $app_db;

    $query = "SELECT * FROM product_pedido WHERE pedido_id = $id_pedido";
    $consulta = $app_db->query($query);
    $result = $app_db->fetch_all($consulta);

    if($result == null){
        return false;
    }

    $prod_array_obj = [];

    foreach ( $result as $prod ) {
        $prod_obj = new Product_Pedidos ( $prod['pedido_id'], $prod['producto'], $prod['precio_product'], $prod['cant_product'] );

        array_push( $prod_array_obj, $prod_obj );
    }
    return $prod_array_obj;
}

$items = pedidos($id_user);

?>

<div class='header-account'></div>

<main class='content' style='display: flex'>
    <div class="registrate no-shadow">
        <ul>
            <div class=''>
                <li>
                    <div class='li-account'>
                        <a href='<?php echo SITE_URL; ?>account/info.php'>Información de la cuenta</a>
                    </div>
                </li>
                <li>
                    <div class='li-account'  style='font-weight: 700'><a href='<?php echo SITE_URL; ?>account/order-history.php'>Pedidos</a></div>
                </li>
            </div>
        </ul>
    </div>
    <div class='' style='width: 100%'>
        <h3 class='tit-acount registrate no-shadow'>PEDIDOS</h3>
        <div class='restaurantes'>
            <?php if ($items) : ?>
                <?php foreach ( $items as $pedido => $key) : ?>
                    <div class='cont-tit box-pedido'>
                        <p>Número de pedido: V-000<?php echo $key->get_id_pedido(); ?></p>
                        <p>Fecha de pedido: <?php echo $key->get_date_pedido(); ?></p>
                        <p>Metodo de pago: <?php echo $key->get_metod_pago(); ?></p>
                        <p>Contenido del pedido:</p>

                        <?php $prod_array = prod_pedido( $key->get_id_pedido() ); ?>
                        <?php foreach ( $prod_array as $prod ) : ?>
                            <div class='cont-list-carrito'>
                                <div class='ped-cant'><?php echo $prod->get_cant_product(); ?></div>
                                <div class='ped-prod' style='flex-basis: 72%'><?php echo $prod->get_name_product_pp(); ?></div>
                                <div class='pre-prod'><?php echo $prod->get_precio_pp(); ?> €</div>
                            </div>
                        <?php endforeach; ?>
                        <div class='cont-list-carrito'>
                            <div class='subtotal'>Subtotal</div>
                            <div class='pre-sub-total'><?php echo $key->get_sub_tot_pedido(); ?> €</div>
                        </div>
                        <div class='cont-list-carrito'>
                            <div class='gastos-envio'>Gastos de envio</div>
                            <div class='pre-envio'><?php echo $key->get_envio(); ?> €</div>
                        </div>
                        <div class='cont-list-carrito'>
                            <div class='total-total'>Total</div>
                            <div class='pre-total-total'><?php echo $key->get_total_pedido(); ?> €</div>    
                        </div>
                    </div>
                    
                <?php endforeach; ?>
            <?php else : ?>
                <h3 class='tit-acount'>Aún no has hecho ningún pedido</h3>
            <?php endif; ?>
        </div>
    </div>

</main>
<?php  require('../template/footer.php'); ?>