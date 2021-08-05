function password(){
    Swal.fire({
        title: 'Cambio de contraseña',
        html: `
        <input type="password" id="password" class="swal2-input" placeholder="Contraseña">,
        <input type="password" id="confirmPassword" class="swal2-input" placeholder="Repetir contraseña">`,
        confirmButtonText: 'Cambiar',
        showCancelButton: true,
        focusConfirm: false,
        preConfirm: () => {
          // Solicitamos dos veces la contraseña 
          const password = Swal.getPopup().querySelector('#password').value
          const confirmPassword = Swal.getPopup().querySelector('#confirmPassword').value
          if (!password || !confirmPassword) {
            Swal.showValidationMessage(`Completa los campos`)
          }   // En el caso de ue las contraseñas no cincidan mostrara este mensaje de error
          else if (password!= confirmPassword){
            Swal.showValidationMessage(`Las contraseñas no coinciden`)
          }// si es correcto redireccionamos la pagina al archivo updatepass.php
          else{
            $.ajax({
            type: 'post',
            url: 'updatepass.php',
            data: {password},
            success: function(data){
                console.log(data);
            resolve()
            }
            });
            
            }
          return { password: confirmPassword }
        }
      }).then((result) => {
        if (result.isConfirmed) {
                Swal.fire(
                    `Contraseña cambiada!`
                    .trim())
                }
            })
    }

function logout(){
    Swal.fire({
        title: '¿Quiéres cerrar tu sesión?',
        showCancelButton: true,
        confirmButtonText: 'Si, quiero salir',
        confirmButtonColor: '#BBBBBB',
        cancelButtonText: "Cancelar",
        cancelButtonColor: '#FF0000'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "logout.php";
        }
    })
}