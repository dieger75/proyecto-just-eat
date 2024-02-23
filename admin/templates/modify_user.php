<?php require __DIR__ . '/../../template/header.php';?>
<div class='header-admin'></div>
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>MODIFICAR USUARIO</h2>
        </div>
    </div>

    <?php  if($error):?>
        <div class="error">Error en el formulario</div>
    <?php  endif; ?>

    <form action="" method="post" class ='form-new-rest'>
        <div class='cont-new-rest'>
            <input type="hidden" name="id_user" id="id_user" value="<?php echo htmlspecialchars($user_obj->get_id_user(), ENT_QUOTES); ?>">
            <div class='tema-color-fuente'>
                <label for="name_user">Nombre de Usuario:</label>
                <input type="text" name="name_user" id="name_user" value="<?php echo htmlspecialchars($user_obj->get_name_user(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="dir_user">Dirección:</label>
                <input type="text" name="dir_user" id="dir_user" value="<?php echo htmlspecialchars($user_obj->get_dir_user(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="tel_user">Teléfono:</label>
                <input type="tel" name="tel_user" id="tel_user" maxlength='9' minlength='9' pattern="[0-9]{9}" value="<?php echo htmlspecialchars($user_obj->get_tel_user(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
        </div>

        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="mail_user">Email:</label>
                <input type="email" name="mail_user" id="mail_user" value="<?php echo htmlspecialchars($user_obj->get_mail_user(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="password_user">Password</label>
                <input type="password" name="password_user" id="password_user" value="<?php echo htmlspecialchars($user_obj->get_pass_user(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <label>Tipo de usuario:</label>
            <div class='tema-color-fuente form-control back-select'>
                <select name="type_user" class='select-option'>
                    <option value="<?php echo htmlspecialchars($user_obj->get_type_user(), ENT_QUOTES); ?>"><?php echo htmlspecialchars($user_obj->get_type_user(), ENT_QUOTES); ?></option>
                    <option value="admin">admin</option>
                    <option value="public">public</option>               
                </select>
            </div>

            <div class = 'cont-input'>
                <input type="submit" name="submit-mod-user" value="Actualizar" class='btn-form'>
            </div>

        </div>
    </form>
 
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>