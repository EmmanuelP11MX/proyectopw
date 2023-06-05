<?php include_once 'views/template/header-admin.php'; ?>
<main>
<h1 style="text-align: center;"> Productos </h1>
    <div style="margin: 10px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaProducto" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#nuevoProducto" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Nuevo</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listaProducto" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped table-hover align-middle" style="width: 100%;" id="tblProducto">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
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
            </div>
            <div class="tab-pane fade" id="nuevoProducto" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="card">
                    <div class="card-body">
                        <form id="frmRegistro">
                            <div class="row">
                                <input type="hidden" id="id_producto" name="id_producto">
                                <input type="hidden" id="imagen_actual" name="imagen_actual">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del producto">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input id="precio" class="form-control" type="number" step="0.01" name="precio" placeholder="Precio del producto">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Cantidad del producto">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <select name="categoria" id="categoria" class="form-control">
                                            <option value="">Seleccionar</option>
                                            <?php foreach ($data['categoria'] as $categoria) { ?>
                                                <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['categoria']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea id="descripcion" class="form-control" rows="5" name="descripcion" placeholder="Descripcion del producto"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imagen">Imagen </label>
                                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success" type="submit" id="btnAccion">Registrar</button>
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once 'views/template/footer-admin.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/producto.js' ?>"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>