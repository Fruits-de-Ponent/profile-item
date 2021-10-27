<?php function generarPopSalir() {?>
    <div class="modal fade text-center" id="salir" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Estás seguro de que quieres salir?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-color" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" class="btn btn-danger" href="./logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>