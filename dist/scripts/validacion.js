let campana = $('#alerta-texto').html()

let params = (new URL(document.location)).searchParams;
params = params.get("pass");

if (params === 'actualizada') {
    alerta('Contraseña cambiada correctamente');
}

$('#cambiarImagenSubmit').on('click', () => {
    
})

$('#cambiarPassSubmit').on('click', (e) => {
    e.preventDefault();
    if (($('#passwordOne').val() != '' && $('#passwordTwo').val() != '')  && (($('#passwordOne').val()).length > 3 && ($('#passwordTwo').val()).length > 3)) {
        if ($('#passwordOne').val() == $('#passwordTwo').val()) {
            $('#cambiarPassForm').submit();
        } else{
            alerta('Las contraseñas no coinciden.');
        }
    } else {
        alerta('Los campos no pueden estar vacíos y la contraseña deben tener mínimo 4 caracteres.');
    }
})


function alerta(texto) {    
    $('#alerta-texto').html(campana + texto);
    $('.toast').fadeIn('slow', () => {
        $('.toast').delay(1500).fadeOut('slow');
    })
}