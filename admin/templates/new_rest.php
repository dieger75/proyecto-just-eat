<?php require __DIR__ . '/../../template/header.php';?>
<div class='header-admin'></div>       
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>NUEVO RESTAURANTE</h2>
        </div>
    </div>
    
    <form action="" method="post" class = 'form-new-rest' enctype='multipart/form-data'>
        
        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="name_rest">Nombre del restaurante <span> *</span></label>
                <input type="text" name="name_rest" id="name_rest" value="<?php echo htmlspecialchars($name_rest, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
            
            <div class='tema-color-fuente'>
                <label for="dir_rest">Dirección <span> *</span></label>
                <input type="text" name="dir_rest" id="dir_rest" value="<?php echo htmlspecialchars($dir_rest, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="tel_rest">Teléfono <span> *</span></label>
                <input type="tel" name="tel_rest" id="tel_rest" maxlength='9' minlength='9' value="<?php echo htmlspecialchars($tel_rest, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
            <div class='tema-color-fuente'>
                <label for="mail_rest">Email <span> *</span></label>
                <input type="email" name="mail_rest" id="mail_rest" value="<?php echo htmlspecialchars($mail_rest, ENT_QUOTES); ?>" placeholder = "ejemplo@email.com" class='form-control back-select'>
            </div>
        </div>

        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="web_rest">Página web:</label>
                <input type="url" name="web_rest" id="web_rest" value="<?php echo htmlspecialchars($web_rest, ENT_QUOTES); ?>"  placeholder = "http://www.pagina.web" class='form-control back-select'>
            </div>

            <label for="">Especialidad de cocina <span> *</span></label>
            <div class='tema-color-fuente form-control back-select'>
                <select name="type_eat" class='select-option'>
                    <option value="">Elige una especialidad:</option>
                    <option value="fast-food">Fast-food</option>
                    <option value="americana">Americana</option>
                    <option value="italiana">Italiana</option>
                    <option value="asiatica">Asiática</option>
                    <option value="india">India</option>
                    <option value="mediterranea">Mediterránea</option>
                    <option value="latinoamericana">Latinoamericana</option>
                </select>
            </div>

            <div class='tema-color-fuente'>
                <label for="">Logo del restaurante: </label>
                <p><label>Formatos: jpg, jpeg, png / dimensión: 165x165 pixeles</label></p>
                <p><label>Tamaño: max. 100Kb / resolución: 72dpi</label></p>
                <label for="logo_rest" class='btn-form'>Examinar imagen</label>
                <input type="file" name="logo_rest" id="logo_rest" value="<?php echo htmlspecialchars($logo_rest, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class = 'cont-input'>
                <input type="submit" name="submit-new-rest" value="Crear" class='btn-form'>
            </div>

            <?php  if($error):?>
                <p class="errorUsuario">* Error en el formulario. Rellene los campos obligatorios.</p>
            <?php  endif; ?>
            <?php  if($mensaje):?>
                <p class="errorUsuario">* Error. El archivo ya exite o no cumple los requisitos.</p>
            <?php  endif; ?>
        </div>
    </form>
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>