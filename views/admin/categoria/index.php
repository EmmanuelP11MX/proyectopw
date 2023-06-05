<?php include_once 'views/template/header-admin.php'; ?>
<main>
<h1 style="text-align: center;"> Categorias </h1>
    <button class="btn btn-success" type="button" id="nuevo_registro" style="margin: 10px;"> Nuevo </button>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle" style="width: 100%;" id="tblCategoria">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Registro de categorias-->
    <div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title fs-5" id="titleModal"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmRegistro">
                    <div class="modal-body">
                        <input type="hidden" id="id_categoria" name="id_categoria">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="form-group">
                            <label for="categoria">Nombre</label>
                            <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Nombre de la categoria">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen </label>
                            <input id="imagen" class="form-control-file" type="file" name="imagen">
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
<script src="<?php echo BASE_URL . 'assets/js/modulos/categoria.js' ?>"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>