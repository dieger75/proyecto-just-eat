<?php require __DIR__ . '/../../template/header.php';?>

<div class='header-admin'></div>      
    
<main class=content>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>NUEVO USUARIO</h2>
        </div>
    </div>
    
    <form action="" method="post" class = 'form-new-rest'>

        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="name_user">Nombre de Usuario <span> *</span></label>
                <input type="text" name="name_user" id="name_user" value="<?php echo htmlspecialchars($name_user, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>    
                <label for="dir_user">Dirección <span> *</span></label>
                <input type="text" name="dir_user" id="dir_user" value="<?php echo htmlspecialchars($dir_user, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="tel_user">Teléfono <span> *</span></label>
                <input type="tel" name="tel_user" id="tel_user" maxlength='9' minlength='9' pattern="[0-9]{9}" value="<?php echo htmlspecialchars($tel_user, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="mail_user">Email <span> *</span></label>
                <input type="email" name="mail_user" id="mail_user" value="<?php echo htmlspecialchars($mail_user, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
        </div>
        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="password_user">Password <span> *</span></label>
                <input type="password" name="password_user" id="password_user" value="<?php echo htmlspecialchars($password_user, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <label>Tipo de usuario <span> *</span></label>  
            <div class='tema-color-fuente form-control back-select'>
                <select name="type_user" class='select-option'>
                    <option value="">Seleccione una opción</option>
                    <option value="admin">Administrador(a)</option>
                    <option value="public">Público</option>               
                </select>
            </div>

            <div class = 'cont-input'>
                <input type="submit" name="submit-new-user" value="Crear" class='btn-form'>
            </div>
            <?php  if($error):?>
                <p class="errorUsuario">* Error en el formulario. Rellene todos los campos</p>
            <?php  endif; ?>
        </div>
    </form>
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>