    <section class="vh-100" style="background-color: #7CA982;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="images/login.jpg"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="POST" action="login.php?action=reset">

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Establece una nueva contraseña para tu cuenta</h5>
                        
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example13" name="contrasena" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Nueva contraseña</label>
                        </div>
                        <input type="hidden" name="correo" value="<?php echo $data['correo']; ?>"/>
                        <input type="hidden" name="token" value="<?php echo $data['token']; ?>"/>
                        <!-- Submit button -->
                        <input type="submit" name="enviar" value="Restablecer contraseña" class="btn btn-success btn-lg btn-block">
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>