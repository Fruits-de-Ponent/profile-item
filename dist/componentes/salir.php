<?php function generarPopSalir() {?>
    <div class="modal fade text-center" id="salir" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 justify-content-center">
                    <h5 class="modal-title text-color">¿Estás seguro de que quieres salir?</h5>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-color-invertido" data-bs-dismiss="modal">Cancelar</button>
                    <a type="button" class="btn btn-color" href="./logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>