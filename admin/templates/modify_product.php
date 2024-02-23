<?php require __DIR__ . '/../../template/header.php';?>

<div class='header-admin'></div>
<main class='content'>
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'>MODIFICAR PRODUCTO DE CARTA</h2>
        </div>
    </div>

    <h2 class='tit-rest'>Restaurante : <?php echo $prod->get_name_rest(); ?></h2>
     
    <form action="" method="post" class ='form-new-rest' enctype='multipart/form-data'>
        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo htmlspecialchars($prod->get_id_producto(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <div class='tema-color-fuente'>
                <label for="producto">Nombre del plato</label>
                <input type="text" name="producto" id="producto" value="<?php echo htmlspecialchars($prod->get_producto(), ENT_QUOTES); ?>" class='form-control back-select'>
            </div>

            <label>Descripcion del plato</label>
            <div class='tema-color-fuente'>
                <textarea name="descripcion" rows="3" cols="30" maxlength="400" class='form-control back-select text-area'><?php echo htmlspecialchars($prod->get_descripcion(), ENT_QUOTES);?></textarea>
            </div>
        
            <div class='tema-color-fuente' style='width: 30%;'>
                <label for="precio">Precio del plato (€)</label>
                <input type="text" name="precio" id="precio" value="<?php echo htmlspecialchars($prod->get_precio(), ENT_QUOTES); ?>" class='form-control back-select' style='text-align: right'>
            </div>
        </div>

        <div class='cont-new-rest'>
            <div class='tema-color-fuente'>
                <label for="">Imagen de la comida: <?php echo $prod->get_producto(); ?></label>
                <p><img src="<?php echo SITE_URL_PLATOS . $prod->get_img_product(); ?>" alt="" srcset="" ></p>
                <p><label>Formatos: jpg, jpeg, png / dimensión: 165x165 pixeles</label></p>
                <p><label>Tamaño: max. 100Kb / resolución: 72dpi</label></p>
                <label for="img_product" class='btn-form'>Examinar imagen</label>
                <input type="file" name="img_product" id="img_product" value="">
            </div>

            <?php  if($mensaje):?>
                <p class="errorUsuario">* Error. El archivo ya exite o no cumple los requisitos.</p>
            <?php  endif; ?>

            <div class = 'cont-input'>
                <input type="submit" name="submit-mod-product" value="Actualizar" class='btn-form'>
            </div>
        </div>
    </form>
</main>

<?php require __DIR__ . '/../../template/footer.php'; ?>