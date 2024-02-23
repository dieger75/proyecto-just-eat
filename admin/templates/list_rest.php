<?php require __DIR__ . '/../../template/header.php';?>
<div class='header-admin'></div>  

<main class='content'>
    
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>LISTADO DE RESTAURANTES</h2>
            <?php if(isset($_GET['exito-delete'])):?>
                <p class="errorUsuario">* El elemento ha sido eliminado correctamente</p>
            <?php endif; ?>
        </div>
    </div> 
    <div>
        <?php if ( !$all_rest) : ?>
            <div class='cont-list-rest'>
                <p class='errorUsuario'>* Lo siento, aún no hay restaurantes registrados</p>
            </div>
            
        <?php endif; ?>
        <table>
            <tr>
                <td class='center-tit'>Nombre</td>
                <td class='center-tit'>Dirección</td>
                <td class='center-tit'>Teléfono</td>
                <td class='center-tit'>Email</td>
                <td class='center-tit'>Página Web</td>
                <td class='center-tit'>Logotipo</td>
                <td class='center-tit'>Tipo de cocina</td>
                <td class='center-tit'></td>
                <td class='center-tit'></td>
            </tr>
            <?php if ( $all_rest) : ?>
                <?php foreach ( $all_rest as $rest): ?>
                    <tr>
                        <td><?php echo $rest->get_name_rest(); ?></td>
                        <td><?php echo $rest->get_dir_rest(); ?></td>
                        <td><?php echo $rest->get_tel_rest(); ?></td>
                        <td><?php echo $rest->get_mail_rest(); ?></td>
                        <td><?php echo $rest->get_web_rest(); ?></td>
                        <td><?php echo $rest->get_logo_rest(); ?></td>
                        <td><?php echo $rest->get_type_eat(); ?></td>
                        <td>
                            <a href="<?php echo SITE_URL . 'admin?action=list-rest&delete-rest=' . $rest->get_id_rest();?>&hash=<?php echo generate_hash('delete-rest-'. $rest->get_id_rest()); ?>" class='btn-delete'>
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo SITE_URL . 'admin?action=mod-rest&modify-rest=' . $rest->get_id_rest();?>&hash=<?php echo generate_hash('modify-rest-'. $rest->get_id_rest()); ?>" class='btn-mod'>
                                Modificar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>