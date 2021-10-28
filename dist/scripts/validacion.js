let campana = $('#alerta-texto').html()
let params = (new URL(document.location)).searchParams;
params = params.get("pass");
window.history.pushState({}, document.title, "/profile-item/dist/prueba.php");

if (params === 'actualizada') {
    alerta('Contraseña cambiada correctamente');
}

$('#cambiarImagenSubmit').on('click', () => {
    if (validateFormat($('#archivoImg').val()) || validateSize($('#archivoImg'))) {
        console.log('asd')
        $('#cambiarImagenForm').submit();
    }
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

function validateSize() {
    let subir;
    var _URL = window.URL || window.webkitURL;
    var element = $("#archivoImg");
        var file, img;
        if ((file = element[0].files[0])) {
            img = new Image();
            img.onload = function() {
                if(this.width > 300 || this.height > 300) {
                    console.log(this.width, this.height)
                    alerta('La imagen mide demasiado. Medida máxima: 150px * 150px')
                    subir = false;
                } else {
                    subir = true;
                }
            };
            img.src = _URL.createObjectURL(file);
            console.log('asdasasdd', true)
            return subir;
    }
}

function validateFormat(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png", "bmp"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        return false;
    } else {
        console.log('asdasd')
        return true;
    }
}