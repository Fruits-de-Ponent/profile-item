let campana = $('#alerta-texto').html()
let params = (new URL(document.location)).searchParams;
params = params.get("data");
window.history.pushState({}, document.title, "/profile-item/dist/index.php");

if (params === 'passok') {
    alerta('¡Contraseña cambiada correctamente!');
} else if (params === 'imgok') {
    alerta('¡Imagen cambiada correctamente!');
} else if (params === 'updateok') {
    alerta('¡Los trabajadores se han actualizado!');
}