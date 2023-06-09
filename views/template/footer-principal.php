<!--Modal del Carrito-->
<div id='myModal' class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fa-solid fa-cart-shopping"></i> Carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle " id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-3">
                <h3 id="totalGeneral"></h3>
                <?php if (!empty($_SESSION['correoCliente'])) { ?>
                    <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'cliente'; ?>">Realizar Pedido</a>
                <?php } else { ?>
                    <a class="btn btn-outline-primary" href="#" onclick="abrirModalLogin();">Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal del Login del cliente-->
<div id='modalLogin' class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="titleLogin">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="text-center">
                    <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo.png'; ?>" alt="" width="300">
                </div>
                <form method="get" action="">
                    <div class="row">
                        <div class="col-mb-12" id="frmLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin"><i class="fa-solid fa-envelope" style="color: #12681c;"></i> Correo</label>
                                <input id="correoLogin" class="form-control" type="text" name="correoLogin" placeholder="Correo Electrónico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin"><i class="fa-solid fa-key" style="color: #12681c;"></i></i> Contraseña</label>
                                <input id="claveLogin" class="form-control" type="password" name="claveLogin" placeholder="Contraseña">
                            </div>
                            <a href="#" id="btnRegister">No tienes una cuenta?</a>
                            <div class="float-end">
                                <button class="btn btn-success btn-lg" type="button" id="login">Login</button>
                            </div>
                        </div>
                    </div>
                    <!--Formulario de registro-->
                    <div class="col-mb-12 d-none" id="frmRegister">
                        <div class="form-group mb-3">
                            <label for="nombreRegistro"><i class="fa-solid fa-user" style="color: #12681c;"></i> Nombre(s) </label>
                            <input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Nombre del cliente">
                        </div>
                        <div class="form-group mb-3">
                            <label for="p_apellidoRegistro"><i class="fa-regular fa-user" style="color: #12681c;"></i></i> Primer Apellido</label>
                            <input id="p_apellidoRegistro" class="form-control" type="text" name="p_apellidoRegistro" placeholder="Primer Apellido del cliente">
                        </div>
                        <div class="form-group mb-3">
                            <label for="s_apellidoRegistro"><i class="fa-regular fa-user" style="color: #12681c;"></i></i> Segundo Apellido</label>
                            <input id="s_apellidoRegistro" class="form-control" type="text" name="s_apellidoRegistro" placeholder="Segundo Apellido del cliente">
                        </div>
                        <div class="form-group mb-3">
                            <label for="correoRegistro"><i class="fa-solid fa-envelope" style="color: #12681c;"></i> Correo</label>
                            <input id="correoRegistro" class="form-control" type="email" name="correoRegistro" placeholder="correo@gmail.com">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telefonoRegistro"><i class="fa-solid fa-phone" style="color: #12681c;"></i> Telefono</label>
                            <input id="telefonoRegistro" class="form-control" type="text" name="telefonoRegistro" placeholder="4448990001">
                        </div>
                        <div class="form-group mb-3">
                            <label for="claveRegistro"><i class="fa-solid fa-key" style="color: #12681c;"></i></i> Contraseña</label>
                            <input id="claveRegistro" class="form-control" type="password" name="claveRegistro" placeholder="Contraseña">
                        </div>
                        <a href="#" id="btnLogin">Ya tienes una cuenta?</a>
                        <div class="float-end">
                            <button class="btn btn-success btn-lg" type="button" id="registrarse">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">RLAB</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        10 de Mayo 472, El Progreso, 36135 Silao, Gto
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:905-945-9281">905-945-9281</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:rlab@gmail.com">rlab@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="<?php echo BASE_URL . 'admin'?>"><i class="fa-solid fa-gauge"></i></a>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; <?php echo date('Y'); ?> RLAB
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="<?php echo BASE_URL; ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/templatemo.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/custom.js"></script>
<script>
    const base_url = '<?php echo BASE_URL; ?>';
</script>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
<!-- End Script -->