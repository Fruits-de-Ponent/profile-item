$('#cambiarImagenSubmit').on('click', () => {
    
})

$('#cambiarPassSubmit').on('click', (e) => {
    e.preventDefault();
    if (($('#passwordOne').val() != '' && $('#passwordTwo').val() != '')  && (($('#passwordOne').val()).length > 0 && ($('#passwordTwo').val()).length > 0)) {
        if ($('#passwordOne').val() == $('#passwordTwo').val()) {
            $('#cambiarPassForm').submit();
        } else{
            alerta('Las contraseñas no coinciden.');
        }
    } else {
        alerta('Los campos no pueden estar vacios y la contraseña deben tener mínimo 4 caracteres');
    }
})

function alerta(texto) {    
    $('#alerta-texto').html(texto);
    $('.toast').fadeIn('slow', () => {
        $('.toast').delay(1500).fadeOut('slow');
    });
};