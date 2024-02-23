<?php require __DIR__ . '/../../template/header.php'; ?>
<div class='header-admin'></div>
<main class="content">
    <div class = 'cont-admin'>
        <div class='cont-tit tit-nav-admin'>
            <h2 class='tit-rest'><i class="fas fa-user-cog"></i> • ADMINISTRADOR</h2>
        </div>
    </div>
    <ul class='menu-admin-main'>
        <div class='menu-admin box-menu-admin'><a href="?action=list-rest"><li>Lista de restaurantes</li></a></div>
        <div class='menu-admin box-menu-admin'><a href="?action=new-rest"><li>Nuevo restaurante</li></a></div>
        <div class='menu-admin box-menu-admin'><a href="?action=list-carta"><li>Lista de cartas</li></a></div>
        <div class='menu-admin box-menu-admin'><a href="?action=new-carta"><li>Nuevo producto de carta</li></a></div>
        <div class='menu-admin box-menu-admin'><a href="?action=list-user"><li>Lista de usuarios</li></a></div>
        <div class='menu-admin box-menu-admin'><a href="?action=new-user"><li>Nuevo usuario</li></a></div>
    </ul>
        
</main>
<?php require __DIR__ . '/../../template/footer.php'; ?>