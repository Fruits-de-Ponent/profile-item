$('#cambiarImagenSubmit').on('click', () => {
    
})

$('#cambiarPassSubmit').on('click', () => {
    if ($('#password-one').val() != '' && $('#password-two').val() != '') {
        if ($('#password-one').val() == $('#password-two').val()) {
            
        } else{
            alerta('Las contraseñas no coinciden');
        }
    } else {
        alerta('Debes rellenar ambos campos');
    }
})

function alerta(texto) {
    $('.toast').fadeOut('slow', () => {
        $('#alerta-texto').html(texto);
        $('.toast').fadeIn('slow').delay(3000).fadeOut('slow');
    })
}