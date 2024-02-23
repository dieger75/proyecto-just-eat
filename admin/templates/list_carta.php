<?php require __DIR__ . '/../../template/header.php';?>

<div class='header-admin'></div>
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>LISTADO DE CARTAS</h2>
            <?php if(isset($_GET['exito-delete'])):?>
                <p class="errorUsuario">* El elemento ha sido eliminado correctamente</p>
            <?php endif; ?>
            <?php if(isset($_GET['exito'])):?>
                <p class="errorUsuario">* El elemento ha sido modificado correctamente</p>
            <?php endif; ?>
        </div>
    </div>   
        <!-------------------seleccion de restaurante para mostrar su carta ------------------>
    <div class='cont-tit-select'>
        <div class='select-admin'>
            <form class="form-select" action="" method="post">
                <div class="back-select form-control">
                    <select name="id_rest" class='select-option'>
                        <option value="">Seleccione resturante</option>
                        <?php
                            foreach( $all_rest as $rest ): ?>
                                    <option value="<?php echo $rest->get_id_rest(); ?>"><?php echo $rest->get_name_rest(); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div>
                   <input type="submit" name="submit-found-rest" value="Buscar"  class="btn-form">
                </div>
            </form>
        </div>

        <!--------------------------fin de select de restaurante ------------------------------->

        <!--creando tablas para página de listado de posts --> 

        <?php if($error) :
            $all_cartas = get_carta($_POST['id_rest']);
            $rest = get_rest($_POST['id_rest']);?>
            <div class='tit-rest-admin'>
                <h2 class='tit-rest'>
                    <?php echo $rest->get_name_rest(); ?>
                </h2>
            </div>
        <?php endif; ?>
    </div>

    <?php if($error): ?>
        <?php if ($all_cartas) : ?>
            <div class='cont-list-prod'>
                <table>
                    <tr>
                        <td class='center-tit'>Producto</td>
                        <td class='center-tit'>Descripción</td>
                        <td class='center-tit'>Imagen</td>
                        <td class='center-tit'>Precio</td>
                    </tr>
                    <?php foreach ( $all_cartas as $prod): ?>
                        <tr>
                            <td class = 'td-name'><?php echo $prod->get_producto(); ?></td>
                            <td class = 'td-descrip'><?php echo $prod->get_descripcion(); ?></td>
                            <td><?php echo $prod->get_img_product(); ?></td>
                            <td><?php echo $prod->get_precio(); ?></td>
                            <td>
                                <a href="<?php echo SITE_URL . 'admin?action=list-carta&delete-product=' . $prod->get_id_producto();?>&hash=<?php echo generate_hash('delete-product-'. $prod->get_id_producto()); ?>" class='btn-delete'>
                                    Eliminar
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo SITE_URL . 'admin?action=mod-product&modify-product=' . $prod->get_id_producto();?>&hash=<?php echo generate_hash('modify-product-'. $prod->get_id_producto()); ?>" class='btn-mod'>
                                    Modificar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>      
                </table>
            </div>
        <?php else : ?>
            <h3 class='tit-acount'>Lo siento, aún no tienes productos en esta carta</h3>
            <div class = 'cont-input'>
                <a href="<?php echo SITE_URL . 'admin?action=new-carta'; ?>"  class='btn-form'>Ingresar productos para la carta</a>
            </div>
        <?php endif; ?>
    <?php endif;?>
           
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>