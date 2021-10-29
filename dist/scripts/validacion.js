$('#cambiarImagenSubmit').on('click', (e) => {
    e.preventDefault();
    if (validarExtension($('#archivoImg').val()) === true) {
        validarDimensiones($('#archivoImg')).then(resultado => { 
            if (resultado) {
                $('#cambiarImagenForm').submit();
            } else {
                alerta('La dimension es incorrecta. <br> <small>Dimensión máxima permitida: 300px * 300px</small>');
            }
        });
    } else {
        alerta('El archivo que intentas subir no es una imagen.');
    }
});

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
    };
});


function alerta(texto) {    
    $('#alerta-texto').html(campana + texto);
    $('.toast').fadeIn('slow', () => {
        $('.toast').delay(1500).fadeOut('slow');
    });
};

function validarExtension(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png", "bmp"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        return false;
    } else {
        return true;
    };
};

async function validarDimensiones(file) {
    const fileAsDataURL = window.URL.createObjectURL(file[0].files[0])
    const dimensions = await getHeightAndWidthFromDataUrl(fileAsDataURL);
    if (dimensions.height < 301 || dimensions.width < 301) {
        return true;
    } else {
        return false;
    }
}

const getHeightAndWidthFromDataUrl = dataURL => new Promise(resolve => {
    const img = new Image()
    img.onload = () => {
      resolve({
        height: img.height,
        width: img.width
      })
    }
    img.src = dataURL
})