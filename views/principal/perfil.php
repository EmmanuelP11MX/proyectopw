<?php include_once 'views/template_principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle " id="tableListaProductos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <h3 id="totalProducto"></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo.png'; ?>" alt="" width="250">
                    <hr>
                    <p>Nombre del cliente</p>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    PayPal
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Otro Metodo de Pago
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php include_once 'views/template_principal/footer.php' ?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/cliente.js'; ?>"></script>

</body>

</html>