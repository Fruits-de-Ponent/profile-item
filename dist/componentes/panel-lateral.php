<?php function generarPanelLateral($permisos) { ?>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="panel-lateral">
        <div class="offcanvas-header navbar color text-light">
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Panel de control</h5>
            <button type="button" class="btn svg-fill" data-bs-dismiss="offcanvas" aria-label="Close"><?php generarIconCerrar();?></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <h5 class="mx-1 text-color"><b>APP's</b></h5>
                <div class="col d-grid">
                    <a class="btn btn-color shadow-sm" href="../../vacaciones/Mostrarvacaciones.php"><?php generarIconVacaciones();?>VACACIONES</a>
                </div>
            </div>
                <?php if($permisos=='48251235H' ||$permisos=='43718221M'||$permisos=='47683324T'||$permisos=='25452518M') {?>
                <div class="col d-grid my-2">
                    <a class="btn btn-color shadow-sm" href="../../formacion/index.php"><?php generarIconFormaciones();?>FORMACIONES</a>
                </div>
                <div class="col d-grid my-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-color shadow-sm"><?php generarIconTrabajadores();?>TRABAJADORES</button>
                        <button 
                            type="button" 
                            class="btn-flecha shadow-sm"
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            ▼
                        </button>
                        <ul class="dropdown-menu border-color">
                            <li><a class="dropdown-item" href="./cargarTrabajadores.php">Actualizar trabajadores</a></li>
                            <li><a class="dropdown-item" href="../../vacaciones/alta_trabajador.php">Dar de alta un trabajador</a></li>
                            <li><a class="dropdown-item" href="../../formacion/listado_trabajadores.php">Dar de baja un trabajador</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>