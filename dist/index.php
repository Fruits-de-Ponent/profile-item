<?php
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
  <div class="hero-unit-title">
    <p>Perfil</p>
  </div>
  <div class="profile-background">
    <div class="profile-container">
      <div class="profile-wrapper"><img class="profile-circle" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['img']);  ?> "/>
        <div class="profile-divider"></div>
        <div class="profile-info">
        <h3 ><?php echo $_SESSION["nombre"]; ?></h3><small><?php echo $_SESSION["apellido"]; ?></small>
        </div>
        <form method="POST" class="form-inline" action="guardarImg.php" enctype="multipart/form-data">
          <div class="mb-2" style="width: 260px;margin-top:10px; margin-left:15px;">
          <input style="float: left; width: 250px;" class="form-control " type="file"name="img" required >
          </div>
          <input style="color: black;" class="" type="submit"  name="action" value="Actualizar"  />
        </form>
        <div class="profile-extras">
          <div class="description">
            <p>Bienvenido</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="separator-content">
    <div class="row">
      <div class="min"></div>
      <div class="col s4"><span class="chico">Correo</span>
        <p style="text-transform: lowercase;">
        <?php 
        echo $_SESSION['email'];  ?></p>
      </div>
      <div class="col s4"><span class="chico">Departamento</span>
        <p><?php 
        echo $_SESSION['departamento'];  ?></p>
      </div>
      <div class="col s4"><span class="chico">Responsable</span>
        <p><?php 
        echo $_SESSION['responsable'];  ?>
        </p>
      </div>
    </div>
  </div>
  <div class="center">
    <div class="med"></div>
    <a href="../../vacaciones/Mostrarvacaciones.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">VACACIONES</a>
    <hr class="divider"/>
    <?php 
    //  Si el trabajador es de rrhh o jorge podra acceder a nuevos apartados como formaciones
    if($_SESSION["Trabajador"]=='48251235H' ||$_SESSION["Trabajador"]=='43718221M'||$_SESSION["Trabajador"]=='47683324T'||$_SESSION["Trabajador"]=='25452518M' ){
    ?>
    <div class="med"></div>
    <a href="../../formacion/index.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">FORMACION</a>
    <hr class="divider"/>
    <div class="med"></div>
    <a href="./cargarTrabajadores.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">ACTUALIZAR TRABAJADORES</a>
    <hr class="divider"/>
    <div class="med"></div>
    <a href="../../vacaciones/alta_trabajador.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">ALTA TRABAJADOR</a>
    <hr class="divider"/>
    <div class="med"></div>
    <a href="../../formacion/listado_trabajadores.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">BAJA TRABAJADOR</a>
    <hr class="divider"/>
    <?php 
      }
    ?>
    <!-- al pulsar este boton se ejecuta un script con un pop up donde introduces la contraseña   -->
    <div class="med"></div>
    <button type="button"class="grey darken-3 waves-effect waves-light btn round-cc white-text" onclick="password()" > 
      Cambiar Contraseña
    </button>
    <hr class="divider"/>
    <div class="med"></div>
    <button type="button"class="grey darken-3 waves-effect waves-light btn round-cc white-text" onclick="logout()"> 
      Cerrar sesion
    </button>
  </div>
  <div class="modal-body" id="popup"> </div>

</body>
</html>
