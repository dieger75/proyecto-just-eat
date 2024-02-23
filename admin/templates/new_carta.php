<?php require __DIR__ . '/../../template/header.php';?>

<div class='header-admin'></div>
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>NUEVO PRODUCTO DE CARTA</h2>
        </div>
    </div>
    
    <form action="" method="post" class = 'form-new-rest' enctype='multipart/form-data'>
        <div class='cont-new-rest'>
            <label>Seleccione restaurante <span> *</span></label>
            <div class='tema-color-fuente form-control back-select'>
                <select class='select-option' name='rest_id'>
                    <option value="">Seleccione una opción</option>
                    <?php
                        foreach( $all_rest as $rest ): ?>
                            <option value="<?php echo $rest->get_id_rest(); ?>"><?php echo $rest->get_name_rest(); ?></option>
                        <?php endforeach; ?>
                </select>
            </div>      

            <div class='tema-color-fuente'>
                <label for="producto">Nombre del plato <span> *</span></label>
                <input type="text" name="producto" id="producto" value="<?php echo htmlspecialchars($producto, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <label>Descripcion del plato <span> *</span></label>
            <div class='tema-color-fuente'>
                <textarea name="descripcion" rows="3" cols="30" maxlength="400" class='form-control back-select text-area'><?php echo htmlspecialchars($descripcion, ENT_QUOTES);?></textarea>
            </div>
        </div>
        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="precio">Precio del plato <span> *</span></label>
                <input type="text" name="precio" id="precio" value="<?php echo htmlspecialchars(
                $precio, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="">Foto de la comida:</label>
                <p><label>Formatos: jpg, jpeg, png / dimensión: 165x165 pixeles</label></p>
                <p><label>Tamaño: max. 100Kb / resolución: 72dpi</label></p>
                <label for="img_product" class='btn-form'>Examinar imagen</label>
                <input type="file" name="img_product" id="img_product" value="<?php echo htmlspecialchars($img_product, ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='cont-input'>
                <input type="submit" name="submit-new-carta" value="Crear" class ='btn-form'>
            </div>
            <?php  if($error):?>
                <p class="errorUsuario">* Error en el formulario. Rellene los campos obligatorios</p>
            <?php  endif;?>
            <?php  if($mensaje):?>
                <p class="errorUsuario">* Error. La imagen ya exite o no cumple los requisitos.</p>
            <?php  endif; ?>
        </div>
    </form>
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>