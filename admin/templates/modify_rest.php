<?php require __DIR__ . '/../../template/header.php';?>
<div class='header-admin'></div>
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>MODIFICAR RESTAURANTE</h2>
            <?php if(isset($_GET['exito-delete'])):?>
                <p class="errorUsuario">* El elemento ha sido eliminado correctamente</p>
            <?php endif; ?>
            <?php if(isset($_GET['exito'])):?>
                <p class="errorUsuario">* El elemento ha sido modificado correctamente</p>
            <?php endif; ?>
        </div>
    </div> 
    
    <form action="" method="post" class = 'form-new-rest' enctype='multipart/form-data'>
        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="name_rest">Nombre del restaurante:</label>
                <input type="text" name="name_rest" id="name_rest" value="<?php echo htmlspecialchars($found->get_name_rest(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
            
            <div class='tema-color-fuente'>
                <label for="dir_rest">Dirección:</label>
                <input type="text" name="dir_rest" id="dir_rest" value="<?php echo htmlspecialchars($found->get_dir_rest(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
            <div class='tema-color-fuente'>
                <label for="tel_rest">Teléfono:</label>
                <input type="tel" name="tel_rest" id="tel_rest" value="<?php echo htmlspecialchars($found->get_tel_rest(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
            <div class='tema-color-fuente'>
                <label for="mail_rest">Email:</label>
                <input type="email" name="mail_rest" id="mail_rest" value="<?php echo htmlspecialchars($found->get_mail_rest(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
        
            <div class='tema-color-fuente'>
                <label for="web_rest">Página web:</label>
                <input type="url" name="web_rest" id="web_rest" value="<?php echo htmlspecialchars($found->get_web_rest(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>
        </div>

        <div class='cont-new-rest'>
            <label>Elige una especialidad:</label>
            <div class='tema-color-fuente form-control back-select'>
                <select name="type_eat" class='select-option'>
                    <option value="<?php echo htmlspecialchars($found->get_type_eat(), ENT_QUOTES); ?>"><?php echo htmlspecialchars($found->get_type_eat(), ENT_QUOTES); ?></option>
                    <option value="">Elige una especialidad:</option>
                    <option value="fast-food">Fast-food</option>
                    <option value="americana">Americana</option>
                    <option value="italiana">Italiana</option>
                    <option value="asiatica">Asiática</option>
                    <option value="india">India</option>
                    <option value="mediterranea">Mediterránea</option>
                    <option value="peruana">Peruana</option>
                </select>
            </div>

            <div class='tema-color-fuente'>
                <label for="logo_rest">Logo del restaurante: <?php echo $found->get_logo_rest(); ?></label>
                <p><img src="<?php echo SITE_URL_REST . $found->get_logo_rest(); ?>" alt="" srcset=""></p>
                <p><label>Formatos: jpg, jpeg, png / dimensión: 165x165 pixeles</label></p>
                <p><label>Tamaño: max. 100Kb / resolución: 72dpi</label></p>
                <label for="logo_rest" class='btn-form'>Examinar imagen</label>
                <input type="file" name="logo_rest" id="logo_rest" value="">
            </div>

            <?php  if($mensaje):?>
                <p class="errorUsuario">* Error. El archivo ya exite o no cumple los requisitos.</p>
            <?php  endif; ?>

            <div class = 'cont-input'>
                <input type="submit" name="submit-mod-rest" value="Actualizar" class='btn-form'>
            </div>
        </div>
    </form>
    
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>