<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./prueba.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar color text-light sticky-top border-bottom border-light shadow-sm" id="navegador">
        <div class="container-fluid">
            <div>
                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
                    <?php generarIconPerfil(); ?>
                </a>
            </div>
            <div>
                <a type="button">
                    <?php generarIconLogOut(); ?>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <h5 class="mx-1 text-color">PANEL DE CONTROL</h5>
        <div class="row">
            <div class="col d-grid gap-2 mx-1">
                <button class="btn btn-color shadow" type="button" data-bs-toggle="collapse" data-bs-target="#colapsar-datos" aria-expanded="true" aria-controls="colapsar-datos">DATOS</button>
            </div>
            <div class="col d-grid gap-2 mx-1">
                <button class="btn btn-color shadow" type="button" data-bs-toggle="collapse" data-bs-target="#colapsar-app" aria-expanded="false" aria-controls="colapsar-app">APP's</button>
            </div>
            <div class="col d-grid gap-2 mx-1">
                <button class="btn btn-color shadow" type="button" data-bs-toggle="collapse" data-bs-target="#colapsar-config" aria-expanded="false" aria-controls="colapsar-config">CONFIGURACIÓN</button>
            </div>
        </div>
    </div>

    <div class="collapse" id="colapsar-datos">
        <div class="container-fluid mt-3">
        <hr>
            <h5 class="mx-1 text-color">DATOS</h5>
            <div class="row mx-1 rounded color text-light py-2 pt-3 justify-content-center text-center shadow">
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

    <div class="collapse" id="colapsar-app">
        <div class="container-fluid mt-3">
            <hr>
            <h5 class="mx-1 text-color">APP's</h5>
            <div class="row">
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">VACACIONES</button>
                </div>
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">FORMACIONES</button>
                </div>
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">ALTA TRABAJADOR</button>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">CALENDARIO</button>
                </div>
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">HORAS</button>
                </div>
                <div class="col d-grid gap-2">
                    <button class="btn btn-color shadow">PAGINA PRINCIPAL</button>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse" id="colapsar-config">
        <div class="container-fluid mt-3">
            <hr>
            <h5 class="mx-1 text-color">CONFIGURACION</h5>
            <div class="row">
                <div class="col d-grid gap-2">
                    <h6 class="mx-1 text-color">Cambiar contraseña</h6>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Introduce la nueva contraseña">
                    </div>
                    <div class="input-group mt-1 mb-2">
                        <input type="text" class="form-control" placeholder="Vuelve a introducir la nueva contraseña">
                        <button class="btn btn-color" type="button" id="button-addon2">Cambiar contraseña</button>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col d-grid gap-2">
                    <h6 class="mx-1 text-color">Cambiar imagen del perfil</h6>
                    <div class="input-group">
                        <input type="file" class="form-control">
                        <button class="btn btn-color" type="button">Cambiar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>


<?php function generarIconLogOut() { ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="svg my-2 mx-1 salir"  width="30" alt="door" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
    </svg>
<?php } ?>

<?php function generarIconPerfil() { ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="svg my-2 mx-1" width="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg>
<?php } ?>