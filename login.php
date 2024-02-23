<?php require('init.php'); ?>
<?php
$error = false;
$error_reg = false;
$error_mail = false;

$name_user = '';
$dir_user = '';
$tel_user = '';
$mail_user = '';
$pass_user = '';
$t_user = T_USER;

if(isset($_POST['submit-login'])){

    if( ! check_hash('login', $_POST['hash'])){
        die('Me estas hackeando?');
    }

    if( !login( $_POST['username'], $_POST['mail_user'], $_POST['password'] ) ){
        $error = true;   
    }

} elseif (isset($_POST['submit-registro'])){

    $name_user = filter_input( INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $dir_user = filter_input( INPUT_POST, 'dir_user', FILTER_SANITIZE_STRING);
    $tel_user = filter_input( INPUT_POST, 'tel_user', FILTER_SANITIZE_NUMBER_INT);
    $mail_user = filter_input( INPUT_POST, 'mail_user', FILTER_SANITIZE_EMAIL);
    $pass_user = filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING);

    if( empty( $name_user ) || empty( $dir_user ) || empty( $tel_user ) || empty( $mail_user ) || empty( $pass_user )){
        $error_reg = true;
    }else{

        $verify_mail = verify_mail($mail_user);
        
        if ($verify_mail){
            $error_mail = true;
            
        }else{
            insert_user( $name_user, $dir_user, $tel_user, $mail_user, $pass_user, $t_user );
            login( $name_user, $mail_user, $pass_user );
           
        }
    }
}

if( is_logged_in() ){
    redirect_to('index.php');
}

?>

<?php require 'template/header.php'; ?>
<div class='header-rest'></div>
<main class='content'>
    
    <!-------------------- FORMULARIO DE INICIO DE SESION Y REGISTRO ------------------------------>
    <div class='login'>

        <!-------------------------------- INICIO DE SESION -------------------------------------->
        <div class='registrate'>
            <form action='' method='post'>
                <div class="tema-color-fuente">
                    <label for="username">Usuario</label>
                    <input type="text" name='username' id='username' autocomplete='off' class='form-control back-select' placeholder='Nombre' value='<?php echo htmlspecialchars($name_user, ENT_QUOTES); ?>'>
                </div>
                <div class="tema-color-fuente">
                    <label for="mail_user">Email</label>
                    <input type="email" name='mail_user' id='mail_user' autocomplete='off' class='form-control back-select' placeholder='ejemplo@email.com' value='<?php echo htmlspecialchars($mail_user, ENT_QUOTES); ?>'>
                </div>
                <div class="tema-color-fuente">
                    <label for="password">Contaseña</label>
                    <input type="password" name='password' id='password' autocomplete='off' class='form-control back-select'>
                    <input type="hidden" name='hash' value='<?php echo htmlspecialchars(generate_hash("login"), ENT_QUOTES);?>'>
                </div>
                <div class = 'cont-input'>
                    <input type="submit" name='submit-login' value='Iniciar Sesión' class='btn-form'>
                </div>
                </form>
            <?php if($error): ?>
                <p class="errorUsuario">* Error de usuario y/o contraseña</p>
            <?php endif; ?>
        </div>
        <!-------------------- fin formulario de inicio de sesión ---------------------------------->
        
        <!-------------------------------   REGISTRAR NUEVO CLIENTE  ------------------------------------>
        <div class="registrate">
            <form action='' method='post'>
               
                <div class=" tema-color-fuente">
                    <label for="name_user">Nombre de Usuario</label>
                    <input id="name_user" name="name_user" type="text" autocomplete="off"
                        placeholder="" class="form-control back-select" value='<?php echo htmlspecialchars($name_user, ENT_QUOTES) ?>'>
                </div>

                <div class=" tema-color-fuente">
                    <label for="dir_user">Dirección</label>
                    <input id="dir_user" name="dir_user" type="text" autocomplete="off" class="form-control back-select" value="<?php echo htmlspecialchars($dir_user, ENT_QUOTES) ?>">
                </div>

                <div class=" tema-color-fuente">
                    <label for="tel_user">Teléfono</label>
                    <input id="tel_user" name="tel_user" type="tel" autocomplete="off" maxlength='9' minlength='9' class="form-control back-select" pattern="[0-9]{9}" value="<?php echo htmlspecialchars($tel_user, ENT_QUOTES) ?>">
                </div>

                <div class=" tema-color-fuente">
                    <label for="mail_user">Correo electrónico</label>
                    <input id="mail_user" name="mail_user" type="email" autocomplete="off" placeholder="ejemplo@email.com" class="form-control back-select" value="<?php echo htmlspecialchars($mail_user, ENT_QUOTES) ?>">
                </div>

                <div class=" tema-color-fuente">
                    <label for="password_user">Contraseña</label>
                    <input id="password_user" name="password_user" type="password" autocomplete="off" class="form-control back-select">
                </div>

                <div class="text-registro">
                    Al hacer clic en Regístrate, aceptas los <a href="" target="_blank" class="tema-color-fuente"> Términos de uso</a>, que incluyen la cláusula compromisoria, y reconoces <a href="" target="_blank"  class="tema-color-fuente"> la Política de privacidad</a>.
                </div>
                <div class = 'cont-input'>
                    <input type="submit" name="submit-registro" class="btn-form" value="Registrate">
                </div>
                <?php if($error_reg): ?>
                    <p class="errorUsuario">* Error. Rellene todos los campos.</p>
                <?php endif; ?>
                <?php if($error_mail): ?>
                    <p class="errorUsuario">* Error. Hay un usuario registrado con este correo.</p>
                <?php endif; ?>
            </form>
            <!----------------------------- fin de formulario nuevo registro ---------------------------->

        </div>
    </div>
    <!------------------------------fin de formularios registro e inicio de sesion--------------------------->
    
</main>
<?php  require('template/footer.php'); ?>

