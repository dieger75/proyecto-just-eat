<!DOCTYPE html>
<html lang="en">
<head>
    
    <link  rel = "icon"  type ="image / svg"  sizes = "40x40"  href = "<?php echo SITE_URL; ?>assets/img/favicons/favicon-svg.svg" > 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECYO JUST EAT</title>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css">
</head>
<body>
    <header class='cabecera'>
        <nav class='navegador'>
            <div class='nav-int'>
                <a href='<?php echo SITE_URL; ?>index.php' class='nav-int'>
                    <img src='<?php echo SITE_URL; ?>assets/img/LOGO-VOY1.png'>
                    <!--<img src='<?php //echo SITE_URL; ?>assets/img/betty.png'>-->
                </a>
            </div>
            <?php if( !is_logged_in()): ?>                
                <div class='nav-int'>
                    <a href='<?php echo SITE_URL; ?>login.php' class='btn-gral btn-cabecera'>Empezar</a>
                </div>
            <?php endif; ?>
            <ul class='nav-int'>
                <?php if( is_logged_in() == 'admin' ): ?>    
                    <li><a href='<?php echo SITE_URL; ?>admin'>Administración</a></li>
                    <li><a href='<?php echo SITE_URL; ?>?logout=true'><i class="fas fa-power-off"></i></a></li>
                <?php elseif( is_logged_in() == 'public'): ?>
                    <li class='account'>
                        <i class="fas fa-user"></i>
                        <span>Hola,  <?php echo $_SESSION['user']['name_user'];?></span>
                        <ul>
                            <li class='hidden'></li>
                            <div class='shadow-li-account'>
                                <li>
                                    <div class='triangulo'></div>
                                    <div class='li-account border-li-acount'>
                                        <a href='<?php echo SITE_URL; ?>account/info.php'>Información de la cuenta</a>
                                    </div>
                                </li>
                                <li>
                                    <div class='li-account'><a href='<?php echo SITE_URL; ?>account/order-history.php'>Pedidos</a></div>
                                </li>
                            </div>
                        </ul>
                    </li>
                    
                    <li><a href='<?php echo SITE_URL; ?>?logout=true'><i class="fas fa-power-off"></i></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>