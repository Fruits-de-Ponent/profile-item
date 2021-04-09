<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
</head>
<body>
  
    <form method="POST" action="guardarImg.php" enctype="multipart/form-data">
    
  <h3>Cambiar foto de <?php echo $_SESSION['Trabajador']?></h3>
    <input type="file" name="img" required>
    <input type="submit" value="cargar Archivos">
</form>
</body>
</html>