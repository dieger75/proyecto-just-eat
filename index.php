<?php require('init.php'); ?>

<?php

/*if( !is_logged_in() ){  
    redirect_to('login.php');
}*/

//-------------------recojo todos los post ----------------------------//
$all_rest = get_all_rest();
$prod_found = false;
$_SESSION['carrito'] = [];
$_SESSION['totales'] = [];
$_SESSION['web-rest'] = '';

//-------------------COMPROBANDO SI EXISTE REST---------------//
if(isset($_GET['view'])){
    $all_rest = get_type_rest($_GET['view']);

    if(is_numeric($_GET['view'])){

        $id_rest = $_GET['view'];
        //-------------  redirige a la pag de get-rest.php con el id de rest   -------------------- //
        $rest_found = 'rest-found.php?get-rest='. $id_rest;
        redirect_to($rest_found);
    }

}

?>

<?php require 'template/header.php';?>

<!----------      SI $prod_found ESTA VACIO MUESTRAME LA PORTADA, SI NO CABEZA DE RESTAURANTE     ------------->
<div class='portada'>
    <div class='cont-tit animacion'>
        <h1 class='tit-portada'>Te llevamos el plato a la mesa</h1>
    </div>
    <p id='ancla-main'>Pide comida a domicilio aún más rápido</p>
</div>
<?php require 'slider-eat.php';?>
<!------------      fin de elecccion de cabeza de página    ----------------------------------------> 

<main class='content'>
    <!---------------------------   MUESTRA LISTA DE RESTAURANTES   ----------------------------->
    <div class='restaurantes'>
        <?php foreach ($all_rest as $rest) : ?>
            <div class="cont-rest cont-tit">
                <a href='?view=<?php echo $rest->get_id_rest(); ?>'>
                    <header class='info-rest'>  
                        <img src='<?php echo SITE_URL_REST . $rest->get_logo_rest(); ?>'>
                        <h3 class='tit-rest'><?php echo $rest->get_name_rest(); ?></h3>
                    </header>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-------------------------     fin de lista de restaurantes    ------------------------------->

</main>

<?php require('template/footer.php'); ?>