<?php include_once 'views/template/header-admin.php'; ?>
<main>
    <button class="btn btn-success" type="button" id="nuevo_registro"> Nuevo </button>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover" style="width: 100%;" id="tblUsuario">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>correo</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Registro de usuarios-->
    <div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title fs-5" id="titleModal"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmRegistro">
                    <div class="modal-body">
                        <input type="hidden" id="id_usuario" name="id_usuario">
                        <div class="form-group">
                            <label for="nombre">Nombre(s)</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre(s)">
                        </div>
                        <div class="form-group mb-2">
                            <label for="p_apellido">Primer Apellido</label>
                            <input id="p_apellido" class="form-control" type="text" name="p_apellido" placeholder="Primer apellido">
                        </div>
                        <div class="form-group mb-2">
                            <label for="s_apellido">Segundo Apellido</label>
                            <input id="s_apellido" class="form-control" type="text" name="s_apellido" placeholder="Segundo apellido">
                        </div>
                        <div class="form-group mb-2">
                            <label for="correo">Correo</label>
                            <input id="correo" class="form-control" type="email" name="correo" placeholder="ejemplo@gmail.com">
                        </div>
                        <div class="form-group mb-2">
                            <label for="clave">Contraseña</label>
                            <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once 'views/template/footer-admin.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/usuario.js' ?>"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>