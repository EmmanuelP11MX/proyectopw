<?php include_once 'views/template/header-admin.php'; ?>
<main>
<h1 style="text-align: center;"> Pedidos </h1>
    <div style="margin: 10px;">
    <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped table-hover align-middle" style="width: 100%;" id="tblPendientes">
                                <thead>
                                    <tr>
                                        <th>Id Transacción</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-dark table-striped table-hover align-middle" style="width: 100%;" id="tblFinalizados">
                                <thead>
                                    <tr>
                                        <th>Id Transacción</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once 'views/template/footer-admin.php'; ?>
<script type="text/javascript" src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/pedido.js' ?>"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>