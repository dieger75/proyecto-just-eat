<?php require __DIR__ . '/../../template/header.php';?>
<div class='header-admin'></div>

<main class=content>

    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>LISTA DE USUARIOS</h2>
            
            <?php if(isset($_GET['exito-delete'])):?>
                <p class = 'errorUsuario'>* El usuario ha sido eliminado correctamente</p>
            <?php endif; ?>

            <?php if(isset($_GET['exito'])):?>
                <p class = 'errorUsuario'>* El usuario ha sido modificado correctamente</p>
            <?php endif; ?>
        </div>
    </div> 
    <div class='cont-list-user'>
        <table>
            <tr>
                <td class='center-tit'>Nombre</td>
                <td class='center-tit'>Dirección</td>
                <td class='center-tit'>Teléfono</td>
                <td class='center-tit'>Email</td>
                <td class='center-tit'>Password</td>
                <td class='center-tit'>Tipo</td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ( $all_users as $user): ?>
                <tr>
                    <td class='td-name'><?php echo $user->get_name_user(); ?></td>
                    <td class=''><?php echo $user->get_dir_user(); ?></td>
                    <td><?php echo $user->get_tel_user(); ?></td>
                    <td><?php echo $user->get_mail_user(); ?></td>
                    <td><?php echo $user->get_pass_user(); ?></td>
                    <td><?php echo $user->get_type_user(); ?></td>
                    <td>
                        <a href="<?php echo SITE_URL . 'admin?action=list-user&delete-user=' . $user->get_id_user();?>&hash=<?php echo generate_hash('delete-user-'. $user->get_id_user()); ?>" class='btn-delete'>
                            Eliminar
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo SITE_URL . 'admin?action=mod-user&modify-user=' . $user->get_id_user();?>&hash=<?php echo generate_hash('modify-user-'. $user->get_id_user()); ?>" class='btn-mod'>
                        Modificar
                    </a>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>