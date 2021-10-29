let campana = $('#alerta-texto').html()
let params = (new URL(document.location)).searchParams;
params = params.get("pass");
window.history.pushState({}, document.title, "/profile-item/dist/prueba.php");

if (params === 'actualizada') {
    alerta('Contraseña cambiada correctamente');
};

$('#cambiarImagenSubmit').on('click', (e) => {
    e.preventDefault();
    console.log(validateSize($('#archivoImg')), validateFormat($('#archivoImg').val()));
    if (validateFormat($('#archivoImg').val()) === true) {
        if (validateSize($('#archivoImg')) === true) {
            $('#cambiarImagenForm').submit();
        } else {
            alerta('La imagen mide demasiado. Medida máxima: 300px * 300px');
        }
    } else {
        alerta('La extension del archivo es incorrecta');
    };
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

function validateFormat(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["jpg" , "jpeg", "png", "bmp"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        return false;
    } else {
        return true;
    };
};

async function validateSize() {
    let subir;
    var _URL = window.URL || window.webkitURL;
    var element = $("#archivoImg");
        var file, img;
        if ((file = element[0].files[0])) {
            img = new Image();
            img.onload = async () => {
                await this.height;
                await this.width
                if(this.width > 300 || this.height > 300) {
                    subir = false;
                } else {
                    subir = true;
                };
            };
            img.src = _URL.createObjectURL(file);
            await img.decode();
            return subir;
    };
};
