<?php
    require '../init.php';
    require '../template/header.php';


    $id_user = $_SESSION['user']['id_user'];
    $user_obj = user_found($id_user);

    if( isset($_POST['submit-mod-user']) ){

        $id_user = $user_obj->get_id_user();
        $type_user = 'public';
        
        $id_user = filter_input( INPUT_POST, 'id_user', FILTER_SANITIZE_NUMBER_INT);
        $name_user = filter_input( INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
        $dir_user = filter_input( INPUT_POST, 'dir_user', FILTER_SANITIZE_STRING);
        $tel_user = filter_input( INPUT_POST, 'tel_user', FILTER_SANITIZE_NUMBER_INT);
        $mail_user = filter_input( INPUT_POST, 'mail_user', FILTER_SANITIZE_STRING);
        $password_user = filter_input( INPUT_POST, 'password_user', FILTER_SANITIZE_STRING);
        $type_user = filter_input( INPUT_POST, 'type_user', FILTER_SANITIZE_STRING);


        modify_user( $id_user, $name_user, $dir_user, $tel_user, $password_user, $mail_user, $type_user );
        redirect_to('admin?action=list-user&exito=true');
    }

?>

<div class='header-account'></div>
<main class='content'>
<div class="content-menu-rest">

    <div class="registrate no-shadow">
        <ul>
            <div class=''>
                <li>
                    <div class='li-account' style='font-weight: 700'>
                        <a href='<?php echo SITE_URL; ?>account/info.php'>Información de la cuenta</a>
                    </div>
                </li>
                <li>
                    <div class='li-account'><a href='<?php echo SITE_URL; ?>account/order-history.php'>Pedidos</a></div>
                </li>
            </div>
        </ul>
    </div>
    
    <div class="registrate no-shadow">
        <h3 class='tit-acount'>CUENTA</h3>
        
        <form action="" method="post">

            <div class=" tema-color-fuente">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo htmlspecialchars($user_obj->get_id_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class=" tema-color-fuente">
                <label for="name_user">Nombre de Usuario:</label>
                <input type="text" name="name_user" id="name_user" value="<?php echo htmlspecialchars($user_obj->get_name_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class=" tema-color-fuente">
                <label for="dir_user">Dirección:</label>
                <input type="text" name="dir_user" id="dir_user" value="<?php echo htmlspecialchars($user_obj->get_dir_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class=" tema-color-fuente">
                <label for="tel_user">Teléfono:</label>
                <input type="tel" name="tel_user" id="tel_user" maxlength='9' minlength='9' pattern="[0-9]{9}" value="<?php echo htmlspecialchars($user_obj->get_tel_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class=" tema-color-fuente">
                <label for="mail_user">Email:</label>
                <input type="email" name="mail_user" id="mail_user" value="<?php echo htmlspecialchars($user_obj->get_mail_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class=" tema-color-fuente">
                <label for="password_user">Password</label>
                <input type="password" name="password_user" id="password_user" value="<?php echo htmlspecialchars($user_obj->get_pass_user(), ENT_QUOTES); ?>" class="form-control back-select">
            </div>

            <div class = 'cont-input'>
                    <input type="submit" name="submit-mod-user" value="Actualizar" class="btn-form">
            </div>

        </form>
    </div>

</div>

</main>
<?php require '../template/footer.php'; ?>