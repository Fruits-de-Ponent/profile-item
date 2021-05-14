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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<!-- <link rel='stylesheet' href='https://file.myfontastic.com/mSPBF5EPQMnzzDFUMeyech/icons.css'> -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
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
    <!-- <a class="add-photo-cc" href="imagen.php"><i class="material-icons">add_a_photo</i> -->
    

      <!-- <div class="add-photo-tooltip">Cambiar foto de portada</div></a> -->
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



<?php

?>
<div class="center">
  <div class="med"></div><a href="../../vacaciones/Mostrarvacaciones.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">VACACIONES</a>
  <hr class="divider"/>
  <div class="med"></div>
  <a href="../../formacion/index.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">FORMACION</a>
  <hr class="divider"/>
  <div class="med"></div>
  <button type="button"class="grey darken-3 waves-effect waves-light btn round-cc white-text" data-toggle="modal" data-target="#exampleModal" sty> 
    Cerrar sesion
</button></div>
  <div class="gra"></div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>



<!-- LOGOUT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Desconectarte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Seguro que quieres salir? <?php echo $_SESSION['Trabajador']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="../../vacaciones/logout.php">
        <button type="submit" class="btn btn-danger">Cerrar sesion</button>

        </form>

  </div>
    </div>
  </div>
</div>
</body>
</html>
