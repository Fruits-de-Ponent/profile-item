<?php
    session_start();
    if(empty($_SESSION["nombre"])) {
        header('Location:  ../../vacaciones/index.html');
    }
    include('./componentes/panel-lateral.php');
    include('./componentes/alertas.php');
    include('./componentes/iconos.php');
    include('./componentes/salir.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/scrollbar.css" rel="stylesheet">
    <link href="./assets/css/prueba.css" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar color text-light sticky-top border-bottom border-light shadow-sm-sm" id="navegador">
        <div class="container-fluid">
            <div>
                <a type="button" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#panel-lateral">
                    <?php generarIconPanelLateral(); ?>
                </a>
                
                <img width="30" class="img-fluid my-1" id="imagen-perfil" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['img']);?> "/>
                <small id="bienvenido">Bienvenido, <?php echo $_SESSION["nombre"]; ?></small>
            </div>
            <div>
                <a type="button"
                   data-bs-toggle="modal" 
                   data-bs-target="#salir">
                   <?php generarIconLogOut(); ?>
                </a>
            </div>
        </div>
    </nav>
    <!-- PANEL DE CONTROL -->
    <div class="container-fluid mt-3" id="panel-de-control">
        <h5 class="mx-1 text-color"><b><?php generarIconPanel(); ?>PANEL DE CONTROL</b></h5>
        <div class="row">
            <div class="col d-grid gap-2">
                <button 
                    class="btn btn-color shadow-sm" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#colapsar-datos" 
                    aria-expanded="true" 
                    aria-controls="colapsar-datos">
                    <?php generarIconDatos(); ?>
                    DATOS
                </button>
            </div>
            <div class="col d-grid gap-2">
                <button 
                    class="btn btn-color shadow-sm" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#colapsar-app" 
                    aria-expanded="false" 
                    aria-controls="colapsar-app">
                    <?php generarIconApp(); ?>
                    APP's
                </button>
            </div>
            <div class="col d-grid gap-2">
                <button 
                    class="btn btn-color shadow-sm align-self-center" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#colapsar-config" 
                    aria-expanded="false" 
                    aria-controls="colapsar-config">
                    <?php generarIconEngranaje();?>
                    CONFIGURACIÓN
                </button>
            </div>
        </div>
    </div>

    <!-- DATOS -->
    <div class="collapse" id="colapsar-datos">
        <div class="container-fluid mt-3">
        <hr>
            <h5 class="mx-1 text-color"><b><?php generarIconData(); ?>DATOS</b></h5>
            <div class="row mx-1 rounded color text-light py-2 pt-3 justify-content-center text-center shadow-sm">
                <div class="col border-end border-light">
                    <h5><b>Usuario</b></h5>
                    <h5><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"];?></h5>
                </div>
                <div class="col border-start border-end border-light">
                    <h5><b>Correo</b></h5>
                    <h5><?php echo $_SESSION['email'];?></h5>
                </div>
                <div class="col border-start border-end border-light">
                    <h5><b>Departamento</b></h5>
                    <h5><?php echo $_SESSION['departamento'];?></h5>
                </div>
                <div class="col border-start border-light">
                    <h5><b>Responsable</b></h5>
                    <h5><?php echo $_SESSION['responsable'];?></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- APP's -->
    <div class="collapse" id="colapsar-app">
        <div class="container-fluid mt-3">
            <hr>
            <h5 class="mx-1 text-color"><b><?php generarIconCaja();?>APP's</b></h5>
            <div class="row">
                <div class="col d-grid">
                    <a class="btn btn-color shadow-sm" href="../../vacaciones/mostrar-vacaciones.php"><?php generarIconVacaciones();?>VACACIONES</a>
                </div>
                <?php if($_SESSION["Trabajador"]=='48251235H' ||$_SESSION["Trabajador"]=='43718221M'||$_SESSION["Trabajador"]=='47683324T'||$_SESSION["Trabajador"]=='25452518M') {?>
                <div class="col d-grid">
                    <a class="btn btn-color shadow-sm" href="../../formacion/index.php"><?php generarIconFormaciones();?>FORMACIONES</a>
                </div>
                <div class="col d-grid">
                    <div class="btn-group">
                        <button type="button" class="btn btn-color shadow-sm"><?php generarIconTrabajadores();?>TRABAJADORES</button>
                        <button 
                            type="button" 
                            class="btn-flecha shadow-sm"
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            ▼
                        </button>
                        <ul class="dropdown-menu border-color">
                            <li><a class="dropdown-item" href="./cargarTrabajadores.php">Actualizar trabajadores</a></li>
                            <li><a class="dropdown-item" href="../../vacaciones/alta_trabajador.php">Dar de alta un trabajador</a></li>
                            <li><a class="dropdown-item" href="../../formacion/listado_trabajadores.php">Dar de baja un trabajador</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

    <!-- CONFIGURACIÓN -->
    <div class="collapse" id="colapsar-config">
        <div class="container-fluid my-3">
            <hr>
            <h5 class="text-color mb-3"><b><?php generarIconLlave();?>CONFIGURACIÓN</b></h5>
            <div class="row">
                <h6 class="text-color"><?php generarIconPass();?>Cambiar contraseña</h6>
                <div class="col d-grid gap-2">
                    <form class="input-group mb-3" id="cambiarPassForm" action="./cambiar-password.php" method="POST">
                        <div class="input-group mb-2">
                            <input type="password" name="passwordOne" id="passwordOne" class="form-control" minlength="4" maxlength="50" placeholder="Introduce la nueva contraseña" required>
                        </div>
                        <input type="password" name="passwordTwo" id="passwordTwo" class="form-control" minlength="4" maxlength="50" placeholder="Vuelve a introducir la nueva contraseña" required>
                        <button class="btn btn-color" type="submit" id="cambiarPassSubmit">Cambiar contraseña</button>
                    </form>
                </div>
            </div>
            <div class="row mt-1">
                <h6 class="text-color"><?php generarIconFoto();?>Cambiar imagen del perfil</h6>
                <div class="col d-grid gap-2">
                    <form class="input-group" id="cambiarImagenForm" action="cambiar-imagen.php" enctype="multipart/form-data" method="POST">
                        <input type="file" id="archivoImg" name="img" class="form-control">
                        <button class="btn btn-color" type="button" id="cambiarImagenSubmit">Cambiar imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php generarPopSalir(); ?>
<?php generarPanelLateral($_SESSION['Trabajador']); ?>
<?php generarAlerta(); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./scripts/validacion.js"></script>
<script src="./scripts/parametros.js"></script>
<script src="./scripts/animacion.js"></script>
</body>
</html>
