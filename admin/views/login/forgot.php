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

                    <form method="POST" action="login.php?action=send">
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Recuperación</span>
                    </div>
                    <div class="form-outline mb-4">
                        <input name="correo" type="email" id="form1Example13" class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example13">Correo para recuperar la contraseña</label>
                    </div>
                    <!-- Submit button -->
                    <input name="enviar" value="Recover" type="submit"
                        class="btn btn-success btn-lg btn-block"></button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>