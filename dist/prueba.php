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

    <nav class="navbar color text-light sticky-top" id="navegador">
        <div class="container-fluid">
            <div>
                <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
                    <?php generarIconPerfil(); ?>
                </a>
            </div>
            <div class="mt-2">
                <img src="./imagenes/logo-200.png" alt="logo fruitsponent" width="50" class="img-fluid mx-auto mb-3 esconder">
            </div>
            <div>
                <a type="button">
                    <?php generarIconLogOut(); ?>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid color text-light">
        <div class="row py-2 justify-content-center text-center">
            <div class="col">A</div>
            <div class="col">S</div>
            <div class="col">D</div>
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