<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
        <h3 >Jorge </h3><small>Infantes Sorolla</small>
       
      </div>
      <div class="profile-extras">
        <div class="stars"> <span> <i class="material-icons">star star star star star</i></span></div>
        <div class="description">
          <p>Soy un estudiante en practicas, me encuentro en el departamento de informatica y trabajo en el desarrollo de aplicaciones web. </p>
        </div>
      </div>
    </div>
    <!-- <a class="add-photo-cc" href="imagen.php"><i class="material-icons">add_a_photo</i> -->
    <label for="">Cambiar foto</label>
    <small>    <input type="file" name="img"  >
</small>
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
<div class="center"><a href="#"><i class="icon-facebook mediano"></i></a><a href="#"><i class="icon-twitter mediano"></i></a><a href="#"><i class="icon-google mediano"></i></a></div>
<hr class="divider"/>
<div class="center sponsor-user">
  <div class="row">
    <div class="col s6">
      <p>Patrocinado por</p>
    </div>
    <div class="col s6"><img class="left" src="https://1000marcas.net/wp-content/uploads/2020/01/Lamborghini-Logo.png"/></div>
  </div>
</div>
<hr class="divider"/>
<div class="center sponsor-user">
  <div class="row">
    <div class="col s6">
      <p> <span>Ganancias: </span>$1,000,000</p>
    </div>
    <div class="col s6">
      <p><span>Ranking: </span>1,500</p>
    </div>
  </div>
</div>
<hr class="divider"/>
<div class="center">
  <div class="med"></div><a href="../../vacaciones/Mostrarvacaciones.php" class="grey darken-3 waves-effect waves-light btn round-cc white-text">VACACIONES</a>
  <div class="med"></div>
  <a href="#" class="grey darken-3 waves-effect waves-light btn round-cc white-text">EPIS</a>
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
